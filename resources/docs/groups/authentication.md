# Authentication


## Register
Seller signs up on our platform




> Example request:

```bash
curl -X POST \
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolorum","email":"autem","password":"explicabo","phone_number":"laboriosam","role":"sint","account_number":"corrupti","account_name":"nulla","account_bank_code":20,"country":"qui","image":"illum","transaction_id":19,"location":"ab","description":"nostrum","name_of_store":"reiciendis"}'

```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolorum",
    "email": "autem",
    "password": "explicabo",
    "phone_number": "laboriosam",
    "role": "sint",
    "account_number": "corrupti",
    "account_name": "nulla",
    "account_bank_code": 20,
    "country": "qui",
    "image": "illum",
    "transaction_id": 19,
    "location": "ab",
    "description": "nostrum",
    "name_of_store": "reiciendis"
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
    "status": true,
    "message": "Successful",
    "data": "Registration successfull"
}
```
<div id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register"></code></pre>
</div>
<form id="form-POSTapi-auth-register" data-method="POST" data-path="api/auth/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-register" onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-register" onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The fullname of the user</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The email of the user</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The password of the user account</p>
<p>
<b><code>phone_number</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
<input type="text" name="phone_number" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The phone number of the user</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="role" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The role of the user either seller or rider</p>
<p>
<b><code>account_number</code></b>&nbsp;&nbsp;<small>The</small>     <i>optional</i> &nbsp;
<input type="text" name="account_number" data-endpoint="POSTapi-auth-register" data-component="body"  hidden>
<br>
account number of the user</p>
<p>
<b><code>account_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="account_name" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The bank account name of the user</p>
<p>
<b><code>account_bank_code</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="account_bank_code" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The bank code of the user preferred bank</p>
<p>
<b><code>country</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The country of residence of the user</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>filepath</small>  &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The cover image for the store</p>
<p>
<b><code>transaction_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="transaction_id" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
This is the transaction_id of the payment evidence (you can get this during the payment callback - `data.id`)</p>
<p>
<b><code>location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="location" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The location of the store</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The description of the store</p>
<p>
<b><code>name_of_store</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_of_store" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
The name of the store</p>

</form>


## Login
User login into their account




> Example request:

```bash
curl -X POST \
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"amet","password":"eius"}'

```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "amet",
    "password": "eius"
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
    "status": true,
    "message": "User authenticated",
    "data": {
        "user": {
            "id": 4,
            "name": "kolawole Ezekiel",
            "email": "donea1@gmail.com",
            "role": "seller",
            "phone_number": "08135306027",
            "account_number": "0228435513",
            "account_name": "Kolawole Ezekiel Damilare",
            "account_bank_code": "058",
            "country": "Nigeria",
            "flutterwave_subaccount_id": "kskjks_YRHJF",
            "email_verified_at": "2021-01-06T18:46:33.000000Z",
            "created_at": "2021-01-06T18:46:33.000000Z",
            "updated_at": "2021-01-06T18:46:46.000000Z"
        },
        "token": "AAAA-TOKEN",
        "token_type": "Bearer",
        "expires_at": "2021-01-06 21:19:45"
    }
}
```
<div id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</div>
<form id="form-POSTapi-auth-login" data-method="POST" data-path="api/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-login" onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-login" onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
The email of the user</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
The password of the user account</p>

</form>



