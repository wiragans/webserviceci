<?php
error_reporting(0);
header('HTTP/1.1 500 Internal Server Error');
header('Content-Type: application/json; charset=UTF-8');
echo json_encode(array(
                'statusCode' => 500,
                'status'=> false,
                'Code'=>'01',
                'message' => 'Internal Server Error'
                ));
return false;
?>