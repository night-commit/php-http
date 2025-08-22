# PHP-HTTP

`PHP-HTTP` is a lightweight PHP package to simplify working with requests and responses

---

## Installation

```bash
composer require abdelrhman-saeed/php-http
```

---

## Usage Example

**working with Requests:**

```php
<?php

use AbdelrhmanSaeed\PHP\Http\Request;


$request = new Request();

// Returns the raw request JSON post data
$request->getContent();

// Returns the decoded request JSON data as an array
$request->data();

// Returns a specific GET parameter, or the default value if not set
$request->get("name", "default value");

// Returns a specific POST parameter, or the default value if not set
$request->post("name", "default value");

// Check if a specific key exists in GET or POST
$request->exists("name", $data);

// Check if a specific key exists and is not empty in GET or POST
$request->filled("name", $data);

// Server-related helpers
$request->root();        // Document root
$request->server_name(); // Server name
$request->server_port(); // Server port (e.g., 8000)
$request->host();        // Host (e.g., 127.0.0.1)
$request->uri();         // Request URI
$request->query();       // Query string

```
**working with Responses:**
```php
<?php

use AbdelrhmanSaeed\PHP\Http\Response;

/**
 * You can specify the status code directly or use predefined constants:
 * 
 * Response::OK       = 200;
 * Response::CREATED  = 201;
 * Response::ACCEPTED = 202;
 * 
 * Response::MOVED = 301;
 * Response::FOUND = 302;
 * 
 * Response::BAD_REQUEST          = 400;
 * Response::UNAUTHORIZED         = 401;
 * Response::PAYMENT_REQUIRED     = 402;
 * Response::FORBIDDEN            = 403;
 * Response::NOT_FOUND            = 404;
 * Response::METHOD_NOT_ALLOWED   = 405;
 * Response::NOT_ACCEPTABLE       = 406;
 * Response::REQUEST_TIMEOUT      = 408;
 * Response::CONFLICT             = 409;
 * Response::GONE                 = 410;
 * Response::MANY_REQUESTES       = 429;
 * 
 * Response::SERVER_ERROR         = 500;
 * Response::NOT_IMPLEMENTED      = 501;
 * Response::BAD_GATEWAY          = 502;
 * Response::SERVICE_UNAVAILABLE  = 503;
 * Response::GATEWAY_TIMEOUT      = 504;
 */

// Sends a response with JSON data and a status code (default 200)
Response::send($data = "", $status, $headers);

// Sends a response with an array as JSON and sets Content-Type: application/json
Response::json($data = [], $status, $headers);
```
