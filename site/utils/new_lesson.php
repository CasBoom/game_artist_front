<?php
if(isset($_POST['new_lesson']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'create'  => '1',
            'lesson' => $_POST['new_lesson']
        );
    
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
        curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);
    }
}
