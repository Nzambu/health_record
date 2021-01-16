# User Phone Number

Gender endpoints

## Phone Number/s


Select user phone numbers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/phone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/phone"
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
        "type": "phone",
        "id": "",
        "attributes": {
            "phone": "7123456",
            "primary": true,
            "verified": true
        }
    },
    {
        "type": "phone",
        "id": "",
        "attributes": {
            "phone": "7123456",
            "primary": true,
            "verified": true
        }
    }
]
```
<div id="execution-results-GETapi-phone" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-phone"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-phone"></code></pre>
</div>
<div id="execution-error-GETapi-phone" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-phone"></code></pre>
</div>
<form id="form-GETapi-phone" data-method="GET" data-path="api/phone" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-phone', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-phone" onclick="tryItOut('GETapi-phone');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-phone" onclick="cancelTryOut('GETapi-phone');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-phone" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/phone</code></b>
</p>
</form>


## Add phone number


Create a new user phone number

> Example request:

```bash
curl -X POST \
    "http://localhost/api/phone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"phone":18,"primary":false,"verified":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/phone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": 18,
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
    "type": "phone",
    "id": "",
    "attributes": {
        "phone": "7123456",
        "primary": true,
        "verified": true
    }
}
```
<div id="execution-results-POSTapi-phone" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-phone"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-phone"></code></pre>
</div>
<div id="execution-error-POSTapi-phone" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-phone"></code></pre>
</div>
<form id="form-POSTapi-phone" data-method="POST" data-path="api/phone" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-phone', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-phone" onclick="tryItOut('POSTapi-phone');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-phone" onclick="cancelTryOut('POSTapi-phone');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-phone" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/phone</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="phone" data-endpoint="POSTapi-phone" data-component="body" required  hidden>
<br>
The user phone number.</p>
<p>
<b><code>primary</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-phone" hidden><input type="radio" name="primary" value="true" data-endpoint="POSTapi-phone" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-phone" hidden><input type="radio" name="primary" value="false" data-endpoint="POSTapi-phone" data-component="body" ><code>false</code></label>
<br>
True if the number is primary, else, false.</p>
<p>
<b><code>verified</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-phone" hidden><input type="radio" name="verified" value="true" data-endpoint="POSTapi-phone" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-phone" hidden><input type="radio" name="verified" value="false" data-endpoint="POSTapi-phone" data-component="body" ><code>false</code></label>
<br>
True if the number is verified, else, false.</p>

</form>


## Edit phone number


Update a user phone number

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/phone/ad" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"phone":18,"primary":false,"verified":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/phone/ad"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": 18,
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
    "type": "phone",
    "id": "",
    "attributes": {
        "phone": "7123456",
        "primary": true,
        "verified": true
    }
}
```
<div id="execution-results-PUTapi-phone--phone-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-phone--phone-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-phone--phone-"></code></pre>
</div>
<div id="execution-error-PUTapi-phone--phone-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-phone--phone-"></code></pre>
</div>
<form id="form-PUTapi-phone--phone-" data-method="PUT" data-path="api/phone/{phone}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-phone--phone-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-phone--phone-" onclick="tryItOut('PUTapi-phone--phone-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-phone--phone-" onclick="cancelTryOut('PUTapi-phone--phone-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-phone--phone-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/phone/{phone}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/phone/{phone}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-phone--phone-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="phone" data-endpoint="PUTapi-phone--phone-" data-component="body" required  hidden>
<br>
The user phone number.</p>
<p>
<b><code>primary</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-phone--phone-" hidden><input type="radio" name="primary" value="true" data-endpoint="PUTapi-phone--phone-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-phone--phone-" hidden><input type="radio" name="primary" value="false" data-endpoint="PUTapi-phone--phone-" data-component="body" ><code>false</code></label>
<br>
True if the number is primary, else, false.</p>
<p>
<b><code>verified</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-phone--phone-" hidden><input type="radio" name="verified" value="true" data-endpoint="PUTapi-phone--phone-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-phone--phone-" hidden><input type="radio" name="verified" value="false" data-endpoint="PUTapi-phone--phone-" data-component="body" ><code>false</code></label>
<br>
True if the number is verified, else, false.</p>

</form>


## Delete phone number


Remove a user phone number

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/phone/quasi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/phone/quasi"
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
    "type": "phone",
    "id": "",
    "attributes": {
        "phone": "7123456",
        "primary": true,
        "verified": true
    }
}
```
<div id="execution-results-DELETEapi-phone--phone-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-phone--phone-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-phone--phone-"></code></pre>
</div>
<div id="execution-error-DELETEapi-phone--phone-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-phone--phone-"></code></pre>
</div>
<form id="form-DELETEapi-phone--phone-" data-method="DELETE" data-path="api/phone/{phone}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-phone--phone-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-phone--phone-" onclick="tryItOut('DELETEapi-phone--phone-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-phone--phone-" onclick="cancelTryOut('DELETEapi-phone--phone-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-phone--phone-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/phone/{phone}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="DELETEapi-phone--phone-" data-component="url" required  hidden>
<br>
</p>
</form>



