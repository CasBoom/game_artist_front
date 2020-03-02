<?php
SESSION_START();
$curl = curl_init();
if(isset($_GET['id'])){
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
            'r_class'   => $_POST['r_class'],
            'r_pass'   => $_POST['r_pass']
        );
    }
    else if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token']
        );
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/bureau/game_artist/git_api/web_artist_API/?article&id='.$_GET['id']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
}
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
$user = $api['user_info'];
$article = $api['articles'];

var_dump($article);