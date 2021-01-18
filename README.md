### Introduction
This is the backend for Jumga (Frontend) - <a href="https://github.com/tofmat/shopHack">https://github.com/tofmat/shopHack</a>. This backend is built on the Laravel (php) framework.

On signup, seller details are collected and a settlement account is created on behalf of the seller using the Flutterwave subaccount feature. This allows the seller to receive payment seamlessly on the platform. Also a dispatch rider is assigned to each seller's store after registration, details about the dispatch rider can be found on seller dashboard. Dipatch riders are created manually using Laravel database seeding (information on how to setup dispatch riders would be discussed below).

The sharing and breaking down of funds is processed automatically using the Flutterwave split payment feature. Based on the challenge description, the funds are shared using the following percentage ratio below:
* (a) Jumga gets a commission of 2.30%
* (b) Seller gets 90.7%
* (c) The dispatch rider gets 5.6%
* (d) Jumga gets another 1.4% delivery commission

Since Jumga owns the system, the algorithm implemented was that funds are distributed specifically to the seller and the dispatch rider then the remaining funds goes to Jumga account. 

## App Setup (running the backend locally)

*A couple of third party services were included in the project like cloudinary (for storing images), Mail Driver (For sending mail notifications), RAVE PHP SDK (for accepting payment).*

### Database Setup
The Laravel app needs a database running on the host machine to work. MySQL database was used in this project.
That way, it is easier to use it with hosted/remote databases such as cPanel, Amazon RDS, etc.
To setup your database locally:
* Open the mysql config file (`/etc/mysql/my.cnf` on Ubuntu) with your preferred editor 
    e.g `sudo vim /etc/mysql/my.cnf`
* Append the line below to the end of the file so that MySQL can listen on all interfaces.

    `bind-address   = 0.0.0.0`
* Save the file and restart the MySQL server with:

    `sudo systemctl restart mysql`
* Update the database `.env` variables in the project root folder i.e:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=YOUR_MSQL_DATABASE
DB_USERNAME=YOUR_MYSQL_USERNAME
DB_PASSWORD=YOUR_MYSQL_PASSWORD
```

### Mail Driver Setup
Choose the mail driver host of your choice (Mailgun, Sendgrid, Mailtrap) and edit the details `mail variables` in `.env` file
```
MAIL_DRIVER=YOUR_MAIL_DRIVER
MAIL_HOST=YOUR_MAIL_HOST
MAIL_PORT=YOUR_MAIL_PORT
MAIL_USERNAME=YOUR_MAIL_USERNAME
MAIL_PASSWORD=YOUR_MAIL_PASSWORD
```

### Cloudinary Setup
<a href="https://cloudinary.com/">Open a cloudinary account</a> and get your API keys. 

Update the `.env` variables
```
CLOUDINARY_API_KEY=YOUR_API_KEY
CLOUDINARY_API_SECRET=YOUR_API_SECRET
CLOUDINARY_CLOUD_NAME=YOUR_CLOUD_NAME
```

### Rave PHP SDK Setup
To receive payment, you have to sign  up on <a href="https://flutterwave.com">Flutterwave</a> and get your API keys as well. Update the `.env` variables
```
RAVE_PUBLIC_KEY=YOUR_PUBLIC_KEY
RAVE_SECRET_KEY=YOUR_SECRET_KEY
RAVE_TITLE="JUMGA FLUTTERWAVE SOLUTION"
RAVE_API_URL="https://api.flutterwave.com/v3/"
```

### Dispatch Rider Setup
Kindly open `database/seeders/UserSeeder.php` to edit the dispatch riders details provided you have created a payment subaccount already on Flutterwave.

Uncomment this line of code below and Run `php artisan db:seed` to insert the riders details into the database
```
// $this->call([
//   UserSeeder::class
// ]);
```

### Installing Passport
We use [Laravel Passport](https://laravel.com/docs/8.x/passport) for JWT(JSON WEB TOKEN) support. To install,
run `php artisan passport:install` (after running your migrations).


### API Documentation
Documentation available at: <a href="https://jumga-flutterwave-solution-api.herokuapp.com/docs/index.html">https://jumga-flutterwave-solution-api.herokuapp.com/docs/index.html</a>

The live url for this solution can be found here. <a href="https://jumgaflutterwavesol.netlify.app">https://jumgaflutterwavesol.netlify.app</a>
