<?php
SESSION_START();
if(isset($_GET['logout']))
        {
            session_destroy();
        }
  include('utils/api_connect.php');
  if(!$_SESSION['token']){
    header('Location: ../mainpage/login.php');
  }
  $user = $api['user_info'];
  $articles = $api['articles'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
    <link rel="stylesheet" href="src/css/style_download.css">
    <script href="js/index.js"></script>
</head>
<body>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
        }

        function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function () {
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function () {
                $('.image-upload-wrap').removeClass('image-dropping');
        });

    </script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <?php
      include('header.php');
    ?>
        <form  enctype="multipart/form-data" class="file-upload" method="post" action="upload_image.php">
            <h1 class="title-upload-form">Upload hier je afbeeldingen</h1>
            <input type="text" value="<?php echo $_GET['a']; ?>" name="project_id" hidden>
            <div class="image-upload-wrap">
                <input required class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>Drag and drop a file or select add Image</h3>
                </div>
            </div>
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                </div>
            </div>
            <div class="upload-button">
            <input type="submit" value="Upload">
            </div>
        </form>

        <form class="text-upload" method="post" action="upload_text.php">
            <input type="text" value="<?php echo $_GET['a']; ?>" name="project_id" hidden>
            <div class="input-fields">
                <input required type="text" class="text-field-upload" name="text">


            </div>
            <div class="upload-button">
                <input type="submit" value="Upload">
            </div>
        </form>
</body>
</html>