# API Client-Address

## Installation

If you're going to download the project, the first thing you have to do is install all the dependencies, for this the only thing you have to do is execute `composer install`.

Then you have to configure the `.env` file, adding the database credentials and the database name you're going to use.

The next step is execute the migrations and seeders, the command for this is `php artisan migrate --seed`

## Routes

To use the API you need to send request to some URLs, I'll list it to make easy its use.

Prefix
```    
/api/
```

GET
```
/clients
/client/id
/addresses
/address/id
/address/client/id
```

POST
```
/client/store
/address/store
``` 

PUT
```
/client/update/id
/address/update/id
 ```   

DELETE
```
/client/delete/id
/address/delete/id
``` 