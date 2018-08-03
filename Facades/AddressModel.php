<?php
namespace GoldenCodes\VindiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class AddressModel extends Facade {

	protected static function getFacadeAccessor() { return "GoldenCodes\VindiLaravel\Models\AddressModel"; }
}