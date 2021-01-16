# User

Gender endpoints

## User profile


Get authenticated user profile

@@apiResource App\Http\Resources\UserResource

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile"></code></pre>
</div>
<div id="execution-error-GETapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile"></code></pre>
</div>
<form id="form-GETapi-profile" data-method="GET" data-path="api/profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-profile" onclick="tryItOut('GETapi-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-profile" onclick="cancelTryOut('GETapi-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/profile</code></b>
</p>
</form>


## Update Profile


User can edit the profile data

> Example request:

```bash
curl -X POST \
    "http://localhost/api/update_profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"quia","last_name":"qui"}'

```

```javascript
const url = new URL(
    "http://localhost/api/update_profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "quia",
    "last_name": "qui"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "type": "user",
    "id": "",
    "attributes": {
        "firstName": "Patrick",
        "lastName": "Nzioki",
        "name": "Patrick Nzioki",
        "email": "patrick@authentication.com"
    },
    "relationships": {
        "email": [
            []
        ],
        "phone": [
            []
        ]
    },
    "links": {
        "self": "http:\/\/localhost\/api\/update_profile"
    }
}
```
<div id="execution-results-POSTapi-update_profile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-update_profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-update_profile"></code></pre>
</div>
<div id="execution-error-POSTapi-update_profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-update_profile"></code></pre>
</div>
<form id="form-POSTapi-update_profile" data-method="POST" data-path="api/update_profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-update_profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-update_profile" onclick="tryItOut('POSTapi-update_profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-update_profile" onclick="cancelTryOut('POSTapi-update_profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-update_profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/update_profile</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-update_profile" data-component="body" required  hidden>
<br>
The user baptismal or first name.</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-update_profile" data-component="body" required  hidden>
<br>
The user family name.</p>

</form>



