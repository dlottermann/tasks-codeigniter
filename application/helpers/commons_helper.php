
<?php
if (!function_exists('dataBanco')) {

function dataBanco($data) {

    $dta = explode('/', $data);
    return $dta[2] . '-' . $dta[1] . '-' . $dta[0];
}

}

if (!function_exists('bancoData')) {

function bancoData($data) {

    $dta = explode('-', $data);
    return $dta[2] . '/' . $dta[1] . '/' . $dta[0];
}

}