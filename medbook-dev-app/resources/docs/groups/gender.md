# Gender

Gender endpoints

## Get gender


Select all the genders

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/gender" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/gender"
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
        "type": "gender",
        "id": "5",
        "attributes": {
            "sex": "Female"
        }
    },
    {
        "type": "gender",
        "id": "",
        "attributes": {
            "sex": "Female"
        }
    }
]
```
<div id="execution-results-GETapi-gender" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-gender"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-gender"></code></pre>
</div>
<div id="execution-error-GETapi-gender" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-gender"></code></pre>
</div>
<form id="form-GETapi-gender" data-method="GET" data-path="api/gender" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-gender', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-gender" onclick="tryItOut('GETapi-gender');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-gender" onclick="cancelTryOut('GETapi-gender');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-gender" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/gender</code></b>
</p>
</form>



