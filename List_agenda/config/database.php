<?php
class Database {
  public static function connect(){
    $db = new mysqli("localhost", "root", "", "db_event");

    if($db->connect_error){
      die("Koneksi gagal: " . $db->connect_error);
    }

    return $db;
  }
}
