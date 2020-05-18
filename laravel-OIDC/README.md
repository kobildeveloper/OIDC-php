# mIDentity One OpenId Connect Laravel PHP Example
This is a PHP Laravel app that has been modified to support OpenID Connect Authorization Code flow via mIDentity One.

## Prerequisites
This example requires [XAMPP/PHP 7.0+].

You will also need mIDentity One account. If you don't have one you can [create a free account here](https://midentity.one/selfenrollment).

Most importantly you will need to create an OpenId Connect app under mIDentity Admin portal. [You can read more about how to do that after login].

We are using Guzzle HTTP client <a href="https://laravel.com/docs/7.x/http-client">https://laravel.com/docs/7.x/http-client</a>

## Setup 1.
You can pull the source directory of this example and paste it into your [xampp/htdocs] directory.

## Setup 2.
Rename [.env.example] file to [.env]. Navigate to [.env] file and change ClientId, ClientSecret &amp; configuration.

```
OIDC_ClientId=your-midentity-one-oidc-app-client-id
OIDC_ClientSecret=your-midentity-one-oidc-app-client-secret
OIDC_AccessTokenUri=https://{partnerid}.{hostname}/digitanium/v1/login
OIDC_LogoutUrl=https://{partnerid}.{hostname}/digitanium/v1/logout
OIDC_Scope=openid,offline_access,profile,email,address,phone,roles,web-origins
OIDC_UserInfoUri=https://{partnerid}.{hostname}/digitanium/v1/userinfo
OIDC_UserAuthorizationUri=https://{partnerid}.{hostname}/digitanium/v1/auth
OIDC_GrantTypes=authorization_code
```
Make sure you replace `your-midentity-one-oidc-app-client-id` and `your-midentity-one-oidc-app-client-secret` with the values provided when you created your OpenID Connect app via the midentity one portal.

Change `{partnerid}.{hostname}` to match the sub-domain by mIDentity One portal.

Go to your Laravel directory, update composer and clear cache using following commands:
```
composer update
php artisan cache:clear
php artisan config:cache
```

## Setup 3
Start laravel development server using following command:
```
php artisan serve
```
You will receive a response "Laravel development server started: http://127.0.0.1:8000" after executing the command and your application will be runing at http://127.0.0.1:8000

