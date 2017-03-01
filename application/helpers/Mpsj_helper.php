<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//use this if you want to call CI library and core class
//$CI =& get_instance();

function encryptInUrl($str){
    $CI =& get_instance();

    $ciphertext = $CI->encryption->encrypt($str);

    $ciphertext = strtr(
        $ciphertext,
        array(
            '+' => '.',
            '=' => '-',
            '/' => '~'
        )
    );

    return $ciphertext;
}

function decryptInUrl($ciphertext){
    $CI =& get_instance();

    $ciphertext = strtr(
        $ciphertext,
        array(
            '.' => '+',
            '-' => '=',
            '~' => '/'
        )
    );
    return $CI->encryption->decrypt($ciphertext);
}