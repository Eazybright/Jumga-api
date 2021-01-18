# Products Checkout


## Create Order
This endpoint should create user order and setup payment link
grand_total




> Example request:

```bash
curl -X POST \
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/checkout/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"grand_total":"enim","sub_total":"et","delivery_fee":"aspernatur","item_count":"et","first_name":"quod","last_name":"autem","company_name":"eos","address":"reprehenderit","city":"temporibus","country":"consequuntur","state":"veritatis","email":"eum","post_code":"eos","phone_number":"amet","notes":"laboriosam","callback_url":"molestiae","items":"quidem"}'

```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/checkout/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "grand_total": "enim",
    "sub_total": "et",
    "delivery_fee": "aspernatur",
    "item_count": "et",
    "first_name": "quod",
    "last_name": "autem",
    "company_name": "eos",
    "address": "reprehenderit",
    "city": "temporibus",
    "country": "consequuntur",
    "state": "veritatis",
    "email": "eum",
    "post_code": "eos",
    "phone_number": "amet",
    "notes": "laboriosam",
    "callback_url": "molestiae",
    "items": "quidem"
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
    "message": "Payment link created successfully",
    "data": {
        "grand_total": "91250",
        "callback_url": "http:\/\/localhost:8000\/callback_endpoint",
        "sub_total": "90000",
        "delivery_fee": "1250",
        "item_count": "2",
        "first_name": "bamidele",
        "last_name": "Adebayo",
        "address": "Akarabata, line 3, lagere, ile-ife",
        "city": "ile-ife",
        "state": "osun",
        "country": "Nigeria",
        "email": "eazybright1@gmail.com",
        "post_code": "2200221",
        "phone_number": "08135306027",
        "items": [
            {
                "product_id": "1",
                "product_name": "eazy shoes",
                "quantity": "1",
                "price": "50000"
            },
            {
                "product_id": "2",
                "product_name": "Perfume",
                "quantity": "1",
                "price": "40000"
            }
        ],
        "payment_link": {
            "link": "https:\/\/checkout-testing.herokuapp.com\/v3\/hosted\/pay\/ee1d6996daed8b480e64"
        },
        "order_number": "JUMGA-6004CAC59D4A0",
        "status": "pending"
    }
}
```
<div id="execution-results-POSTapi-checkout-order" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-checkout-order"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-checkout-order"></code></pre>
</div>
<div id="execution-error-POSTapi-checkout-order" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-checkout-order"></code></pre>
</div>
<form id="form-POSTapi-checkout-order" data-method="POST" data-path="api/checkout/order" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-checkout-order', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-checkout-order" onclick="tryItOut('POSTapi-checkout-order');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-checkout-order" onclick="cancelTryOut('POSTapi-checkout-order');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-checkout-order" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/checkout/order</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>grand_total</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="grand_total" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>sub_total</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
<input type="text" name="sub_total" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
This is the sub total amount without the delivery fee</p>
<p>
<b><code>delivery_fee</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
<input type="text" name="delivery_fee" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The delivery fee of the product(s) purchased</p>
<p>
<b><code>item_count</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
<input type="text" name="item_count" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The number of products purchased</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The firstname of the buyer</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The lastname of the buyer</p>
<p>
<b><code>company_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company_name" data-endpoint="POSTapi-checkout-order" data-component="body"  hidden>
<br>
optional The company name of the buyer if available (optional)</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The delivery address where the buyer wants the products to be delivered to</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The city of the delivery address</p>
<p>
<b><code>country</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The country of the delivery address</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The state of the delivery address</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The email address of the buyer</p>
<p>
<b><code>post_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="post_code" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The postal code of the delivery address</p>
<p>
<b><code>phone_number</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
<input type="text" name="phone_number" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
The phone number of the buyer</p>
<p>
<b><code>notes</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes" data-endpoint="POSTapi-checkout-order" data-component="body"  hidden>
<br>
optional The additional notes of the order (optional)</p>
<p>
<b><code>callback_url</code></b>&nbsp;&nbsp;<small>url</small>  &nbsp;
<input type="text" name="callback_url" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
function that runs when payment is successful. it should call api/checkout/order/confirm endpoint to continue order processing</p>
<p>
<details>
<summary>
<b><code>items</code></b>&nbsp;&nbsp;<small>array</small>  &nbsp;
<br>
This is an array of array of the details of the products to be purchased. For example items: [{ "product_id": "1", "product_name": "eazy shoes", "quantity": "1", "price": "50000" }]</summary>
<br>
<p>
<b><code>items[].product_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="items.0.product_id" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>items[].product_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="items.0.product_name" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>items[].quantity</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="items.0.quantity" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>items[].price</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="items.0.price" data-endpoint="POSTapi-checkout-order" data-component="body" required  hidden>
<br>
</p>
</details>
</p>

</form>


## Confirm Payment
This endpoint confirms payment that has been made




> Example request:

```bash
curl -X POST \
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/checkout/order/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"transaction_id":"reiciendis","order_number":"doloribus"}'

```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/checkout/order/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "transaction_id": "reiciendis",
    "order_number": "doloribus"
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
    "message": "Order confirmed successfully",
    "data": {
        "id": 1,
        "order_number": "JUMGA-6004CAC59D4A0",
        "status": "processing",
        "grand_total": "91250.000000",
        "item_count": 2,
        "payment_status": "completed",
        "payment_reference": "6004cac5b54c3",
        "first_name": "bamidele",
        "last_name": "Adebayo",
        "company_name": null,
        "address": "Akarabata, line 3, lagere, ile-ife",
        "city": "ile-ife",
        "country": "Nigeria",
        "state": "osun",
        "email": "eazybright1@gmail.com",
        "post_code": "2200221",
        "phone_number": "08135306027",
        "notes": null,
        "created_at": "2021-01-17T23:39:49.000000Z",
        "updated_at": "2021-01-18T00:34:44.000000Z"
    }
}
```
<div id="execution-results-POSTapi-checkout-order-confirm" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-checkout-order-confirm"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-checkout-order-confirm"></code></pre>
</div>
<div id="execution-error-POSTapi-checkout-order-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-checkout-order-confirm"></code></pre>
</div>
<form id="form-POSTapi-checkout-order-confirm" data-method="POST" data-path="api/checkout/order/confirm" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-checkout-order-confirm', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-checkout-order-confirm" onclick="tryItOut('POSTapi-checkout-order-confirm');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-checkout-order-confirm" onclick="cancelTryOut('POSTapi-checkout-order-confirm');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-checkout-order-confirm" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/checkout/order/confirm</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>transaction_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
<input type="text" name="transaction_id" data-endpoint="POSTapi-checkout-order-confirm" data-component="body" required  hidden>
<br>
This is the transaction_id that flutterwave sent to the callback url</p>
<p>
<b><code>order_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="order_number" data-endpoint="POSTapi-checkout-order-confirm" data-component="body" required  hidden>
<br>
This is the unique generated by the system when the order was made</p>

</form>



