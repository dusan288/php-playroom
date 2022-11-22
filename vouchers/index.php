<?php

include('./voucher.php');
session_start();
/* TODO: make Voucher App, 
GET /?action=create_voucher&value=10&count=1  / make 1 10E Voucher
GET /?action=show_vouchers / list all vouchers
GET /?action=activate_voucher&code=XXXX / XXXX = voucher code 
*/

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action) {
    case 'create_voucher':
    {
        echo 'Creating Voucher...';
        $value = $_GET['value'];
        $count = $_GET['count'];
        $vouchers = VoucherFactory::make($value,$count);
        $_SESSION['vouchers'] = $vouchers;
        print_r($vouchers);
        break;
    } 
    case 'show_vouchers':
    {
        echo 'Displaying all Vouchers from Session...';
        print_r($_SESSION['vouchers']);
        break;
    } 
    case 'activate_voucher':
    {
        echo 'Activating Voucher...';
        $code = $_GET['code'];
        $vouchers = $_SESSION['vouchers'];
        //loop through vouchers find the one with matching code and activate it
        for($i = 0; $i < count($vouchers); $i++) {
            if($vouchers[$i]->code == $code) {
                $vouchers[$i]->activate();
            }
        }
        //update Session with fresh data
        $_SESSION['vouchers'] = $vouchers;
        break;
    } 
    default: {
        echo 'Please choose an action.';
    }
}

