<?php

function logRequest($data): void
{
    $logFile = 'requests.json';
    if (!file_exists($logFile)) {
        file_put_contents($logFile, '[]');
    }

    $requests[] = [
        'method' => $_SERVER['REQUEST_METHOD'],
        'data' => $data,
        'date' => date('Y-m-d H:i:s'),
    ];

    file_put_contents($logFile, json_encode($requests, JSON_PRETTY_PRINT));
}
