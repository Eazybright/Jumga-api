# Stores


## Get all stores
Display a listing of all stores.




> Example request:

```bash
curl -X GET \
    -G "https://jumga-flutterwave-solution-api.herokuapp.com/api/stores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/stores"
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
{
    "status": true,
    "message": "Successful",
    "data": [
        {
            "id": 2,
            "name": "Eazbright store",
            "image": "https:\/\/res.cloudinary.com\/api-seekhostel\/image\/upload\/v1609959281\/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images\/nplltsxgtqjsoh2z92sc.png",
            "location": "ikeja, lagos",
            "public_reference_id": "",
            "description": "a very conducive store",
            "user_id": 5,
            "dispatch_rider_id": 2,
            "created_at": "2021-01-06T18:54:42.000000Z",
            "updated_at": "2021-01-06T18:54:42.000000Z"
        },
        {
            "id": 1,
            "name": "Eazbright store",
            "image": "https:\/\/res.cloudinary.com\/api-seekhostel\/image\/upload\/v1609958802\/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images\/itlylp997digqwvq8frb.png",
            "location": "ikeja, lagos",
            "public_reference_id": "",
            "description": "a very conducive store",
            "user_id": 4,
            "dispatch_rider_id": 2,
            "created_at": "2021-01-06T18:46:44.000000Z",
            "updated_at": "2021-01-06T18:46:44.000000Z"
        }
    ]
}
```
<div id="execution-results-GETapi-stores" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-stores"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-stores"></code></pre>
</div>
<div id="execution-error-GETapi-stores" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-stores"></code></pre>
</div>
<form id="form-GETapi-stores" data-method="GET" data-path="api/stores" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-stores', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-stores" onclick="tryItOut('GETapi-stores');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-stores" onclick="cancelTryOut('GETapi-stores');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-stores" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/stores</code></b>
</p>
</form>


## Get a store
Get store details by its id




> Example request:

```bash
curl -X GET \
    -G "https://jumga-flutterwave-solution-api.herokuapp.com/api/stores/fuga" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/stores/fuga"
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
{
    "status": true,
    "message": "Successful",
    "data": {
        "id": 1,
        "name": "Eazbright store",
        "image": "https:\/\/res.cloudinary.com\/api-seekhostel\/image\/upload\/v1609958802\/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images\/itlylp997digqwvq8frb.png",
        "location": "ikeja, lagos",
        "public_reference_id": "",
        "description": "a very conducive store",
        "user_id": 4,
        "dispatch_rider_id": 2,
        "created_at": "2021-01-06T18:46:44.000000Z",
        "updated_at": "2021-01-06T18:46:44.000000Z"
    }
}
```
<div id="execution-results-GETapi-stores--store_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-stores--store_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-stores--store_id-"></code></pre>
</div>
<div id="execution-error-GETapi-stores--store_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-stores--store_id-"></code></pre>
</div>
<form id="form-GETapi-stores--store_id-" data-method="GET" data-path="api/stores/{store_id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-stores--store_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-stores--store_id-" onclick="tryItOut('GETapi-stores--store_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-stores--store_id-" onclick="cancelTryOut('GETapi-stores--store_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-stores--store_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/stores/{store_id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>store_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="store_id" data-endpoint="GETapi-stores--store_id-" data-component="url" required  hidden>
<br>
</p>
</form>



