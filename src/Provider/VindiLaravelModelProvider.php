<?php
namespace GoldenCodes\VindiLaravel\Provider;

use GoldenCodes\VindiLaravel\Models\AddressModel;
use GoldenCodes\VindiLaravel\Models\BillItemModel;
use GoldenCodes\VindiLaravel\Models\BillModel;
use GoldenCodes\VindiLaravel\Models\CustomerModel;
use GoldenCodes\VindiLaravel\Models\DiscountModel;
use GoldenCodes\VindiLaravel\Models\MerchantUserModel;
use GoldenCodes\VindiLaravel\Models\PaymentCompanyModel;
use GoldenCodes\VindiLaravel\Models\PaymentConditionDiscountModel;
use GoldenCodes\VindiLaravel\Models\PaymentConditionModel;
use GoldenCodes\VindiLaravel\Models\PaymentMethodModel;
use GoldenCodes\VindiLaravel\Models\PaymentProfileModel;
use GoldenCodes\VindiLaravel\Models\PeriodModel;
use GoldenCodes\VindiLaravel\Models\PhoneModel;
use GoldenCodes\VindiLaravel\Models\PlanItemModel;
use GoldenCodes\VindiLaravel\Models\PlanModel;
use GoldenCodes\VindiLaravel\Models\PricingSchemaModel;
use GoldenCodes\VindiLaravel\Models\ProductItemModel;
use GoldenCodes\VindiLaravel\Models\ProductModel;
use GoldenCodes\VindiLaravel\Models\RoleModel;
use GoldenCodes\VindiLaravel\Models\SubscriptionModel;
use Illuminate\Support\ServiceProvider;

class VindiLaravelModelProvider extends ServiceProvider
{

    public function boot() {}

    public function register() {
        $this->registerModels();
    }

    public function registerModels() {
        foreach($this->getModels() as $key => $model) {
            $this->app->bind($key, function() use($model) {
                return new $model;
            });
        }
    }

    protected function getModels() {
        return [
            AddressModel::class => AddressModel::class,
            BillItemModel::class => BillItemModel::class,
            BillModel::class => BillModel::class,
            CustomerModel::class => CustomerModel::class,
            DiscountModel::class => DiscountModel::class,
            MerchantUserModel::class => MerchantUserModel::class,
            PaymentCompanyModel::class => PaymentCompanyModel::class,
            PaymentConditionDiscountModel::class => PaymentConditionDiscountModel::class,
            PaymentConditionModel::class => PaymentConditionModel::class,
            PaymentMethodModel::class => PaymentMethodModel::class,
            PaymentProfileModel::class => PaymentProfileModel::class,
            PeriodModel::class => PeriodModel::class,
            PhoneModel::class => PhoneModel::class,
            PlanItemModel::class => PlanItemModel::class,
            PlanModel::class => PlanModel::class,
            PricingSchemaModel::class => PricingSchemaModel::class,
            ProductItemModel::class => ProductItemModel::class,
            ProductModel::class => ProductModel::class,
            RoleModel::class => RoleModel::class,
            SubscriptionModel::class => SubscriptionModel::class,
        ];
    }
}