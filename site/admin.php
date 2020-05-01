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
    ?>
    <div class="container">
        <h3>Tag toevoegen</h3>
        <form>
            
        </form>

        <h3>Les toevoegen</h3>
        <form>
            
        </form>

        <h3>Account naar leraar omzetten</h3>
        <form>
            
        </form>
    </div>
</body>
</html>