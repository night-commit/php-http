<?php

namespace AbdelrhmanSaeed\PHP\Http;


class File
{
  public function __construct(private array $file) { }

  public function name(): string      { return $this->file['name']; }
  public function tmp():  string      { return $this->file['tmp_name']; }
  public function size(): int         { return $this->file['size']; }

  /**
  * returns the defined name extension
  *
  * @return string
  */
  public function extension(): string
  {
    return strtolower(pathinfo($this->name(), PATHINFO_EXTENSION));
  }

  /**
  * check if file is uploaded correctly
  *
  * @return bool
  */
  public function uploaded(): bool
  {
    return is_uploaded_file($this->tmp());
  }

  /**
  * moves the file from the tmp path to the specified path
  *
  * @return bool
  */
  public function store(string $path, ?string $name = null): bool
  {
    return move_uploaded_file($this->tmp(),
      rtrim($path, '/') . '/' . basename( $name ?? $this->name() )
    );
  }
}
