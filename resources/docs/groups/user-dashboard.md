# User dashboard


## Get User details
Get all details about a user - seller

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/user"
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
        "id": 4,
        "name": "kolawole Ezekiel",
        "email": "doneazy911@gmail.com",
        "role": "seller",
        "phone_number": "08135306027",
        "account_number": "0228415513",
        "account_name": "Kolawole Ezekiel Damilare",
        "account_bank_code": "058",
        "country": "Nigeria",
        "flutterwave_subaccount_id": "RS_BBA8FFC88A3kfjkfjBC383C",
        "email_verified_at": "2021-01-06T18:46:33.000000Z",
        "created_at": "2021-01-06T18:46:33.000000Z",
        "updated_at": "2021-01-06T18:46:46.000000Z",
        "store": {
            "id": 1,
            "name": "Eazbright store",
            "image": "https:\/\/res.cloudinary.com\/api-seekhostel\/image\/upload\/v1609958802\/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images\/itlylp997digqwvq8frb.png",
            "location": "ikeja, lagos",
            "description": "a very conducive store",
            "user_id": 4,
            "dispatch_rider_id": 2,
            "created_at": "2021-01-06T18:46:44.000000Z",
            "updated_at": "2021-01-06T18:46:44.000000Z",
            "rider": {
                "id": 2,
                "name": "Dispatch Rider 2",
                "email": "doneazy2@gmail.com",
                "role": "rider",
                "phone_number": "08135306035",
                "account_number": "0228415513",
                "account_name": "Kolawole Ezekiel Damilare",
                "account_bank_code": "058",
                "country": "Nigeria",
                "flutterwave_subaccount_id": "RS_BBA8FFC88A3kfjkfjBC383C",
                "email_verified_at": "2021-01-06T17:55:31.000000Z",
                "created_at": "2021-01-06T17:55:31.000000Z",
                "updated_at": "2021-01-06T17:55:31.000000Z"
            }
        }
    }
}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
<p>
<label id="auth-GETapi-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user" data-component="header"></label>
</p>
</form>



