<?php
class Event {
  public static function create($db, $d){
    $sql = "INSERT INTO events (nama_event, tanggal, lokasi, deskripsi)
            VALUES (
              '{$d['nama']}',
              '{$d['tanggal']}',
              '{$d['lokasi']}',
              '{$d['deskripsi']}'
            )";

    if(!$db->query($sql)){
      die($db->error);
    }
  }
}
