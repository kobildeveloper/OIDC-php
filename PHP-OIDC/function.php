<?php 
include('inc/config.php');
function getAccessToken($code){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => AccessTokenUri,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => 'grant_type='.GrantTypes.'&client_id='.ClientId.'&client_secret='.ClientSecret.'&redirect_uri='.LandingUrl.'/&code='.$code,
	  CURLOPT_HTTPHEADER => array(
		"Content-Type: application/x-www-form-urlencoded"
	  ),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$tokenArray=json_decode($response, true);
	if(isset($tokenArray['refresh_token']) && isset($tokenArray['access_token'])){
		$_SESSION['refresh_token']=$tokenArray['refresh_token'];;
		$_SESSION['access_token']=$tokenArray['access_token'];
		return $access_token=$tokenArray['access_token'];	
	}
	return '';
	
}
function getUserInfo($access_token){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => UserInfoUri,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"authorization: Bearer $access_token",
		"cache-control: no-cache",
		"content-type: application/json",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	$UserInfo="";
	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
		$UserInfo=json_decode($response, true);
		$_SESSION['user_info']=$UserInfo;
		
	}
	return $UserInfo;
}

function logOut($access_token,$refresh_token){
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => LogoutUrl,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	   CURLOPT_POSTFIELDS => 'client_id='.ClientId.'&client_secret='.ClientSecret.'&refresh_token='.$refresh_token,
	  CURLOPT_HTTPHEADER => array(
		"authorization: Bearer $access_token",
		"cache-control: no-cache",
		"content-type: application/x-www-form-urlencoded",
	  ),
	));

	$response = curl_exec($curl);
	curl_close($curl);
	
}