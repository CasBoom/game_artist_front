<?php
  SESSION_START();
  $_SESSION['article_id'] = "";
  include('utils/api_connect.php');
  if(!$_SESSION['token']){
    header('Location: login.php');
  }
  $user = $api['user_info'];
  $articles = $api['articles'];

  function select_item_first($array, $item, $string){
    foreach($array as $field){
      if(isset($field[$item])){
        return $field[$string];
      }
    }
    return "../upload/uploads/error.png";
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- <script src="js/animation.js"></script> -->
    <script src="src/js/jquery.js"></script>


    <div class="header">
        <div class="profile">
          <img src="https://www.pngkey.com/png/detail/157-1579943_no-profile-picture-round.png" alt="profile_picture" width="300px" height="300px">
          <h1 class="main_name"><?php echo $user['name']; ?></h1>
          <p class="main">Username</p><p class="after_main"><?php echo $user['username']; ?></p>
          <p class="main">Klas</p><p class="after_main"><?php echo $user['class']; ?></p>
          <button type="button" class="upload-btn" ><a class="btn-link" href="../upload/index.php">Upload project</a></button>
        </div>
    </div>

    
    <div class="container">
      <div class="gallery">
      <?php
      foreach($articles as $article){
        echo "<div class='imagegallery-img'>
        <a href='#' data-toggle='galleryModal'>
          <img src='". select_item_first($article['content']['items'], 'img', 'img'). "' alt='image' />
        </a>
      </div>";
      }
      ?>
      </div><!-- .end Gallery wrapper -->
    </div>
</body>
</html>