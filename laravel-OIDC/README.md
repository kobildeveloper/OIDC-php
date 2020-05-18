<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# mIDentity One OpenId Connect Core PHP Example
This is a PHP Laravel app that has been modified to support OpenId Connect Authorization Code flow via mIDentity One.

## Prerequisites
This example requires [XAMPP/PHP 7.0+].

You will also need mIDentity One account. If you don't have one you can [create a free account here](https://midentity.one/selfenrollment).

Most importantly you will need to create an OpenId Connect app under mIDentity Admin portal. [You can read more about how to do that after login].

We are using Guzzle HTTP client <a href="https://laravel.com/docs/7.x/http-client">https://laravel.com/docs/7.x/http-client</a>

## Setup 1.
You can pull the source of this example and past in to in your [xampp/htdocs] directory.

## Setup 2.
Rename your .env.example file to .env
Got to [.env] change the ClientId, ClientSecret &amp; configuration.

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
Make sure you replace `your-midentity-one-oidc-app-client-id` and `your-midentity-one-oidc-app-client-secret` with the values provided when you created your OpenId Connect app via the midentity one portal.

Change `{partnerid}.{hostname}` to match the sub-domain by mIDentity One portal.

Go to your laravel directory and clear cache using following command
```
php artisan cache:clear
php artisan config:cache
```

## Setup 3
Start laravel development server using following command
```
php artisan serve
```
You Got responce like "Laravel development server started: http://127.0.0.1:8000"

your application will be run in http://127.0.0.1:8000


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

