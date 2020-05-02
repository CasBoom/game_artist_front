<?php
$curl = curl_init();
$users = [];
if(isset($_SESSION['token']))
{
    $auth_data = array(
        'token'   => $_SESSION['token']
    );

    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/?users');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
    $users = json_decode($result, true)['users'];
}
