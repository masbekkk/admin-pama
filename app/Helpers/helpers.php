<?php

function getClearNumberFromStringCurrency($currencyString)
{
    // Remove non-numeric characters, replace comma with dot, and convert to a float
    $clearNumber = (float) str_replace(',', '.', preg_replace("/[^0-9,]/", "", $currencyString));
    return $clearNumber;
}
