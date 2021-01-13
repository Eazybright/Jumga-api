# Products


## Get all products
Display a listing of all products.




> Example request:

```bash
curl -X GET \
    -G "https://jumga-flutterwave-solution-api.herokuapp.com/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/products"
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
            "id": 1,
            "name": "eazy shoes",
            "description": "A collection os shoes",
            "price": "50000",
            "number_of_stock": "80",
            "public_reference_id": "5ffc36bdd1b0f",
            "delivery_fee": "800",
            "user_id": 4,
            "store_id": 1,
            "created_at": "2021-01-11T11:30:05.000000Z",
            "updated_at": "2021-01-12T12:43:08.000000Z",
            "images": [
                {
                    "id": 1,
                    "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1610364609/JUMGA_FOR_FLUTTERWAVE%20-%20Product%20Images/splnn0brrelkbrxdfgbb.png",
                    "product_id": 1,
                    "created_at": "2021-01-11T11:30:10.000000Z",
                    "updated_at": "2021-01-11T11:30:10.000000Z"
                },
                {
                    "id": 2,
                    "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1610364613/JUMGA_FOR_FLUTTERWAVE%20-%20Product%20Images/v3mkeajh6wklfnzxkneq.png",
                    "product_id": 1,
                    "created_at": "2021-01-11T11:30:15.000000Z",
                    "updated_at": "2021-01-11T11:30:15.000000Z"
                }
            ]
        }
    ]
}
}
```
<div id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"></code></pre>
</div>
<div id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products"></code></pre>
</div>
<form id="form-GETapi-products" data-method="GET" data-path="api/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products" onclick="tryItOut('GETapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products" onclick="cancelTryOut('GETapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products</code></b>
</p>
</form>


## Get a product
Get product details by its id




> Example request:

```bash
curl -X GET \
    -G "https://jumga-flutterwave-solution-api.herokuapp.com/api/products/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/products/ut"
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
        "name": "eazy shoes",
        "description": "A collection os shoes",
        "price": "50000",
        "number_of_stock": "80",
        "public_reference_id": "5ffc36bdd1b0f",
        "delivery_fee": "800",
        "user_id": 4,
        "store_id": 1,
        "created_at": "2021-01-11T11:30:05.000000Z",
        "updated_at": "2021-01-12T12:43:08.000000Z",
        "images": [
            {
                "id": 1,
                "image": "https:\/\/res.cloudinary.com\/api-seekhostel\/image\/upload\/v1610364609\/JUMGA_FOR_FLUTTERWAVE%20-%20Product%20Images\/splnn0brrelkbrxdfgbb.png",
                "product_id": 1,
                "created_at": "2021-01-11T11:30:10.000000Z",
                "updated_at": "2021-01-11T11:30:10.000000Z"
            },
            {
                "id": 2,
                "image": "https:\/\/res.cloudinary.com\/api-seekhostel\/image\/upload\/v1610364613\/JUMGA_FOR_FLUTTERWAVE%20-%20Product%20Images\/v3mkeajh6wklfnzxkneq.png",
                "product_id": 1,
                "created_at": "2021-01-11T11:30:15.000000Z",
                "updated_at": "2021-01-11T11:30:15.000000Z"
            }
        ]
    }
}
```
<div id="execution-results-GETapi-products--product_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products--product_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product_id-"></code></pre>
</div>
<div id="execution-error-GETapi-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product_id-"></code></pre>
</div>
<form id="form-GETapi-products--product_id-" data-method="GET" data-path="api/products/{product_id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products--product_id-" onclick="tryItOut('GETapi-products--product_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products--product_id-" onclick="cancelTryOut('GETapi-products--product_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products--product_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/{product_id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_id" data-endpoint="GETapi-products--product_id-" data-component="url" required  hidden>
<br>
</p>
</form>


## Create
Store a newly created product.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/products" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "name=nostrum" \
    -F "description=ea" \
    -F "price=9" \
    -F "number_of_stock=9" \
    -F "store_id=15" \
    -F "delivery_fee=15" \
    -F "image=@/tmp/phpOQmpNf" 
```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/products"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'nostrum');
body.append('description', 'ea');
body.append('price', '9');
body.append('number_of_stock', '9');
body.append('store_id', '15');
body.append('delivery_fee', '15');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Product created successfully",
    "data": {
        "name": "Perfume",
        "description": "This is a nice perfume for your body",
        "price": "4000",
        "number_of_stock": "80",
        "store_id": "1",
        "user_id": 4,
        "delivery_fee": "800",
        "public_reference_id": "5ffc36bdd1b0f",
        "updated_at": "2021-01-11T11:30:05.000000Z",
        "created_at": "2021-01-11T11:30:05.000000Z",
        "id": 1
    }
}
```
<div id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"></code></pre>
</div>
<div id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products"></code></pre>
</div>
<form id="form-POSTapi-products" data-method="POST" data-path="api/products" data-authed="1" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products" onclick="tryItOut('POSTapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products" onclick="cancelTryOut('POSTapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products</code></b>
</p>
<p>
<label id="auth-POSTapi-products" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-products" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The name of the product</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The description of the product</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The price of the product</p>
<p>
<b><code>number_of_stock</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="number_of_stock" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The number of available products</p>
<p>
<b><code>store_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="store_id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The id of the store you want to create product for</p>
<p>
<b><code>delivery_fee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="delivery_fee" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The delivery fee of the product</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="image" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The image(s) of the product, it accepts an array of images (image MIMETYPE, FILEPATH, etc)</p>

</form>


## Update
Update the product details.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/products/ex" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "name=ut" \
    -F "description=dolorum" \
    -F "price=12" \
    -F "number_of_stock=18" \
    -F "delivery_fee=1" \
    -F "store_id=18" \
    -F "image=@/tmp/phpxdhqbe" 
```

```javascript
const url = new URL(
    "https://jumga-flutterwave-solution-api.herokuapp.com/api/products/ex"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'ut');
body.append('description', 'dolorum');
body.append('price', '12');
body.append('number_of_stock', '18');
body.append('delivery_fee', '1');
body.append('store_id', '18');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Product updated successfully",
    "data": {
        "id": 1,
        "name": "eazy shoes",
        "description": "A collection os shoes",
        "price": "50000",
        "number_of_stock": "80",
        "public_reference_id": "5ffc36bdd1b0f",
        "delivery_fee": "800",
        "user_id": 4,
        "store_id": 1,
        "created_at": "2021-01-11T11:30:05.000000Z",
        "updated_at": "2021-01-12T12:43:08.000000Z"
    }
}
```
<div id="execution-results-PUTapi-products--product_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products--product_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--product_id-"></code></pre>
</div>
<div id="execution-error-PUTapi-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--product_id-"></code></pre>
</div>
<form id="form-PUTapi-products--product_id-" data-method="PUT" data-path="api/products/{product_id}" data-authed="1" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--product_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products--product_id-" onclick="tryItOut('PUTapi-products--product_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products--product_id-" onclick="cancelTryOut('PUTapi-products--product_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products--product_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/{product_id}</code></b>
</p>
<p>
<label id="auth-PUTapi-products--product_id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-products--product_id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_id" data-endpoint="PUTapi-products--product_id-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The name of the product</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The description of the product</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The price of the product</p>
<p>
<b><code>number_of_stock</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="number_of_stock" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The number of available products</p>
<p>
<b><code>delivery_fee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="delivery_fee" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The delivery fee of the product</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="image" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The image(s) of the product, it accepts an array of images (image MIMETYPE, FILEPATH, etc)</p>
<p>
<b><code>store_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="store_id" data-endpoint="PUTapi-products--product_id-" data-component="body" required  hidden>
<br>
The id of the store you want to create product for</p>

</form>



