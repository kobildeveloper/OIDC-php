<?php 
session_start();

define("ClientId", "your-midentity-one-oidc-app-client-id");
define("ClientSecret", "your-midentity-one-oidc-app-client-secret");
define("AccessTokenUri", "https://{partnerid}.{hostname}/digitanium/v1/login");
define("LogoutUrl", "https://{partnerid}.{hostname}/digitanium/v1/logout");
define("Scope", "openid,offline_access,profile,email,address,phone,roles,web-origins");
define("UserInfoUri", "https://{partnerid}.{hostname}/digitanium/v1/userinfo");
define("LandingUrl", "http://localhost/testing"); //Ex. http://localhost/oide_example  https://example.com

define("UserAuthorizationUri", "https://{partnerid}.{hostname}/digitanium/v1/auth");
define("GrantTypes", "authorization_code");

if(isset($_GET['code'])){
	$UserInfo=getUserInfo(getAccessToken($_GET['code']));
	header("Location: ".LandingUrl);
}
?>
 