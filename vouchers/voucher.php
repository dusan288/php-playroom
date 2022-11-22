<?php
include('./helperFunctions.php');

class Voucher {
    public $code, $value, $used, $currency;
    public function __construct($code, $value) {
        $this->code = $code;
        $this->value = $value;
        $this->used = false;
        $this->currency = 'EUR';
    }
    public function activate() {
        $this->used = true;
    }
}

class VoucherFactory {
    public static function make($value, $count) {
        $generatedVouchers = [];
        $codeIsNotUnique = false;
        for($i = 0; $i < $count; $i++) {
            $code = generateRandomString(5).'-'.generateRandomString(5);
            //check if voucher with existing code exists if yes generate new Random str
            for($j =0; $j < count($generatedVouchers); $j++) {
                if($generatedVouchers[$j]->code == $code) {
                    $codeIsNotUnique = true;
                }
            }            
            if($codeIsNotUnique) {
                $i--; //repeat the loop
                $codeIsNotUnique = false; //reset
                continue;
            } else {
                $newVoucher = new Voucher($code, $value);
                $generatedVouchers[] = $newVoucher;
            }
            
        }
        return $generatedVouchers;
    }
}

// $vouchers = VoucherFactory::make(10, 1) / make 1 10E voucher

