<?php
SESSION_START();
include('utils/api_connect.php');
$user = $api['user_info'];
if($user['role']>2){
    header('Location: index.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/css/style.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- <script src="js/animation.js"></script> -->
    <script src="src/js/jquery.js"></script>
    <?php
      include('header.php');
      include('utils/new_tag.php');
      include('utils/new_lesson.php');
      include('utils/destroy_tag.php');
      include('utils/destroy_lesson.php');
      include('utils/get_users.php');
      include('utils/upgrade_users.php');
      include('utils/downgrade_users.php');
      include('utils/api_connect.php');
      $miscs = $api['miscs'];
    ?>
    <div class="container">
        <h3>Tag toevoegen</h3>
        <form method="post" action="">
            Tag: <input type="text" name="new_tag">
            <input type="submit" value="submit">
        </form>

        <h3>Tag Verwijderen</h3>
        <form method="post" action="">
            Tag: <select id="tag" name="destroy_tag">
                <?php foreach($miscs['tags'] as $tag)
                {
                    echo "<option value='".$tag['id']."'>".$tag['tag']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="submit">
        </form>

        <h3>Les toevoegen</h3>
        <form method="post" action="">
            Les: <input type="text" name="new_lesson" required>
            <input type="submit" value="submit">
        </form>

        <h3>Les Verwijderen</h3>
        <form method="post" action="">
            Les: <select id="les" name="destroy_lesson">
              <?php
                foreach($miscs['lessons'] as $les)
                {
                    if($les['id']!=1){
                        echo "<option value='".$les['id']."'>".$les['lesson']."</option>";
                    }
                }
              ?>
            </select required>            
            <input type="submit" value="submit">
        </form>

        <h3>Account naar leraar omzetten</h3>
        <form method="post">
            Account: <select name="upgrade_roll">
              <?php
                foreach($users as $new_user)
                {
                    if($new_user['role']==3){
                      echo "<option value='".$new_user['id']."'>Naam:".$new_user['name']." | Email:".$new_user['username']."</option>";
                    }
                }
              ?>
            </select required>
            <input type="submit" value="submit">
        </form>
        <?php
            if($user['role']==1){
                echo "<h3>Account naar student</h3>
                <form method='post'>
                    Account: <select name='downgrade_roll'>";
                        foreach($users as $new_user)
                        {
                            if($new_user['role']==2){
                            echo "<option value='".$new_user['id']."'>Naam:".$new_user['name']." | Email:".$new_user['username']."</option>";
                            }
                        }
                    echo "</select required>
                    <input type='submit' value='submit'>
                </form>";
            }
        ?>
    </div>
</body>
</html>