<?php
require_once("../../vendor/autoload.php");
use App\Config\db;

$db = new db();
$db->conection();
