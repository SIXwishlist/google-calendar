<?php
require_once('settings.php');
require_once('google-calendar-api.php');

$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=offline&prompt=consent';

if(isset($_GET['code'])) {
try {
$capi = new GoogleCalendarApi();
$data = $capi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
print_r($data);
die();

}
catch(Exception $e) {
echo $e->getMessage();
exit();
}
}
?>

<a href="<?= $login_url ?>">Login with Google</a>