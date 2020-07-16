---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Authentication


APIs for users's authentication
<!-- START_2be1f0e022faf424f18f30275e61416e -->
## auth/login

Get a JWT Token thought the given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"john@doe.com","password":"secret"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john@doe.com",
    "password": "secret"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/v1/auth/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'john@doe.com',
            'password' => 'secret',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "access_token": "e[...]7QOlDpr3d-tGUSTCefyjYN7tBIg",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```
> Example response (403):

```json
{
    "message": "api.v1.auth.login.invalid_credentials"
}
```

### HTTP Request
`POST api/v1/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The mail of the user.
        `password` | string |  required  | The password of the user.
    
<!-- END_2be1f0e022faf424f18f30275e61416e -->

<!-- START_3157fb6d77831463001829403e201c3e -->
## auth/register

Register a new user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"John Doe","email":"john@doe.com","password":"secret"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "john@doe.com",
    "password": "secret"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/v1/auth/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => 'secret',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (423):

```json
{
    "message": "api.v1.auth.register.register_disabled"
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "name": "Israel Schuppe",
        "created_at": null
    }
}
```

### HTTP Request
`POST api/v1/auth/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the user.
        `email` | string |  required  | The mail of the user.
        `password` | string |  required  | The password of the user.
    
<!-- END_3157fb6d77831463001829403e201c3e -->

<!-- START_55b4bd354f636859e328381ad837a615 -->
## auth/@me

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get information about current authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/auth/@me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/@me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/v1/auth/@me',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "name": "Dr. Vivian Medhurst",
        "created_at": null
    }
}
```

### HTTP Request
`GET api/v1/auth/@me`


<!-- END_55b4bd354f636859e328381ad837a615 -->


