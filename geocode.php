<?php
header('Content-Type: application/json');

$location = $_GET['location'] ?? '';

if (empty($location)) {
    echo json_encode(['error' => 'Location parameter is missing.']);
    exit;
}

$full_location = $location . ', Catanduanes, Philippines';
$url = 'https://nominatim.openstreetmap.org/search?q=' . urlencode($full_location) . '&format=json&limit=1';

$options = [
    'http' => [
        'method' => 'GET',
        'header' => "User-Agent: CatanduanesTourism/1.0\r\n"
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo json_encode(['error' => 'Failed to fetch geocoding data.']);
    exit;
}

echo $response;
?>
