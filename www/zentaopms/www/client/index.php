<?php 
$url = str_replace('client/', '', str_replace('\\', '/', $_SERVER['PHP_SELF'])) . (empty($_SERVER['QUERY_STRING']) ? '?' : ($_SERVER['QUERY_STRING'] . '&')) . 'usertype=client';
header("location: $url");
exit;