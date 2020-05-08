<?php
SESSION_START();

$tag = "GLU_GAME_ARTIST";

function upload_file($image, $tag){
    $fileName = $image['name'];
    $fileTmpName = $image['tmp_name'];
    $fileSize = $image['size'];
    $fileError = $image['error'];
    $fileType = $image['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'gif');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 100000**3 || TRUE) {
                $fileNameNew = $tag.uniqid('', true).date("Ymd").".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            return $fileDestination;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if(isset($_FILES['image'])){
    $file = $_FILES['image'];
    if(isset($_SESSION['token']))
        {
        if($_SESSION['token'])
        {
        
            if($image = upload_file($file, $tag)){
            $curl = curl_init();
            
                $auth_data = array(
                    'token'   => $_SESSION['token'],
                    'add_to_article' => '',
                    'project_id' => $_POST['project_id'],
                    'position' => '1',
                    'url' => $image
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
                header('Location: article.php?id='.$_POST['project_id']);
            }        
        }
    }
}
header('Location: ../article.php?id='.$_POST['project_id'].'&error=filesize'); 
?>