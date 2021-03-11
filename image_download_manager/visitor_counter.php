<?php 
$fn = "visitors.txt";

$f = fopen($fn,'r');
$val = fgets($f);
$visitors_to_show = ($val + 1);
$val++;

$f = fopen($fn, "w");
fwrite($f,$val);

fclose($f);

