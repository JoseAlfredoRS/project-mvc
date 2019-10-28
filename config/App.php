<?php

DEFINE("DB_HOST", "localhost");
DEFINE("DB_NAME", "eurekabank");
DEFINE("DB_USER", "root");
DEFINE("DB_PASS", "rootroot");

DEFINE('ENCRYPT', 'JOSE@ALFREDO#2019?RS' . date("Ymd"));
DEFINE('METHOD', 'AES-256-CBC');
DEFINE('SECRET_KEY', ENCRYPT);
DEFINE('SECRET_IV', '101712');

date_default_timezone_set('America/Lima');
