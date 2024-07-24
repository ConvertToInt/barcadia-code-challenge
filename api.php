<?php

// Roman numerals map
$numeralsMap = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

function convertIntToNumerals(array $numeralsMap, int $inputValue): string {
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

function convertNumeralsToInt(array $numeralsMap, string $inputValue): int {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the request
    $data = json_decode(file_get_contents('php://input'), true);
    $inputValue = $data['inputValue'];

    // Determine whether to convert to integer, or to roman numerals
    if (is_numeric($inputValue)) {
        $convertedValue = convertIntToNumerals($numeralsMap, $inputValue);
    } elseif (is_string($inputValue)) {
        $convertedValue = convertNumeralsToInt($numeralsMap, $inputValue);
    }

    // Return the encoded converted answer
    echo json_encode(['convertedValue' => $convertedValue]);
}
