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
/clients                => return all the clients
/client/id              => return a client
/addresses              => Return all addresses
/address/id             => Return an address
/address/client/id      => Return all addresses of a client
```

POST
```
/client/store           => Save a new client (name)
/address/store          => Save a new address (name and client_id)
``` 

PUT
```
/client/update/id       => Update a client (name)
/address/update/id      => Update an address (name or client_id)
 ```   

DELETE
```
/client/delete/id       => Delete a client and all his addresses
/address/delete/id      => Delete an address
``` 