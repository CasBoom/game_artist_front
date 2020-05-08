<?php
SESSION_START();
$curl = curl_init();
if(isset($_SESSION['token']))
{
    if(isset($_POST['klas'])&&isset($_POST['period']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'create_article' => 1,
            'public' => 0,
            'class' => $_POST['klas'],
            'period' => $_POST['period']
        );
    
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
        curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);
        if(!$result){
            header('Location: index.php');    
        }else{
            $api = json_decode($result, true);
            $article = $api['article_id'];
            header('Location: ../upload.php?a='.$article);
        }
        curl_close($curl);
        
    }
}
else
{
    header('Location: index.php');
}
?>