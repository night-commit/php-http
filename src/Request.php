<?php

namespace AbdelrhmanSaeed\PHP\Http;


class Request
{
  private array   $info;

  /**
   * instantiating the Request class and caching server info
   */
  public function __construct() { $this->info = $_SERVER; }

  /**
   * returns json data request
   * @return string
   */
  public function content(): string
  {
    return file_get_contents("php://input");
  }

  /**
   * returns decoded json data request
   * @return array
   */
  public function data(): array
  {
    return json_decode($this->content(), true);
  }

  /**
   * checks if a keys exists in data - kinda useless tbh
   * @return bool
   */
  public function exists(string $key, array $data): bool
  {
    return isset($data[$key]);
  }

  /**
   * check if a custom array key exists and not empty
   * @return bool
   */
  public function filled(string $key, array $data): bool
  {
    return $this->exists($key, $data) && !empty($data[$key]);
  }

  /**
   * returns sepecific GET data or the whole GET request
   * @return null|string|array
   */
  public function get(string $key = null, mixed $value = null): null|string|array
  {
    return is_null($key)
      ? $_GET : $_GET[$key] ?? $value;
  }

  /**
   * returns sepecific POST data or the whole POST request
   * @return null|string|array
   */
  public function post(string $key = null, mixed $value = null): null|string|array
  {
    return is_null($key)
      ? $_POST : $_POST[$key] ?? $value;
  }

  /**
   * returns the DOCUMENT_ROOT
   * @return string
   */
  public function root(): string
  {
    return $this->info['DOCUMENT_ROOT'];
  }

  /**
   * returns the SERVER_NAME
   * @return string
   */
  public function server_name(): string
  {
    return $this->info['SERVER_NAME'];
  }

  /**
   * returns the SERVER_PORT
   * @return string
   */
  public function server_port(): string
  {
    return $this->info['SERVER_PORT'];
  }

  /**
   * returns the HTTP_HOST
   * @return string
   */
  public function host(): string
  {
    return $this->info['HTTP_HOST'];
  }

  /**
   * returns the REQUEST_URI
   * @return string
   */
  public function uri(): ?string
  {
    return $this->info['REQUEST_URI'] ?? null;
  }

  /**
   * returns the request QUERY_STRING
   * @return string
   */
  public function query(): ?string
  {
    return $this->info['QUERY_STRING'];
  }

  public function files(): array
  {
    return $_FILES;
  }

  public function file(string $name): ?File
  {
    return array_key_exists($name, $this->files())
      ? new File($this->files()[$name])
      : null;
  }

  public function headers(?string $name = null): null|string|array
  {
    return is_null($name) ? getallheaders() : getallheaders()[$name] ?? null;
  }

  public function bearer(): ?string
  {
    $token = $this->headers('Authorization');
    $token = explode(' ', $token);

    return $token[1] ?? null;
  }

}
