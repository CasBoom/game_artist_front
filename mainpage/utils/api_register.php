<?php
$curl = curl_init();
if(isset($_GET['ac'])){
    $auth_data = array(
        'ac'   => $_GET['ac']
    );
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
curl_close($curl);
}