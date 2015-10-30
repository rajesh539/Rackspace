<?php
$errors = array();
$data = array();
//print_r($_GET['username']);
//echo json_encode($_GET['username']);
// Getting posted data and decodeing json
//$_POST = json_decode(file_get_contents('php://input'), true);
//echo file_get_contents('data.json');

 $json_data = json_decode(file_get_contents('data.json'), true);
 
 //echo'<pre>';print_r($json_data['person']);echo'</pre>';
 $activateId=$_GET['id'];
 
for ($i = 0, $len = count($json_data['person']); $i < $len; ++$i) {
    if($json_data['person'][$i]['activate']==$activateId && $json_data['person'][$i]['status']!=1)
    {
    
        $json_data['person'][$i]['status']=1;
    }
    //$json_data['person'][$i]['num'] = (string) ($i + 1);
}
file_put_contents('data.json', json_encode($json_data));

$address=explode('/', $_SERVER['PHP_SELF']);

$link= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'].'/'.$address[1].'/login.html';
header($link);
echo json_encode($status);