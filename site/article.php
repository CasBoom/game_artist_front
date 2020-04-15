<?php
SESSION_START();
include('utils/api_connect.php');
include('utils/delete_project.php');
include('utils/delete_img.php');
include('utils/delete_text.php');
include('utils/delete_comment.php');
include('utils/post_comment.php');
include('utils/article_public.php');

$user = $api['user_info'];
$article = $api['articles'][0];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Game artist portfolio</title>
</head>
<body>
<?php
    include('header.php');
    ?>
        <div class="userinfo">
            <?php
            echo "<h3>".$article['publisher']['name']."</h3><br>";
            echo $article['publisher']['username']."<br>";
            echo $article['publisher']['class']."<br>";
            ?>
        </div>
    <?php
    if($article['editable']){
        if(isset($_GET['error'])){
            if($_GET['error']=='filesize'){
                echo "<script>
                 alert('Your file hasn\'t been uploaded because it was too big.');
                </script>";
            }
        }
        echo "<a href='article.php?id=".$_GET['id']."&delete=1'>
                Delete
            </a><br>";
        echo "<a href='http://bitbenders.gluweb.nl/game_artist/upload.php?a=".$_GET['id']."'>
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
                    <img src='".$item['img']."' alt='p-img' width='100%'>
                    <a href='http://bitbenders.gluweb.nl/game_artist/mainpage/article.php?id=".$_GET['id']."&deleteimg=1&img=".$item['id']."'>
                        Delete
                    </a>
                </div>
                ";
            }else if(isset($item['txt'])){
                echo "
                <div class='project-info'>
                    <p>".$item['txt']."</p>
                    <a href='http://bitbenders.gluweb.nl/game_artist/mainpage/article.php?id=".$_GET['id']."&deletetxt=1&txt=".$item['id']."'>
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
                    <img src='".$item['img']."' alt='p-img' width='100%'>
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