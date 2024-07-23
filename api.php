<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $inputValue = $data['inputValue'];

    $numeralsMap = [
        'M' => 1000, 
        'CM' => 900, 
        'D' => 500, 
        'CD' => 400, 
        'C' => 100, 
        'XC' => 90,
        'L' => 50, 
        'XL' => 40, 
        'X' => 10, 
        'IX' => 9, 
        'V' => 5, 
        'IV' => 4, 
        'I' => 1
    ];
    
    function convertToRomanNumerals($numeralsMap, $inputValue) {
        $inputValueInt = intval($inputValue);
        $result = '';

        foreach ($numeralsMap as $numeral => $count) {
            $matches = intval($inputValueInt / $count);
            $result .= str_repeat($numeral, $matches);
            $inputValueInt = $inputValueInt % $count;
        }

        return $result;
    }

    if (is_numeric($inputValue)) {
        $convertedValue = convertToRomanNumerals($numeralsMap, $inputValue);
    } elseif (is_string($inputValue)) {
        $convertedValue = 'is string';
    }

    echo json_encode(['convertedValue' => $convertedValue]);
}
