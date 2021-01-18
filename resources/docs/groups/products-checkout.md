# Products Checkout


## Create Order
This endpoint should create user order and setup payment link
grand_total




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/checkout/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"grand_total":"voluptate","sub_total":"tempora","delivery_fee":"fugiat","item_count":"aut","first_name":"iste","last_name":"eum","company_name":"aperiam","address":"sunt","city":"et","country":"nesciunt","state":"est","email":"fuga","post_code":"deleniti","phone_number":"dicta","notes":"quam","items":"molestiae"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/checkout/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "grand_total": "voluptate",
    "sub_total": "tempora",
    "delivery_fee": "fugiat",
    "item_count": "aut",
    "first_name": "iste",
    "last_name": "eum",
    "company_name": "aperiam",
    "address": "sunt",
    "city": "et",
    "country": "nesciunt",
    "state": "est",
    "email": "fuga",
    "post_code": "deleniti",
    "phone_number": "dicta",
    "notes": "quam",
    "items": "molestiae"
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


## api/checkout/order/confirm




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/checkout/order/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/checkout/order/confirm"
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


> Example response (500):

```json
{
    "message": "Undefined index: transaction_id",
    "exception": "ErrorException",
    "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/app\/Services\/CheckoutService.php",
    "line": 110,
    "trace": [
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/app\/Services\/CheckoutService.php",
            "line": 110,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/app\/Http\/Controllers\/CheckoutController.php",
            "line": 103,
            "function": "confirm_order_payment",
            "class": "App\\Services\\CheckoutService",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php",
            "line": 54,
            "function": "confirm_order_payment",
            "class": "App\\Http\\Controllers\\CheckoutController",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 692,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/home\/eazybright\/Documents\/projects\/Jumga-for-flutterwave-api\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETapi-checkout-order-confirm" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-checkout-order-confirm"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-checkout-order-confirm"></code></pre>
</div>
<div id="execution-error-GETapi-checkout-order-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-checkout-order-confirm"></code></pre>
</div>
<form id="form-GETapi-checkout-order-confirm" data-method="GET" data-path="api/checkout/order/confirm" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-checkout-order-confirm', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-checkout-order-confirm" onclick="tryItOut('GETapi-checkout-order-confirm');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-checkout-order-confirm" onclick="cancelTryOut('GETapi-checkout-order-confirm');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-checkout-order-confirm" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/checkout/order/confirm</code></b>
</p>
</form>



