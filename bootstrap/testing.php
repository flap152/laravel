<?php

$testEnvironment = 'testing';
dd('dans' . __FILE__);

$config = require(__DIR__ . "/../config/$testEnvironment/database.php");

extract($config['connections'][$config['default']]);

$connection = new PDO("{$driver}:host={$host}", $username, $password);

$connection->query("DROP DATABASE IF EXISTS ".$database);

$connection->query("CREATE DATABASE ".$database);