<?php 

// configuraciones headers server

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');
// header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
