# Settings

APIs for managing all application settings

## GET settings

<small class="badge badge-darkred">requires authentication</small>

Get all information of all setting.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/settings" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings"
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
    'http://localhost/api/v1/settings',
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
        "0": {
            "key": "user_registration",
            "value": "true",
            "tenant": "main"
        },
        "1": {
            "key": "ip_restriction",
            "value": "localhost",
            "tenant": "main"
        }
    }
}
```
> Example response (401):

```json
{
    "message": "api.exceptions.unauthorized.message"
}
```
<div id="execution-results-GETapi-v1-settings" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-settings"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-settings"></code></pre>
</div>
<div id="execution-error-GETapi-v1-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-settings"></code></pre>
</div>
<form id="form-GETapi-v1-settings" data-method="GET" data-path="api/v1/settings" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-settings', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-GETapi-v1-settings" onclick="tryItOut('GETapi-v1-settings');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-settings" onclick="cancelTryOut('GETapi-v1-settings');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-settings" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/settings</code></b>
</p>
<p>
<label id="auth-GETapi-v1-settings" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-settings" data-component="header"></label>
</p>
</form>


## GET settings/{key}

<small class="badge badge-darkred">requires authentication</small>

Get the information about a specific setting by his key.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/settings/rerum" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings/rerum"
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
    'http://localhost/api/v1/settings/rerum',
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
<div id="execution-results-GETapi-v1-settings--key-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-settings--key-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-settings--key-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-settings--key-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-settings--key-"></code></pre>
</div>
<form id="form-GETapi-v1-settings--key-" data-method="GET" data-path="api/v1/settings/{key}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-settings--key-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-GETapi-v1-settings--key-" onclick="tryItOut('GETapi-v1-settings--key-');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-settings--key-" onclick="cancelTryOut('GETapi-v1-settings--key-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-settings--key-" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/settings/{key}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-settings--key-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-settings--key-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>key</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="key" data-endpoint="GETapi-v1-settings--key-" data-component="url" required  hidden>
<br>
</p>
</form>


## PATCH settings/{key}

<small class="badge badge-darkred">requires authentication</small>

Update the value of an application's setting.

> Example request:

```bash
curl -X PATCH \
    "http://localhost/api/v1/settings/natus" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"value":"ea","key":"voluptatem"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings/natus"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "value": "ea",
    "key": "voluptatem"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://localhost/api/v1/settings/natus',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'value' => 'ea',
            'key' => 'voluptatem',
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
<div id="execution-results-PATCHapi-v1-settings--key-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-v1-settings--key-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-settings--key-"></code></pre>
</div>
<div id="execution-error-PATCHapi-v1-settings--key-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-settings--key-"></code></pre>
</div>
<form id="form-PATCHapi-v1-settings--key-" data-method="PATCH" data-path="api/v1/settings/{key}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-settings--key-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-tryout-PATCHapi-v1-settings--key-" onclick="tryItOut('PATCHapi-v1-settings--key-');">Try it out ⚡</button>
        <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-v1-settings--key-" onclick="cancelTryOut('PATCHapi-v1-settings--key-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius 5px; border-width: thin;" id="btn-executetryout-PATCHapi-v1-settings--key-" hidden>Send Request 💥</button>
</h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/v1/settings/{key}</code></b>
</p>
<p>
<label id="auth-PATCHapi-v1-settings--key-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-v1-settings--key-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>key</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="key" data-endpoint="PATCHapi-v1-settings--key-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="value" data-endpoint="PATCHapi-v1-settings--key-" data-component="body" required  hidden>
<br>
Value of the setting.</p>
<p>
<b><code>key</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="key" data-endpoint="PATCHapi-v1-settings--key-" data-component="body" required  hidden>
<br>
Key of the setting you want to edit.</p>

</form>



