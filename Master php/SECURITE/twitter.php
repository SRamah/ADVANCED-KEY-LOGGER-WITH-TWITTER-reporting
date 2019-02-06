<?php
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "735554813233106944-CuamEAV0Mv082lHMZPDoc6sTtNZlfHG",
'oauth_access_token_secret' => "t2YxSnyWheCwT49e6weG59oEicpXZEeHEAZxwiY6wRbAy",
'consumer_key' => "kPjjKOnvhn0EmUb0ZIf8Hxds9",
'consumer_secret' => "89vPVQ5nbSk5wsopP6BCjSD1gpBGb96JpZH1pefxtbeOTfy6j8"
);
//https://api.twitter.com/1.1/account/verify_credentials.json
//"https://api.twitter.com/1.1/statuses/user_timeline.json"
$url = "https://api.twitter.com/1.1/account/verify_credentials.json";
$requestMethod = "GET";
$getfield = '?screen_name=sadiqi_hamza&count=100';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
echo "<pre>";
echo ($string["status"]["text"]);
echo ("<br/>");

echo "</pre>";
?>