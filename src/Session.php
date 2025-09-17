<?php

namespace NightCommit\PHP\Http;


/**
 * i know this way in coding looks maniac
 * but i have this obsessive compulsive disorder
 * that keeps telling me to do this
 */
class Session
{
  public function __construct() { $this->start(); }

  public function start():    bool { return session_status() !== PHP_SESSION_NONE ?: session_start(); }
  public function destroy():  bool { return session_destroy(); }

  public function all(): array { return $_SESSION; }

  public function get(string $name):                mixed { return $_SESSION[$name] ?? null; }
  public function set(string $name, mixed $value):  void  { $_SESSION[$name] = $value; }

  public function id(?string $id = null):     string|false { return session_id($id); }
  public function name(?string $name = null): string|false { return session_name($name); }

  public function forget(string $name):       void  { unset($_SESSION[$name]); }
  public function flush():                    bool  { return session_unset(); }

  public function status(): int   { return session_status(); }

  public function regenerate_id(bool $deleteOldSession = false): bool {
    return session_regenerate_id($deleteOldSession);
  }
}
