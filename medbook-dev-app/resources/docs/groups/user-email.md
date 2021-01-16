# User Email

Gender endpoints

## Email Addresses


Select user email addresses

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/email"
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


> Example response (200):

```json
[
    {
        "type": "email",
        "id": "",
        "attributes": {
            "email": "patrick@authentication.com",
            "primary": true,
            "verified": true
        }
    },
    {
        "type": "email",
        "id": "",
        "attributes": {
            "email": "patrick@authentication.com",
            "primary": true,
            "verified": true
        }
    }
]
```
<div id="execution-results-GETapi-email" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-email"></code></pre>
</div>
<div id="execution-error-GETapi-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-email"></code></pre>
</div>
<form id="form-GETapi-email" data-method="GET" data-path="api/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-email" onclick="tryItOut('GETapi-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-email" onclick="cancelTryOut('GETapi-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/email</code></b>
</p>
</form>


## Add email address


Create a new user email address

> Example request:

```bash
curl -X POST \
    "http://localhost/api/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"stephan.dibbert@example.net","primary":false,"verified":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "stephan.dibbert@example.net",
    "primary": false,
    "verified": false
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
    "type": "email",
    "id": "",
    "attributes": {
        "email": "patrick@authentication.com",
        "primary": true,
        "verified": true
    }
}
```
<div id="execution-results-POSTapi-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-email"></code></pre>
</div>
<div id="execution-error-POSTapi-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-email"></code></pre>
</div>
<form id="form-POSTapi-email" data-method="POST" data-path="api/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-email" onclick="tryItOut('POSTapi-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-email" onclick="cancelTryOut('POSTapi-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-email" data-component="body" required  hidden>
<br>
The user email The value must be a valid email address.</p>
<p>
<b><code>primary</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-email" hidden><input type="radio" name="primary" value="true" data-endpoint="POSTapi-email" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-email" hidden><input type="radio" name="primary" value="false" data-endpoint="POSTapi-email" data-component="body" ><code>false</code></label>
<br>
True if the number is primary, else, false.</p>
<p>
<b><code>verified</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-email" hidden><input type="radio" name="verified" value="true" data-endpoint="POSTapi-email" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-email" hidden><input type="radio" name="verified" value="false" data-endpoint="POSTapi-email" data-component="body" ><code>false</code></label>
<br>
True if the number is verified, else, false.</p>

</form>


## Edit email address


Update a user email address

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/email/veniam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"asha93@example.com","primary":false,"verified":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/email/veniam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "asha93@example.com",
    "primary": false,
    "verified": false
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "type": "email",
    "id": "",
    "attributes": {
        "email": "patrick@authentication.com",
        "primary": true,
        "verified": true
    }
}
```
<div id="execution-results-PUTapi-email--email-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-email--email-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-email--email-"></code></pre>
</div>
<div id="execution-error-PUTapi-email--email-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-email--email-"></code></pre>
</div>
<form id="form-PUTapi-email--email-" data-method="PUT" data-path="api/email/{email}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-email--email-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-email--email-" onclick="tryItOut('PUTapi-email--email-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-email--email-" onclick="cancelTryOut('PUTapi-email--email-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-email--email-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/email/{email}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/email/{email}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-email--email-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-email--email-" data-component="body" required  hidden>
<br>
The user email The value must be a valid email address.</p>
<p>
<b><code>primary</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-email--email-" hidden><input type="radio" name="primary" value="true" data-endpoint="PUTapi-email--email-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-email--email-" hidden><input type="radio" name="primary" value="false" data-endpoint="PUTapi-email--email-" data-component="body" ><code>false</code></label>
<br>
True if the number is primary, else, false.</p>
<p>
<b><code>verified</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-email--email-" hidden><input type="radio" name="verified" value="true" data-endpoint="PUTapi-email--email-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-email--email-" hidden><input type="radio" name="verified" value="false" data-endpoint="PUTapi-email--email-" data-component="body" ><code>false</code></label>
<br>
True if the number is verified, else, false.</p>

</form>


## Delete email address


Remove a user email address

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/email/animi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/email/animi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "type": "email",
    "id": "",
    "attributes": {
        "email": "patrick@authentication.com",
        "primary": true,
        "verified": true
    }
}
```
<div id="execution-results-DELETEapi-email--email-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-email--email-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-email--email-"></code></pre>
</div>
<div id="execution-error-DELETEapi-email--email-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-email--email-"></code></pre>
</div>
<form id="form-DELETEapi-email--email-" data-method="DELETE" data-path="api/email/{email}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-email--email-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-email--email-" onclick="tryItOut('DELETEapi-email--email-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-email--email-" onclick="cancelTryOut('DELETEapi-email--email-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-email--email-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/email/{email}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="DELETEapi-email--email-" data-component="url" required  hidden>
<br>
</p>
</form>



