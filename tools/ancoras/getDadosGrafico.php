<?php

session_start();
$grafico = $_SESSION['grafico']; 

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0); 

