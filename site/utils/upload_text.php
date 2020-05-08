<?php
SESSION_START();

$curl = curl_init();
$auth_data = array(
    'token'   => $_SESSION['token'],
    'add_to_article' => '',
    'project_id' => $_POST['project_id'],
    'position' => '1',
    'message' => $_POST['text']
);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
if(!$result){
}else{
    $api = json_decode($result, true);
    $_SESSION['token'] = $api['user_info']['token'];
}
curl_close($curl);
header('Location: ../article.php?id='.$_POST['project_id']);
?>