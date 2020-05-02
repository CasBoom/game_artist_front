<?php
if(isset($_POST['destroy_tag']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'destroy'  => '1',
            'tag' => $_POST['destroy_tag']
        );
    
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
        curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_exec($curl);
    }
}