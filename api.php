<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (is_numeric($data['inputValue'])) {
        echo json_encode(['conversionResult' => 'Is number']);
    } elseif (is_string($data['inputValue'])) {
        echo json_encode(['conversionResult' => 'Is string']);
    }
}
