<?php
// Retrieve the Spreadsheet ID and the Google API Token from the client URL
$spreadsheetId = urlencode($_GET['spreadsheet']);
$apiToken = urlencode($_GET['token']);
// The A1 notation of the values to retrieve.
// Hard code the range so that all results are always returned
$range = urlencode('A:A');

// Make a simple GET request to the Google API
$url = "https://content-sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$range?key=$apiToken";
$response = file_get_contents($url);

// Check if the response worked. If not, just return a Bad Request error.
if (isset($response) and $response != NULL) {
	$json = json_decode($response, true);
	$obj = $json['values'];
	$index = $_GET['index'];
	if (!is_numeric($index)) {
		$index = rand(0, count($obj)-1);
	}
	$index = $index % count($obj);
	echo $obj[$index][0]; 
} else {
	http_response_code(400);
}
?>
