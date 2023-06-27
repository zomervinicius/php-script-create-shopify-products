<?php
$dotenvFile = __DIR__ . '/.env';
if (file_exists($dotenvFile)) {
    $dotenv = parse_ini_file($dotenvFile);
    foreach ($dotenv as $key => $value) {
        $_ENV[$key] = $value;
    }
}

$giphyApiKey = $_ENV['GIPHY_API_KEY'];
$shopifyStoreUrl = $_ENV['SHOPIFY_STORE_URL'];
$shopifyAccessToken = $_ENV['SHOPIFY_ACCESS_TOKEN'];

$giphyApiUrl = 'http://api.giphy.com/v1/gifs/trending';

$giphyRequestUrl = $giphyApiUrl . '?api_key=' . $giphyApiKey;

$giphyResponse = file_get_contents($giphyRequestUrl);

if ($giphyResponse === false) {
    die('Error: Unable to connect to the Giphy API.');
}

$giphyData = json_decode($giphyResponse, true);

if ($giphyData === null || !isset($giphyData['data'])) {
    die('Error: Invalid response from the Giphy API.');
}

$shopifyApiUrl = $shopifyStoreUrl . '/admin/api/2023-07/products.json';

foreach ($giphyData['data'] as $gif) {
    $title = $gif['title'];
    $imageUrl = $gif['images']['original']['url'];
    $stillImageUrl = $gif['images']['original_still']['url'];

    $productData = [
        'product' => [
            'title' => $title,
            'body_html' => '<img src="' . $stillImageUrl . '" alt="' . $title . '">',
            'variants' => [
                [
                    'option1' => 'Default',
                    'price' => rand(1, 10),
                ],
                [
                    'option1' => 'Custom',
                    'price' => rand(1, 10),
                    'option2' => 'Custom Size',
                    'option3' => null,
                    'height' => rand(100, 500),
                    'width' => rand(100, 500),
                ],
            ],
            'images' => [
                [
                    'src' => $imageUrl,
                ],
            ],
            'published' => true,
        ],
    ];

    $jsonProductData = json_encode($productData);

    $shopifyOptions = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n"
                . "Accept: application/json\r\n"
                . "X-Shopify-Access-Token: " . $shopifyAccessToken . "\r\n",
            'method'  => 'POST',
            'content' => $jsonProductData,
        ],
    ];

    $shopifyContext = stream_context_create($shopifyOptions);
    $shopifyResponse = file_get_contents($shopifyApiUrl, false, $shopifyContext);

    if ($shopifyResponse === false) {
        die('Error: Unable to connect to the Shopify API.');
    }

    $shopifyData = json_decode($shopifyResponse, true);

    if ($shopifyData === null || !isset($shopifyData['product'])) {
        die('Error: Invalid response from the Shopify API.');
    }

    echo 'Product created with ID: ' . $shopifyData['product']['id'] . PHP_EOL;

    $headers = $http_response_header;
    $rateLimitRemaining = null;

    foreach ($headers as $header) {
        if (strpos($header, 'X-Shopify-Shop-Api-Call-Limit') !== false) {
            $rateLimitRemaining = explode

('/', $header)[0];
            break;
        }
    }

    if ($rateLimitRemaining !== null && $rateLimitRemaining < 5) {
        echo 'Rate limit reached. Pausing for 5 seconds...' . PHP_EOL;
        sleep(5);
    }
}
?>