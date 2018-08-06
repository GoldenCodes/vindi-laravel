<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\PaymentProfileService;

/**
 * Class PaymentProfileModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/payment_profiles
 *
 * @property int id
 * @property string holder_name
 * @property string registry_code
 * @property string bank_branch
 * @property string bank_account
 * @property string card_expiration
 * @property string card_number
 * @property string card_cvv
 * @property string payment_company
 * @property string payment_company_code
 * @property string payment_method_code
 * @property string card_number_last_four
 * @property string created_at
 * @property int customer_id
 */
class PaymentProfileModel extends ModelBase {

    public $timestamps = false;

    protected static $vindiService = PaymentProfileService::class;

    protected $fillable = [
        "id",
        "holder_name",
        "registry_code",
        "bank_branch",
        "bank_account",
        "card_expiration",
        "card_number",
        "card_cvv",
        "payment_method_code",
        "payment_company_code",
        "gateway_token",
        "customer_id",
    ];

    /**
     * Retorna o último cartão ativo ou retorna uma instância zerada
     *
     * @param int $customer_id
     * @return PaymentProfileModel
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public static function getActiveCard($customer_id) {
        return static::query()->where([
            'customer_id' => $customer_id,
            'status' => 'active',
            'type' => 'PaymentProfile::CreditCard'
        ])->firstOrNew(['sort_order' => 'desc']);
    }

    /**
     * Verifica se o cartão é válido
     *
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function isValid(): bool {
        $response = (static::$vindiService)::getInstance()->post($this, 'verify');
        return $response->status == 'success';
    }

    public function getValidationRules(): array {
        return [
            "holder_name" => 'required',
            "card_expiration" => 'required',
            "card_number" => 'required',
            "card_cvv" => 'required',
            "payment_method_code" => 'required',
            "payment_company_code" => 'required',
            "customer_id" => 'required',
        ];
    }
}