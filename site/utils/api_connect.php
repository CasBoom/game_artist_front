<?php
if(!session_status()){
    SESSION_START();
}
$curl = curl_init();
$auth_data = array('null' => '0');
if(isset($_POST['username'])&&isset($_POST['password'])){
    $auth_data = array(
        'username'   => $_POST['username'],
        'password'   => $_POST['password']
    );
}
else if(isset($_POST['r_user'])&&isset($_POST['r_name'])&&isset($_POST['r_pass'])&&isset($_POST['r_class']))
{
    $auth_data = array(
        'r_user'   => $_POST['r_user'],
        'r_name'   => $_POST['r_name'],
        'r_class'  => $_POST['r_class'],
        'r_pass'   => $_POST['r_pass']
    );
}
elseif(isset($_SESSION['token']))
{
    $auth_data = array(
        'token'   => $_SESSION['token']
    );
}
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
if(isset($_GET['id'])){
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/?article&tags&id='.$_GET['id']);
}
else{
    if(isset($_GET['filter'])&&isset($_GET['f_klas'])&&isset($_GET['f_period']))
    {
        curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/?articles&tags&filter='.$_GET['filter'].'&f_klas='.$_GET['f_klas'].'&f_period='.$_GET['f_period']);
    }else{
        curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/?articles&tags');
    }
}
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
if(!$result){
    $_SESSION['token'] = false;
}else{
    $api = json_decode($result, true);
    $_SESSION['token'] = $api['user_info']['token'];
}
curl_close($curl);

if(!$_SESSION['token']){
    header('Location: login.php');
}