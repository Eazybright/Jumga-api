# Products


## Create
Store a newly created product.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/products" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "name=incidunt" \
    -F "description=rerum" \
    -F "price=4" \
    -F "number_of_stock=6" \
    -F "store_id=16" \
    -F "delivery_fee=5" \
    -F "image=@/tmp/phpZMZzBU" 
```

```javascript
const url = new URL(
    "http://localhost:8000/api/products"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'incidunt');
body.append('description', 'rerum');
body.append('price', '4');
body.append('number_of_stock', '6');
body.append('store_id', '16');
body.append('delivery_fee', '5');
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



