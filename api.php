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
    
    function convertIntToNumerals($numeralsMap, $inputValue) {
        $inputValueInt = intval($inputValue);
        $result = '';

        foreach ($numeralsMap as $numeral => $number) {
            $matches = intval($inputValueInt / $number);
            $result .= str_repeat($numeral, $matches);
            $inputValueInt = $inputValueInt % $number;
        }

        return $result;
    }

    function convertNumeralsToInt($numeralsMap, $inputValue) {
        $result = 0;

        foreach ($numeralsMap as $key => $value) {
            while (strpos($inputValue, $key) === 0) {
                $result += $value;
                $inputValue = substr($inputValue, strlen($key));
            }
        }

        return $result;
    }

    if (is_numeric($inputValue)) {
        $convertedValue = convertIntToNumerals($numeralsMap, $inputValue);
    } elseif (is_string($inputValue)) {
        $convertedValue = convertNumeralsToInt($numeralsMap, $inputValue);
    }

    echo json_encode(['convertedValue' => $convertedValue]);
}
