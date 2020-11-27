<?php
namespace App\PaymentGateway;

class Payment {

        protected static function getFacadeAccessor()
        {
            return "payment";
        }
}
