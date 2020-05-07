<?php
  SESSION_START();
  $index = true;
  $_SESSION['article_id'] = "";
  include('utils/api_connect.php');
  $user = $api['user_info'];
  if(isset($api['articles'])){
    $articles = $api['articles'];
  }
  $miscs = $api['miscs'];
  function select_item_first($array, $item, $string){
    foreach($array as $field){
      if(isset($field[$item])){
        return $field[$string];
      }
    }
    return "uploads/error.png";
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
    <div class="header">
        <div class="profile">
          <h1 class="main_name"><?php echo $user['name']; ?></h1>
          <p class="main">E-mail</p><p class="after_main"><?php echo $user['username']; ?></p>
          <p class="main">Klas</p><p class="after_main"><?php echo $user['class']; ?></p>
          <form action="upload_index.php" method="post">
            Les<br>
            <select id="les" name="klas" required>
              <?php
                foreach($miscs['lessons'] as $les)
                {
                  echo "<option value='".$les['id']."'  required>".$les['lesson']."</option >";
                }
              ?>
            </select required><br><br>
            Periode<br>
            <select id="periode" name="period" required>
              <?php
                for($i = 1; $i<=16; $i++)
                {
                  echo "<option value='$i'> Periode $i</option>";
                }
              ?>
            </select required><br><br>
            <input type="submit" class="upload-btn" value="Upload"><br>
          </form>
        </div>
    </div>

    
    <div class="container">
      <div class="gallery">
      <?php
      // Laadt alle cards 
      if(isset($articles))
      {
        foreach($articles as $article){
          echo "
          <div class='imagegallery-img'>
            <a href='article.php?id=".$article['id']."' data-toggle='galleryModal'>
              <p>Periode ".$article['period']."</p>
              <p>Les: ".$article['content']['info']['les']."</p>
              <img src='". select_item_first($article['content']['items'], 'img', 'img'). "' alt='image' />
              <p>Gebruiker: ".$article['publisher']['name']."</p>
              <p>Klas: ".$article['publisher']['class']."</p>
            </a>
          </div>";
        }
    }
      ?>
      </div><!-- .end Gallery wrapper -->
    </div>
</body>
</html>