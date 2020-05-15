# mIDentity One OpenId Connect Core PHP Example
This is a PHP app that has been modified to support OpenId Connect Authorization Code flow via mIDentity One.

## Prerequisites
This example requires [XAMPP/PHP 7.0+].

You will also need mIDentity One account. If you don't have one you can [create a free account here](https://midentity.one/selfenrollment).

Most importantly you will need to create an OpenId Connect app under mIDentity Admin portal. [You can read more about how to do that after login].

## Setup 1.
You can pull the source of this example and past in to in your [xampp/htdocs] directory.

## Setup 2.
Got to [inc/config.php] change the ClientId, ClientSecret, HomeUrl &amp; configuration.

```
define("ClientId", "your-midentity-one-oidc-app-client-id");
define("ClientSecret", "your-midentity-one-oidc-app-client-secret");
define("AccessTokenUri", "https://{partnerid}.{hostname}/digitanium/v1/login");
define("LogoutUrl", "https://{partnerid}.{hostname}/digitanium/v1/logout");
define("UserAuthorizationUri", "https://{partnerid}.{hostname}/digitanium/v1/auth");
define("UserInfoUri", "https://{partnerid}.{hostname}/digitanium/v1/userinfo");
define("HomeUrl", "your-app-home-url");
```
Make sure you replace `your-midentity-one-oidc-app-client-id` and `your-midentity-one-oidc-app-client-secret` with the values provided when you created your OpenId Connect app via the midentity one portal.

Change `{partnerid}.{hostname}` to match the sub-domain by mIDentity One portal.

## Setup 3
Run the sample in your Web browser

Your app will be available at http://localhost/your-directory-name and you should see a **mIDentity One** link. Click on the link to startthe login process.