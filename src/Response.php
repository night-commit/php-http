<?php

namespace AbdelrhmanSaeed\PHP\Http;


class Response
{

  public const int OK                   = 200;
  public const int CREATED              = 201;
  public const int ACCEPTED             = 202;

  public const int MOVED                = 301;
  public const int FOUND                = 302;

  public const int BAD_REQUEST          = 400;
  public const int UNAUTHORIZED         = 401;
  public const int PAYMENT_REQUIRED     = 402;
  public const int FORBIDDEN            = 403;
  public const int NOT_FOUND            = 404;
  public const int METHOD_NOT_ALLOWED   = 405;
  public const int NOT_ACCEPTABLE       = 406;
  public const int REQUEST_TIMEOUT      = 408;
  public const int CONFLICT             = 409;
  public const int GONE                 = 410;
  public const int MANY_REQUESTS        = 429;

  public const int SERVER_ERROR         = 500;
  public const int NOT_IMPLEMENTED      = 501;
  public const int BAD_GATEWAY          = 502;
  public const int SERVICE_UNAVAILABLE  = 503;
  public const int GATEWAy_TIMEOUT      = 504;


  public static function send(string $content, int $status = 200, array $headers = []): void
  {
    foreach ($headers as $header) header($header);

    http_response_code($status);
    echo $content;
  }

  public static function json(array $data, int $status = 200, array $headers = []): void
  {
    self::send(json_encode($data), $status, $headers + ["Content-Type: application/json"]);
  }
}
