<?php

namespace AbdelrhmanSaeed\PHP\Http;


class Cookie
{
  public static function seconds(int $count):   int { return time() + $count; }
  public static function minutes(int $count):   int { return self::seconds(60 * $count); }
  public static function hours(int $count):     int { return self::minutes(60 * $count); }
  public static function days(int $count):      int { return self::hours(24 * $count); }
  public static function months(int $count):    int { return self::days(30 * $count); }
  public static function year(int $count):      int { return self::months(30 * $count); }

  public static function get(string $name): mixed
  {
    return $_COOKIE[$name] ?? null;
  }

  public static function set(
    string  $name,
    mixed   $value      = null,
    int     $expiresIn  = 0,
    string  $path       = '/',
    string  $domain     = '',
    bool    $secure     = true,
    bool    $httpOnly   = true): bool
  {
    return setcookie($name, $value, $expiresIn, $path, $domain, $secure, $httpOnly);

  }

  public static function forget(string $name): bool
  {
    return self::set($name, null, time() - (60 * 60 * 60 * 24 * 30));
  }
}
