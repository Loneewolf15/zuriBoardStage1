<?php
//create the function to get the current day of the week in full.
function getCurrentDay() {
    return date('l');
}

// create the function to get the current UTC time within a +/-2 minute window.
function getCurrentUTCTime() {
    $currentTimestamp = time();
    $minTime = $currentTimestamp - 120; // 2 minutes ago
    $maxTime = $currentTimestamp + 120; // 2 minutes from now

    $random = mt_rand($minTime, $maxTime);

    return gmdate('Y-m-d\TH:i:s\Z', $random);
}

// function to GET query parameters from the URL
$slackName = $_GET['slack_name'] ?? 'Lone Wolf';
$track = $_GET['track'] ?? 'backend';

// the response JSON
$data = [
    "slack_name" => $slackName,
    "current_day" => getCurrentDay(),
    "utc_time" => getCurrentUTCTime(),
    "track" => $track,
    "github_file_url" => "https://github.com/username/repo/blob/main/file_name.ext",
    "github_repo_url" => "https://github.com/username/repo",
    "status_code" => 200
];

// response headers 
header('Content-Type: application/json');

// response
echo json_encode($data);
?>
