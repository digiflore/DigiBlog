<?php
abstract class Model
{
  public ?\PDO $db = null;

  protected function dbConnect()
  {
    if (is_null($this->db))
      $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    return $this->db;
  }
}
