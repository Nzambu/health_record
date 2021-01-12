# Patient

Patient endpoints

## Get patients


Select all the patients

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/patient" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patient"
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
        "type": "patient",
        "id": "",
        "attributes": {
            "name": null,
            "dob": null,
            "comments": null
        },
        "relationships": {
            "gender": [
                null
            ],
            "service": [
                null
            ]
        }
    },
    {
        "type": "patient",
        "id": "",
        "attributes": {
            "name": null,
            "dob": null,
            "comments": null
        },
        "relationships": {
            "gender": [
                null
            ],
            "service": [
                null
            ]
        }
    }
]
```
<div id="execution-results-GETapi-patient" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-patient"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-patient"></code></pre>
</div>
<div id="execution-error-GETapi-patient" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-patient"></code></pre>
</div>
<form id="form-GETapi-patient" data-method="GET" data-path="api/patient" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-patient', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-patient" onclick="tryItOut('GETapi-patient');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-patient" onclick="cancelTryOut('GETapi-patient');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-patient" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/patient</code></b>
</p>
</form>


## Create patient


Create new patient record

> Example request:

```bash
curl -X POST \
    "http://localhost/api/patient" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"gender_id":2,"service_id":16,"name":"recusandae","dob":"2021-01-12T09:59:15+0000","comments":"dolor"}'

```

```javascript
const url = new URL(
    "http://localhost/api/patient"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "gender_id": 2,
    "service_id": 16,
    "name": "recusandae",
    "dob": "2021-01-12T09:59:15+0000",
    "comments": "dolor"
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
    "type": "patient",
    "id": "",
    "attributes": {
        "name": null,
        "dob": null,
        "comments": null
    },
    "relationships": {
        "gender": [
            null
        ],
        "service": [
            null
        ]
    }
}
```
<div id="execution-results-POSTapi-patient" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-patient"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-patient"></code></pre>
</div>
<div id="execution-error-POSTapi-patient" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-patient"></code></pre>
</div>
<form id="form-POSTapi-patient" data-method="POST" data-path="api/patient" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-patient', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-patient" onclick="tryItOut('POSTapi-patient');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-patient" onclick="cancelTryOut('POSTapi-patient');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-patient" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/patient</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>gender_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="gender_id" data-endpoint="POSTapi-patient" data-component="body" required  hidden>
<br>
Gender of the patient.</p>
<p>
<b><code>service_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="service_id" data-endpoint="POSTapi-patient" data-component="body" required  hidden>
<br>
Type of Service.</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-patient" data-component="body" required  hidden>
<br>
Name of the patient.</p>
<p>
<b><code>dob</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dob" data-endpoint="POSTapi-patient" data-component="body" required  hidden>
<br>
Patient's date of birth The value must be a valid date.</p>
<p>
<b><code>comments</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="comments" data-endpoint="POSTapi-patient" data-component="body" required  hidden>
<br>
General comments about the patient.</p>

</form>


## Update patient


Change patient record

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/patient/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"gender_id":3,"service_id":11,"name":"vitae","dob":"2021-01-12T09:59:15+0000","comments":"minus"}'

```

```javascript
const url = new URL(
    "http://localhost/api/patient/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "gender_id": 3,
    "service_id": 11,
    "name": "vitae",
    "dob": "2021-01-12T09:59:15+0000",
    "comments": "minus"
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
    "type": "patient",
    "id": "",
    "attributes": {
        "name": null,
        "dob": null,
        "comments": null
    },
    "relationships": {
        "gender": [
            null
        ],
        "service": [
            null
        ]
    }
}
```
<div id="execution-results-PUTapi-patient--patient-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-patient--patient-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-patient--patient-"></code></pre>
</div>
<div id="execution-error-PUTapi-patient--patient-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-patient--patient-"></code></pre>
</div>
<form id="form-PUTapi-patient--patient-" data-method="PUT" data-path="api/patient/{patient}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-patient--patient-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-patient--patient-" onclick="tryItOut('PUTapi-patient--patient-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-patient--patient-" onclick="cancelTryOut('PUTapi-patient--patient-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-patient--patient-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/patient/{patient}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/patient/{patient}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>patient</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="patient" data-endpoint="PUTapi-patient--patient-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>gender_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="gender_id" data-endpoint="PUTapi-patient--patient-" data-component="body" required  hidden>
<br>
Gender of the patient.</p>
<p>
<b><code>service_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="service_id" data-endpoint="PUTapi-patient--patient-" data-component="body" required  hidden>
<br>
Type of Service.</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-patient--patient-" data-component="body" required  hidden>
<br>
Name of the patient.</p>
<p>
<b><code>dob</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dob" data-endpoint="PUTapi-patient--patient-" data-component="body" required  hidden>
<br>
Patient's date of birth The value must be a valid date.</p>
<p>
<b><code>comments</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="comments" data-endpoint="PUTapi-patient--patient-" data-component="body" required  hidden>
<br>
General comments about the patient.</p>

</form>


## Delete patient


Remove patient record

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/patient/perferendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patient/perferendis"
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
    "type": "patient",
    "id": "",
    "attributes": {
        "name": null,
        "dob": null,
        "comments": null
    },
    "relationships": {
        "gender": [
            null
        ],
        "service": [
            null
        ]
    }
}
```
<div id="execution-results-DELETEapi-patient--patient-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-patient--patient-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-patient--patient-"></code></pre>
</div>
<div id="execution-error-DELETEapi-patient--patient-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-patient--patient-"></code></pre>
</div>
<form id="form-DELETEapi-patient--patient-" data-method="DELETE" data-path="api/patient/{patient}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-patient--patient-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-patient--patient-" onclick="tryItOut('DELETEapi-patient--patient-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-patient--patient-" onclick="cancelTryOut('DELETEapi-patient--patient-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-patient--patient-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/patient/{patient}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>patient</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="patient" data-endpoint="DELETEapi-patient--patient-" data-component="url" required  hidden>
<br>
</p>
</form>



