<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(isset($_COOKIE['rackspaceLogin']))
{
    $status=1;
    
}
else{
    $status=0;
}
if(isset($_GET['id'])){
    setcookie('rackspaceLogin', '', time()-3600);
    $status=0;
    header('http://localhost:8888/Rackspace/login.html');
}
echo json_encode($status);