<?php
require_once('settings.php');
require_once('google-calendar-api.php');

try {
$capi = new GoogleCalendarApi();
$data = $capi->GetRefreshedAccessToken(CLIENT_ID, REFRESH_TOKEN, CLIENT_SECRET);
$access_token = $data['access_token'];

$user_timezone = $capi->GetUserCalendarTimezone($access_token);

die($user_timezone);

}
catch(Exception $e) {
echo $e->getMessage();
exit();
}