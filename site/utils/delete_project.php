<?php
if(isset($_GET['delete']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'delete'  => $_GET['id'],
            'project' => $_GET['id']
        );
    }
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
header('Location: index.php');
}