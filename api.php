<?php

// Roman numerals map
$numeralsMap = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

function convertIntToNumerals(array $numeralsMap, int $inputValue): string 
{
    $result = '';
    $inputValueInt = intval($inputValue);

    foreach ($numeralsMap as $numeral => $number) {
        // Calculate how many times the current numeral can fit into the input value
        $matches = intval($inputValueInt / $number);
        // Append the current numeral to the result string, based on how many matches are found
        $result .= str_repeat($numeral, $matches);
        // Update the input value by subtracting the total value of the appended numerals
        $inputValueInt = $inputValueInt % $number;
    }

    return $result;
}

function convertNumeralsToInt(array $numeralsMap, string $inputValue): int
{   
    $result = 0;

    foreach ($numeralsMap as $numeral => $number) {
        // Check if the input string starts with the current Roman numeral
        while (strpos($inputValue, $numeral) === 0) {
            // Add the value of the current Roman numeral to the result
            $result += $number;
            // Remove the current Roman numeral from the start of the input string
            $inputValue = substr($inputValue, strlen($numeral));
        }
    }

    return $result;
}

function dateToRoman(string $date): string 
{
    list($day, $month, $year) = explode('-', $date);

    $romanDay = convertIntToNumerals($GLOBALS['numeralsMap'], (int)$day);
    $romanMonth = convertIntToNumerals($GLOBALS['numeralsMap'], (int)$month);
    $romanYear = convertIntToNumerals($GLOBALS['numeralsMap'], (int)$year);

    $romanDate = sprintf('%s-%s-%s', $romanDay, $romanMonth, $romanYear);

    return $romanDate;
}

function romanToDate(string $romanDate): string 
{
    list($romanDay, $romanMonth, $romanYear) = explode('-', $romanDate);

    $day = convertNumeralsToInt($GLOBALS['numeralsMap'], $romanDay);
    $month = convertNumeralsToInt($GLOBALS['numeralsMap'], $romanMonth);
    $year = convertNumeralsToInt($GLOBALS['numeralsMap'], $romanYear);

    $date = sprintf('%02d-%02d-%04d', $day, $month, $year);
    
    return $date;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $inputDate = $data['inputDate'];

    // Determine whether input is a date or Roman numerals, then check for DD-MM-YYYY format
    if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $inputDate)) {
        $convertedDate = dateToRoman($inputDate);
    } elseif (preg_match('/^([IVXLCDM]+)-([IVXLCDM]+)-([IVXLCDM]+)$/', $inputDate)) {
        $convertedDate = romanToDate($inputDate);
    } else {
        echo json_encode(['error' => 'Invalid date format.']);
        return;
    }

    // Return the converted date, encoded
    echo json_encode(['convertedDate' => $convertedDate]);
}
