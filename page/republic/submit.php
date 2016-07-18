<?php

/**
 * Your Google form key
 */
$formKey = "somerandomkey";

/**
 * Your Google form success message
 */
$formSuccessMessage = "თქვენი განაცხადი მიღებულია";

$request_url = "https://docs.google.com/forms/d/{$formKey}/formResponse";
$fields = http_build_query($_POST);

//open connection
$request = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($request, CURLOPT_URL, $request_url);
curl_setopt($request, CURLOPT_POST, 1);
curl_setopt($request, CURLOPT_POSTFIELDS, $fields);
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

//execute post
$response = curl_exec($request);

//close connection
curl_close($request);

header('Content-Type: application/json');

if (strpos($response, $formSuccessMessage) === false) {
    //error
    http_response_code(400);
    echo json_encode([
        'status' => 'error'
    ]);
    die();
}

//success
echo json_encode([
    'status' => 'ok'
]);