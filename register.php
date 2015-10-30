<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$json_data = json_decode(file_get_contents('data.json'), true);
$len = count($json_data['person']);
$json_data['person'][$len]['id']=$len;
$json_data['person'][$len]['username']=$_GET['username'];
$json_data['person'][$len]['email']=$_GET['email'];
$json_data['person'][$len]['password']=$_GET['password'];
$json_data['person'][$len]['activate']= session_id();
file_put_contents('data.json', json_encode($json_data));
//echo $_SERVER['PHP_SELF'];
$address=explode('/', $_SERVER['PHP_SELF']);

$link= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'].'/'.$address[1].'/activate.php?id='.session_id();
//echo $link= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'].'/'.$address[1].'/activate.php';
//$_GET['email']='rajeshms979@gmail.com';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = <<<EOF
<html>
<body>
        <p>Welcome to Rackspace.
   Thanks for Registring.         
   </p>
<a href='http://$link'>Click Here to activate!!!</a>
</body>
</html>
EOF;
     
mail($_GET['email'], 'Activation link for Rackspace', $message,$headers);

