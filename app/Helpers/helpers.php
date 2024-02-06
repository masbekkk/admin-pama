<?php

use Carbon\Carbon;

function getClearNumberFromStringCurrency($currencyString)
{
    // Remove non-numeric characters, replace comma with dot, and convert to a float
    $clearNumber = (float) str_replace(',', '.', preg_replace("/[^0-9,]/", "", $currencyString));
    return $clearNumber;
}

/**
 * parse thousand separator
 */
function parseThousandSeparatorToFloat($rawInput)
{
    $cleanedValue = preg_replace('/[^0-9.,]/', '', $rawInput);

    // Parse the cleaned value to a float
    $numericValue = floatval(str_replace(',', '', $cleanedValue));
    return $numericValue;
}

function countBetweenTwoDates($firstDate, $secondDate)
{
     $fromDate = Carbon::parse($firstDate);
    $toDate = Carbon::parse($secondDate);

    $days = $fromDate->diffInDays($toDate);  // Swap the order of subtraction
    // dd($days);
    return $days;
}
