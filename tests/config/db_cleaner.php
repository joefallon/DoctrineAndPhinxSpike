<?php
$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Perform database cleanup.
$pdo->exec('SET FOREIGN_KEY_CHECKS=0;');
//$pdo->exec('TRUNCATE TABLE `gtwy_tests`');
//$pdo->exec('TRUNCATE TABLE `join_tests`');
$pdo->exec('SET FOREIGN_KEY_CHECKS=1;');
