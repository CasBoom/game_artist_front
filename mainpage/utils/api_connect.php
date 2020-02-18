<?php
$curl = curl_init();
$auth_data = array(
    'username'   => "520230",
    'password'      => "test",
    'token'  => 'ck1mMjNrZmxGWDVka1JyOW5BVDdUUHYzVm9wWG1NTTRzQjFIeDY'
);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('sw-access-key:SWSCU1G0RG4YWLRXC1VKZUVQVW'));
curl_setopt($curl, CURLOPT_URL, 'http://u520230.gluweb.nl/webapi/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
var_dump($result);
if(!$result){
    $valid = true;
}else{
    $valid = true;
    curl_close($curl);
    $api = json_decode($result, true);
}
