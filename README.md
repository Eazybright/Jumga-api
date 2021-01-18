### Introduction
This is the backend for Jumga - <a href="https://github.com/tofmat/shopHack">https://github.com/tofmat/shopHack</a>. THis backend is built on the Laravel (php) framework.

On signup, seller details are collected and a settlement account is created on behalf of the seller using the Flutterwave subaccount feature. This allows the seller to receive payment seamlessly on the platform. Also a dispatch rider is assigned to each seller's store after registration, details about the dispatch rider can be found on seller dashboard. Dipatch riders are created manually using Laravel database seeding (information on how to setup dispatch riders would be discussed below).

The sharing and breaking down of funds is processed automatically using the Flutterwave split payment feature. Based on the challenge description, the funds are shared using the following percentage ratio below:
(a) Jumga gets a commission of 2.30%
(b) Seller gets 90.7%
(c) The dispatch rider gets 5.6%
(d) Jumga gets another 1.4% delivery commission

Since Jumga owns the system, the algorithm implemented was that funds are distributed specifically to the seller and the dispatch rider then the remaining funds goes to Jumga account. 


### API Documentation
Documentation available at: <a href="https://jumga-flutterwave-solution-api.herokuapp.com/docs/index.html">https://jumga-flutterwave-solution-api.herokuapp.com/docs/index.html</a>

Jumga is built with the Nuxt.JS (VueJS) framework for the frontend which is contained in this repo and the backend is built on the Laravel (php) framework. Which can be found in this repo. https://github.com/Eazybright/Jumga-for-flutterwave-api

On initial load of the app, users can view various stores, and products. They can also add products to their cart immediately and proceed to checkout. No registrations needed for the users, all details are collected on checkout. Details (name of products, quantity, and price) of their order is sent to their email before and after payment, including their receipt. We used the Flutterwave standard payment method in collecting payments on checkout.

Stores can register/login on the web app. On registration, stores pay a one time fee of $20 for the store approval, then submit all required details including their respective country, and bank details. An email containing the receipt of this payment and a welcome message is sent to each store's respective mails on successful approval. Also a dispatch rider is assigned to each store after registration, details about the dispatch rider can be found on their dashboard. We used the Flutterwave inline payment method in collecting payments on registration.

The bank details collected on registration of stores is used to process payments (using their respective bank codes), share payments between JUMGA, the vendor, and the Dispatch Rider. (All dispatch riders have been registered on the platform internally and their bank details collected). 

The sharing and breaking down of funds is processed automatically using the Flutterwave split payment feature. All payments and breakdown can be tracked and seen on the JUMGA Flutterwave dashboard. Users get to see their transaction id in their mail or after checkout including their order number.

The dashboard gives vendors access to upload products and view the dispatch riders details.

The live url for this solution can be found here. https://jumgaflutterwavesol.netlify.app
