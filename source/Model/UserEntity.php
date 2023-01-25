<?php
namespace Source\Model;

use Source\Core\Model;

class UserEntity extends Model
{
  public function __construct()
  {
      parent::__construct("users", [""],[""]);
  }
}