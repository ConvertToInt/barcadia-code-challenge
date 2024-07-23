<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $inputValue = $data['inputValue'];
    
    if (is_numeric($inputValue)) {
        $convertedValue = 'is int';
    } elseif (is_string($inputValue)) {
        $convertedValue = 'is string';
    }

    echo json_encode(['convertedValue' => $convertedValue]);
}
