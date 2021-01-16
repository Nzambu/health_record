# Service

Service endpoints

## Get all services


Select all the services

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/service" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/service"
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
        "type": "service",
        "id": "",
        "attributes": {
            "service": "Outpatient"
        }
    },
    {
        "type": "service",
        "id": "",
        "attributes": {
            "service": "Outpatient"
        }
    }
]
```
<div id="execution-results-GETapi-service" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-service"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service"></code></pre>
</div>
<div id="execution-error-GETapi-service" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service"></code></pre>
</div>
<form id="form-GETapi-service" data-method="GET" data-path="api/service" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-service', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-service" onclick="tryItOut('GETapi-service');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-service" onclick="cancelTryOut('GETapi-service');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-service" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/service</code></b>
</p>
</form>



