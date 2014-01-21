<?php
if($setting->getSetting($dbHandle,3) != "" && $setting->getSetting($dbHandle,15) != ""){
  // Create Facebook api Object
  $facebook = new Facebook(array(
    'appId'  => $setting->getSetting($dbHandle,3),
    'secret' => $setting->getSetting($dbHandle,15),
    'fileUpload' => true
  ));
  
  // Check User Login
  $user = $facebook->getUser();
  
  // Call api
  if($user){
      try{
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
      }
    catch(FacebookApiException $e){
      error_log($e);
      $user = null;
    }
  }
  
  // Get Login , Logout URL
  if($user){
    $logoutUrl = $facebook->getLogoutUrl();
  }
  else{
    $loginUrl = $facebook->getLoginUrl(array('scope' => 'email,read_stream'));
  }
}
?>