# PHP-HTTP

`PHP-HTTP` is a lightweight PHP package to simplify working with requests, responses, cookies and file uploads

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
$request->content();

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

// get request headers
$request->headers();

// get specific header and returns null if not found
$request->headers('Authorization');

// get bearer token
$request->bearer();

// Server-related helpers
$request->root();        // Document root
$request->server_name(); // Server name
$request->server_port(); // Server port (e.g., 8000)
$request->host();        // Host (e.g., 127.0.0.1)
$request->uri();         // Request URI
$request->query();       // Query string
```

**working with File Uploads:**
```php
<?php

use AbdelrhmanSaeed\PHP\Http\Request;

$request = new Request;

/**
 * return an array of the uploaded file data 
 */
$request->files();

/**
 * return the specified file
 */
$file = $request->file('picture-name');

 // file name
$file->name();

 // file tmp name
$file->tmp();

 // file size in bytes
$file->size();

 // file extension
$file->extension();

/**
 * check if file is uploaded or not
 */
$file->uploaded();

/**
 * stores the file in the specified path
 */
$file->strore('somewhere/in/the/system', 'optional-name');
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
 * Response::MANY_REQUESTS        = 429;
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

**working with Cookies:**
```php
<?php

use AbdelrhmanSaeed\PHP\Http\Cookie;

// set a cookie
Cookie::set('cookie-name', 'value', Cookie::minutes(10));

// get a cookie
Cookie::get('cookie-name');

// delete a cookie
Cookie::forget('cookie-name');

// Cookie helper methods
Cookie::seconds($count);
Cookie::minutes($count);
Cookie::hours($count);
Cookie::days($count);
Cookie::months($count);
Cookie::year($count);
```

**working with Sessions:**

```php
<?php

use AbdelrhmanSaeed\PHP\Http\Session;

/**
* You can instantiate the Session class
* or use the session method in the Request class
*/

$session = new Seession;
// or
$request = new Request;
$session = $request->sesssion(); 

// start session if not already started
$session->start();

// destroy the session
$session->destroy();

// set session variable
$session->set('name', 'john doe or whatever');

// get session variable
$session->get('name');

// get all session variables
$session->all();

// session id
$session->id();

// regenerate session id
$session->regenerate_id();

// session name
$session->name();

// session status
$session->status();

// delete session variable
$session->forget('name');

// delete all session variables but not the session itself
$session->flush();
```

---

## License

This package is licensed under the MIT License.
