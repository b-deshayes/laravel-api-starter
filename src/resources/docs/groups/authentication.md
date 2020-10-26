# Authentication

APIs for user's authentication

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
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
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
<div id="execution-results-POSTapi-v1-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-login"></code></pre>
</div>
<form id="form-POSTapi-v1-auth-login" data-method="POST" data-path="api/v1/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-auth-login" onclick="tryItOut('POSTapi-v1-auth-login');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-auth-login" onclick="cancelTryOut('POSTapi-v1-auth-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-auth-login" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/auth/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-auth-login" data-component="body" required  hidden>
<br>
The mail of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-auth-login" data-component="body" required  hidden>
<br>
The password of the user.</p>

</form>


## auth/logout

<small class="badge badge-darkred">requires authentication</small>

Logout the user (Invalidate the token).

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/auth/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost/api/v1/auth/logout',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
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
<Empty response>
```
<div id="execution-results-DELETEapi-v1-auth-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-auth-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-auth-logout"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-auth-logout"></code></pre>
</div>
<form id="form-DELETEapi-v1-auth-logout" data-method="DELETE" data-path="api/v1/auth/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-auth-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-DELETEapi-v1-auth-logout" onclick="tryItOut('DELETEapi-v1-auth-logout');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-v1-auth-logout" onclick="cancelTryOut('DELETEapi-v1-auth-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-DELETEapi-v1-auth-logout" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/v1/auth/logout</code></b>
</p>
<p>
<label id="auth-DELETEapi-v1-auth-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-v1-auth-logout" data-component="header"></label>
</p>
</form>


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
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
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
<div id="execution-results-POSTapi-v1-auth-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-auth-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-register"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-register"></code></pre>
</div>
<form id="form-POSTapi-v1-auth-register" data-method="POST" data-path="api/v1/auth/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-auth-register" onclick="tryItOut('POSTapi-v1-auth-register');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-auth-register" onclick="cancelTryOut('POSTapi-v1-auth-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-auth-register" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/auth/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-v1-auth-register" data-component="body" required  hidden>
<br>
The name of the user.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-auth-register" data-component="body" required  hidden>
<br>
The mail of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-auth-register" data-component="body" required  hidden>
<br>
The password of the user.</p>

</form>


## auth/@me

<small class="badge badge-darkred">requires authentication</small>

Get information about current authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/auth/@me" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/@me"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/v1/auth/@me',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "could not find driver (SQL: select column_name as `column_name` from information_schema.columns where table_schema = inventory and table_name = roles)",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Connection.php",
    "line": 671,
    "trace": [
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Connection.php",
            "line": 631,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Connection.php",
            "line": 339,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Schema\/MySqlBuilder.php",
            "line": 33,
            "function": "select",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Eloquent\/Concerns\/GuardsAttributes.php",
            "line": 222,
            "function": "getColumnListing",
            "class": "Illuminate\\Database\\Schema\\MySqlBuilder",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Eloquent\/Concerns\/GuardsAttributes.php",
            "line": 208,
            "function": "isGuardableColumn",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Eloquent\/Concerns\/GuardsAttributes.php",
            "line": 185,
            "function": "isGuarded",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Eloquent\/Model.php",
            "line": 351,
            "function": "isFillable",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Eloquent\/Model.php",
            "line": 174,
            "function": "fill",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/spatie\/laravel-permission\/src\/Models\/Role.php",
            "line": 26,
            "function": "__construct",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "function": "__construct",
            "class": "Spatie\\Permission\\Models\\Role",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 849,
            "function": "newInstanceArgs",
            "class": "ReflectionClass",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 691,
            "function": "build",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 796,
            "function": "resolve",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 637,
            "function": "resolve",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 781,
            "function": "make",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 959,
            "function": "make",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 879,
            "function": "resolveClass",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 840,
            "function": "resolveDependencies",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 691,
            "function": "build",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 796,
            "function": "resolve",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 269,
            "function": "resolve",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 805,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 691,
            "function": "build",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 796,
            "function": "resolve",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 637,
            "function": "resolve",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 781,
            "function": "make",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 959,
            "function": "make",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 879,
            "function": "resolveClass",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 840,
            "function": "resolveDependencies",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 691,
            "function": "build",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 796,
            "function": "resolve",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 269,
            "function": "resolve",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 805,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 691,
            "function": "build",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 796,
            "function": "resolve",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 637,
            "function": "resolve",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 781,
            "function": "make",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 959,
            "function": "make",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 879,
            "function": "resolveClass",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 840,
            "function": "resolveDependencies",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 691,
            "function": "build",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 796,
            "function": "resolve",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 637,
            "function": "resolve",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
            "line": 781,
            "function": "make",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 269,
            "function": "make",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 990,
            "function": "getController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 951,
            "function": "controllerMiddleware",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 708,
            "function": "gatherMiddleware",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 684,
            "function": "gatherRouteMiddleware",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 668,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 634,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 623,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 323,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 235,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 171,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 126,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 596,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 258,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/symfony\/console\/Application.php",
            "line": 920,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/symfony\/console\/Application.php",
            "line": 266,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/symfony\/console\/Application.php",
            "line": 142,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/app\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETapi-v1-auth-@me" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-auth-@me"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-auth-@me"></code></pre>
</div>
<div id="execution-error-GETapi-v1-auth-@me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-auth-@me"></code></pre>
</div>
<form id="form-GETapi-v1-auth-@me" data-method="GET" data-path="api/v1/auth/@me" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-auth-@me', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-GETapi-v1-auth-@me" onclick="tryItOut('GETapi-v1-auth-@me');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-auth-@me" onclick="cancelTryOut('GETapi-v1-auth-@me');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-auth-@me" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/auth/@me</code></b>
</p>
<p>
<label id="auth-GETapi-v1-auth-@me" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-auth-@me" data-component="header"></label>
</p>
</form>


## auth/refresh

<small class="badge badge-darkred">requires authentication</small>

Refresh a token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/auth/refresh" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/auth/refresh"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/v1/auth/refresh',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
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
<div id="execution-results-POSTapi-v1-auth-refresh" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-auth-refresh"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-refresh"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-auth-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-refresh"></code></pre>
</div>
<form id="form-POSTapi-v1-auth-refresh" data-method="POST" data-path="api/v1/auth/refresh" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-refresh', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-auth-refresh" onclick="tryItOut('POSTapi-v1-auth-refresh');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-auth-refresh" onclick="cancelTryOut('POSTapi-v1-auth-refresh');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-auth-refresh" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/auth/refresh</code></b>
</p>
<p>
<label id="auth-POSTapi-v1-auth-refresh" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-v1-auth-refresh" data-component="header"></label>
</p>
</form>



