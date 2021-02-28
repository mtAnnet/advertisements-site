<?php
$dsn = 'mysql:host=' . DATABASE_CONFIG['host'] . ';port=' . DATABASE_CONFIG['port'] . ';dbname=' . DATABASE_CONFIG['dbname'] . ';charset=utf8';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$pdo = new PDO($dsn, DATABASE_CONFIG['login'], DATABASE_CONFIG['password'], $options);
