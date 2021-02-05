<?php
require_once '../src/OchApi.php';
use OchApi\OchApi;

$apiKey = ''; // Ваш API ключ
$OchApi = new OchApi($apiKey);
?>

<pre>
<?
print_r(json_decode($OchApi->GetServersInfo()));
print_r(json_decode($OchApi->GetServersStats()));
print_r(json_decode($OchApi->GetUsersVk()));
print_r(json_decode($OchApi->GetMessages()));
?>
</pre>
