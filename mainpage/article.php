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
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/?article&id='.$_GET['id']);
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
$article = $api['articles'][0];

if(isset($_GET['delete']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'delete'  => '1',
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

if(isset($_GET['deleteimg']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'delete'  => '1',
            'image' => $_GET['img']
        );
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
}

if(isset($_GET['deletetxt']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'delete'  => '1',
            'text' => $_GET['txt']
        );
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
}

if(isset($_POST['public']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'    => $_SESSION['token'],
            'public'  => $_POST['public'],
            'project_id' => $_GET['id'],
            'edit'     => '1'
        );
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
}

if(isset($_POST['comment'])&&isset($_POST['rating']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'    => $_SESSION['token'],
            'comment'  => $_POST['comment'],
            'rating'  => $_POST['rating'],
            'project_id' => $_GET['id'],
            'add_to_article'     => '1'
        );
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
}

if(isset($_POST['delete_comment'])&&isset($_POST['comment_id']))
{
    $curl = curl_init();
    if(isset($_SESSION['token']))
    {
        $auth_data = array(
            'token'   => $_SESSION['token'],
            'delete'  => '1',
            'comment' => $_POST['comment_id']
        );
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_data);
    curl_setopt($curl, CURLOPT_URL, 'http://bitbenders.gluweb.nl/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Game artist portfolio</title>
</head>
<body>
    <?php
    echo "<h3>".$article['publisher']['name']."</h3><br>";
    echo $article['publisher']['username']."<br>";
    echo $article['publisher']['class']."<br>";
    if($article['editable']){
        echo "<a href='article.php?id=".$_GET['id']."&delete=1'>
                Delete
            </a><br>";
        echo "<a href='http://localhost/bureau/game_artist/git_front/game_artist_front/upload/upload.php?a=".$_GET['id']."'>
                Upload
            </a>";

        echo "<form method=\"post\" action=\"article.php?id=".$_GET['id']."\">
            Public: <br>
            <input type=\"radio\" id=\"yes\" name=\"public\" value=\"1\">
            <label for=\"\">Yes</label><br>
            <input type=\"radio\" id=\"no\" name=\"public\" value=\"0\">
            <label for=\"no\">No</label><br>
            <input type=\"submit\">
        </form>";

        foreach($article['content']['items'] as $item){
            if(isset($item['img'])){
                echo "
                <div class='project-image'>
                    <img src='../upload/".$item['img']."' alt='p-img' width='100%'>
                    <a href='http://localhost/bureau/game_artist/git_front/game_artist_front/mainpage/article.php?id=".$_GET['id']."&deleteimg=1&img=".$item['id']."'>
                        Delete
                    </a>
                </div>
                ";
            }else if(isset($item['txt'])){
                echo "
                <div class='project-info'>
                    <p>".$item['txt']."</p>
                    <a href='http://localhost/bureau/game_artist/git_front/game_artist_front/mainpage/article.php?id=".$_GET['id']."&deletetxt=1&txt=".$item['id']."'>
                        Delete
                    </a>
                </div>
                ";
            }
        }
    }else{
        foreach($article['content']['items'] as $item){
            if(isset($item['img'])){
                echo "
                <div class='project-image'>
                    <img src='../upload/".$item['img']."' alt='p-img' width='100%'>
                </div>
                ";
            }else if(isset($item['txt'])){
                echo "
                <div class='project-info'>
                    <p>".$item['txt']."</p>
                </div>
                ";
            }
        }
    }
    ?>
    <form method="post" action="">
        Rating: <input type="number" name="rating" max="10" min="0" required><br>
        Comment :<textarea name="comment" required></textarea><br>
    <input type="submit">
    </form>
    <div class="comments-field">
        <?php
        foreach($article['content']['comments'] as $comment){
            echo "
            <div class='comment'>";
            if($article['editable']||$comment['editable'])
            {
                echo "<form action=''. method='post'>
                    <input type='text' value='".$comment['id']."' name='comment_id' hidden>
                    <input type='submit' value='delete' name='delete_comment'>
                <form>";
            }
            echo "<p class='username'>".$comment['username']."</p>
                <p class='comment-text'>".$comment['comment']."</p>
                <p class='star-rating'>".$comment['rating']."/10</p>
            </div>
            ";
        }
        ?>
    </div>
    
</body>
</html>