# Laravel Hydra
Laravel Hydra is a package that provides Client API for Hydra support Laravel and following the newest of PHP version.

![Laravel Hydra Cover](https://user-images.githubusercontent.com/4938568/153674325-d98af9de-cd43-46de-a4ca-34b1b5935aa2.jpg)

## What is Hydra?
Hydra is an OAuth 2.0 and OpenID Connect Provider. In other words, an implementation of the OAuth 2.0 Authorization Framework as well as the OpenID Connect Core 1.0 framework. As such, it issues OAuth 2.0 Access, Refresh, and ID Tokens that enable third-parties to access your APIs in the name of your users.

## Inspiration ❤️❤️❤️
This is not the official Ory Hydra SDK for php.
If you want to use the official SDK, please use the official [Ory Hydra SDK](https://github.com/ory/hydra-client-php)

## Installation
``
composer require altelma/laravel-hydra
``

## Usage
```
// Create OAuth Client
$adminApi = new AdminApi();
$adminApi->createOAuth2Client([
    "client_id" => "my-client-id",
    "client_name" => "My Client ID",
    "client_secret" => Str::random(32),
    "scope" => "offline offline_access openid phone email profile",
    "owner" => "Your company or your 3rd",
    "client_uri" => "https://your-company.com",
    "logo_uri" => "https://your-client-app.com/logo.png",
    "redirect_uris" => [
        "http://localhost:8000/hydra/callback",
    ],
    "grant_types" => [
        "authorization_code|refresh_token"
    ],
    "response_types" => [
        "code|id_token"
    ],
]);


// Verify Token
$publicApi = new PublicApi();
$publicApi->introspectOAuth2Token('your-token');
```

## Reference
HTTP API Documentation: https://www.ory.sh/hydra/docs/reference/api

## สนับสนุนผมได้นะ ☕
สวัสดีเพื่อนๆ ทุกคนนะครับ หากมีข้อเสนอแนะอะไร แนะนำมาได้นะครับ 
นอกจากนี้ เพื่อนๆ สามารถแวะไปอ่านบทความของผมเพิ่มเติมได้ [ที่นี่](https://medium.com/@altelma) ครับ

## Bug Report
This package is not perfect right, but can be improve together. If you found bug or have any suggestion. Send that to me or new issue. Thank you to use it.
