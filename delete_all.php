<?php
require 'db.php';

$pdo->exec("DELETE FROM tasks");

http_response_code(200); 
