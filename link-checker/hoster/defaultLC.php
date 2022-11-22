<?php

class DefaultLC {
    public $link;
    public $name;
    public $size;
    public $errorMsg;

    public function __construct($link) {
        $this->link = $link;
    }

    public function cut_str($str, $left, $right) : string {
        $str = substr(stristr($str, $left), strlen($left));
        $leftLen = strlen(stristr($str, $right)); 
        $leftLen = $leftLen ? -($leftLen) : strlen($str);
        $str = substr($str, 0, $leftLen);
        return $str;
    }

    public function fetchLinkData() {}


}