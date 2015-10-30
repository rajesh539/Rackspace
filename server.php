<?php
$errors = array();
$data = array();
//print_r($_GET['username']);
//echo json_encode($_GET['username']);
// Getting posted data and decodeing json
//$_POST = json_decode(file_get_contents('php://input'), true);
//echo file_get_contents('data.json');

 $json_data = json_decode(file_get_contents('data.json'), true);
        session_start();
        $status=  session_id();
        $cookie_name = "rackspaceLogin";
        $cookie_value = $status;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            
    
file_put_contents('data.json', json_encode($json_data));
echo json_encode($status);
//echo'<pre>';print_r($_POST);echo'</pre>';*/
