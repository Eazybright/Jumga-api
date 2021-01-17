@component('mail::message')
# Hi {{$order_data['first_name']}}

Your order has been received. Your billing details are as follows:<br>

@component('mail::panel')
<p>Order ID: {{$order_data['order_number']}}</p>
<p>Name: {{$order_data['first_name'].' '.$order_data['last_name']}}</p>
<p>Email: {{$order_data['email']}}</p>
<p>Address: {{$order_data['address']}}</p>
<p>City: {{$order_data['city']}}</p>
<p>Country: {{$order_data['country']}}</p>
<p>State: {{$order_data['state']}}</p>
<p>Postal Code: {{$order_data['post_code']}}</p>
<p>Phone Number: {{$order_data['phone_number']}}</p>

@if(isset($order_data['company_name']))
  <p>Company Name: {{$order_data['company_name']}}</p>
@endif

@if(isset($order_data['notes']))
  <p>Notes: {{$order_data['notes']}}</p>
@endif

@component('mail::table')
|    Product                     |       Qauntity                 | Price                                 |
| :----------------------------: | :----------------------------: | :-----------------------------------: |
@foreach ($order_data['items'] as $item)
| {{$item['product_name']}}      | {{$item['quantity']}}          | ${{$item['price']}}             |
@endforeach
| ------------------------------ | ------------------------------ | ------------------------------------- |
| Delivery Fee                   |                                | ${{$order_data['delivery_fee']}}|
| Total                          |                                | ${{$order_data['grand_total']}} |


@endcomponent

@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
