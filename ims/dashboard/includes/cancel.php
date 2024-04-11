<?php



$command = 'sudo killall python3';
$output = shell_exec($command);
echo ("Add fingerprint cancelled.");
echo $output;

?>
