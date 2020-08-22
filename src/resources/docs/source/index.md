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


APIs for user's authentication
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

<!-- START_9d5e122f10d36b090ba7c2ea8e2823b9 -->
## auth/logout

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Logout the user (Invalidate the token).

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost/api/v1/auth/logout',
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


> Example response (204):

```json
null
```

### HTTP Request
`DELETE api/v1/auth/logout`


<!-- END_9d5e122f10d36b090ba7c2ea8e2823b9 -->

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
        "name": "Bianka Smitham",
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
        "name": "Destiny Schaefer",
        "created_at": null
    }
}
```

### HTTP Request
`GET api/v1/auth/@me`


<!-- END_55b4bd354f636859e328381ad837a615 -->

<!-- START_1c1379ad98c1e4337433460cbb47992e -->
## auth/refresh

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Refresh a token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/v1/auth/refresh',
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
        "access_token": "e[...]7QOlDpr3d-tGUSTCefyjYN7tBIg",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```

### HTTP Request
`POST api/v1/auth/refresh`


<!-- END_1c1379ad98c1e4337433460cbb47992e -->

#Settings


APIs for managing all application settings
<!-- START_0f7c405a059a084f42490f2decb1584b -->
## GET settings

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get all information of all setting.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings"
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
    'http://localhost/api/v1/settings',
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
    "data": [
        {
            "key": "user_registration",
            "value": "true",
            "tenant": "main"
        },
        {
            "key": "ip_restriction",
            "value": "localhost",
            "tenant": "main"
        }
    ]
}
```
> Example response (401):

```json
{
    "message": "api.exceptions.unauthorized.message"
}
```

### HTTP Request
`GET api/v1/settings`


<!-- END_0f7c405a059a084f42490f2decb1584b -->

<!-- START_f25c525ba24103f0b3a6d8679fd774a1 -->
## GET settings/{key}

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get the information about a specific setting by his key.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings/1"
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
    'http://localhost/api/v1/settings/1',
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
        "key": "ip_restriction",
        "value": "localhost"
    }
}
```
> Example response (401):

```json
{
    "message": "api.exceptions.unauthorized.message"
}
```
> Example response (404):

```json
{
    "message": "api.v1.setting.edit.key_not_found"
}
```

### HTTP Request
`GET api/v1/settings/{key}`


<!-- END_f25c525ba24103f0b3a6d8679fd774a1 -->

<!-- START_8160535484238186c6fc75dbecd04639 -->
## PATCH settings/{key}

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Update the value of an application's setting.

> Example request:

```bash
curl -X PATCH \
    "http://localhost/api/v1/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"key":"aliquid","value":"aliquid"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "key": "aliquid",
    "value": "aliquid"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://localhost/api/v1/settings/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'key' => 'aliquid',
            'value' => 'aliquid',
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
        "key": "ip_restriction",
        "value": "localhost"
    }
}
```
> Example response (401):

```json
{
    "message": "api.exceptions.unauthorized.message"
}
```
> Example response (404):

```json
{
    "message": "api.v1.setting.edit.key_not_found"
}
```

### HTTP Request
`PATCH api/v1/settings/{key}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `key` | string |  required  | Key of the setting you want to edit.
        `value` | string |  required  | Value of the setting.
    
<!-- END_8160535484238186c6fc75dbecd04639 -->


