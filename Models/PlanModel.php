<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PlanModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property int id
 * @property string name
 * @property string interval
 * @property int interval_count
 * @property string billing_trigger_type
 * @property int billing_trigger_day
 * @property int billing_cycles
 * @property string code
 * @property string description
 * @property int installments
 * @property bool invoice_split
 * @property string status
 * @property PlanItemModel[] plan_items
 * @property mixed metadata
 */
class PlanModel extends ModelBase {

    protected $fillable = [
        "id",
        "name",
        "interval",
        "interval_count",
        "billing_trigger_type",
        "billing_trigger_day",
        "billing_cycles",
        "code",
        "description",
        "installments",
        "invoice_split",
        "status",
        "plan_items",
        "metadata",
    ];

    public $timestamps = false;
}