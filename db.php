<?php
// db.php

$host = 'localhost';
$db   = 'todo_app';
$user = 'pedro'; 
$pass = 'MyStrongPass123!';   
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // modo de error
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // modo de obtención por defecto
  PDO::ATTR_EMULATE_PREPARES   => false,                  // emulación de preparaciones
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  exit('Error de conexión: ' . $e->getMessage());
}
