<?php
ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

 // set cookie parameters
session_set_cookie_params([
  "lifetime" => 1800,
  "domain" => "www.yourdomain.com",
  "path" => "/",
  "secure" => true,
  "httponly" => true
]);

session_start();

if(!isset($_SESSION["last_session_regen"])){  // check if session exists
  session_regeneration_id(true); // regenerate session ID
  $_SESSION["last_session_regen"] = time(); // set regeneration time to current time
}else{
  $interval = 60 * 30; // regenerate session ID after 30 minutes or 1800 seconds
  if(time() - $_SESSION["last_session_regen"] >= $interval) { // check if regenerate time has passed
    session_regeneration_id(true); // regenerate session ID
    $_SESSION["last_session_regen"] = time(); // set regeneration time to current time
  }
}
