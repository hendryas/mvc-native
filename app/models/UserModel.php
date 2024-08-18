<?php

class UserModel extends Model
{
  public function getUsers()
  {
    $result = $this->db->query("SELECT * FROM users");
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
