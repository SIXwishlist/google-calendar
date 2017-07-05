<?php
require_once('settings.php');
require_once('google-calendar-api.php');

$event = array('title' => 'test', 'event_time' => Array ( 'start_time' => '2017-06-22T12:12:00', 'end_time' => '2017-06-26T12:12:00', 'event_date' => ''), 'all_day' => 0 );

try {
	$capi = new GoogleCalendarApi();
	$data = $capi->GetRefreshedAccessToken(CLIENT_ID, REFRESH_TOKEN, CLIENT_SECRET);
	$access_token = $data['access_token'];

	$user_timezone = $capi->GetUserCalendarTimezone($access_token);
	
	$event_id = $capi->CreateCalendarEvent('primary', $event['title'], $event['all_day'], $event['event_time'], $user_timezone, $access_token);
	echo 'Event has been created with ID ' . $event_id;

}
catch(Exception $e) {
	echo $e->getMessage();
	exit();
}