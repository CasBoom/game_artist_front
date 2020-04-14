<?php
$curl = curl_init();
if(isset($_POST['request_mail'])){
    $auth_data = array(
        'request_mail'   => $_POST['request_mail']
    );
}
else if(isset($_POST['email'])&&isset($_POST['new_password'])&&isset($_POST['reset_token'])){
    $auth_data = array(
        'email'   => $_POST['email'],
        'reset_token' => $_POST['reset_token'],
        'new_password' => $_POST['new_password'],
    );
}

if(isset($auth_data)){
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
    curl_close($curl);
}

if(isset($_GET['code']))
{
    include('password_reset.php');
}else{
    include('request_reset.php');
}