<?php

  $host   = 'localhost';
  $dbname = 'simple-kakeibo';
  $user   = 'simple_kakeibo_user';
  $pass   = '1111';

  $dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
try {

  $pdo = new PDO ($dsn, $user, $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );

  // var_dump($pdo);

} catch (PDOException $e) {

    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());

}