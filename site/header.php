<header>
    <a class="glu_logo_wrapper" href="index.php">
        <div class="glu_logo">
        </div>
    </a>
    <?php
            if(isset($index)){
                echo "
                <div class='filter'>
                <form  action='' method='get'>
                    <input type='text' name='filter'>
                    <input type='submit'>
                </form>
                </div>
                ";
            }
            if($user['role']<=2){
                echo "<a href='admin.php' class='cool_button admin'>Admin</a>";
            }
        ?>
        
    <a href="?logout" class="cool_button logout">Logout</a>
</header>
<style>
    .filter{
        display:inline-block;
        margin-top:55px;
        margin-left:5%;
    }

    header{
        width:100%;
        height:120px;
        border-bottom:1px solid #c9c9c9;
    }
    
    .glu_logo_wrapper{
        margin-left:100px;
        float:left;
        width:360px;
    }

    header .glu_logo{
        height:120px;
        width:360px;
        background-image:url('img/logo.png');
        background-position:center;
        background-repeat:no-repeat;
    }

    a{
        text-decoration:none;
    }

    header .cool_button{
        padding:10px;
        float:right;
        margin-right:25px;
        border-radius:15px;
        margin-top:45px;
        width:5%;
        min-width:80px;
        color:#fff;
        font-weight:bold;
        text-align:center;
    }

    header .logout{
        background-color:#f00;
    }

    header .admin{
        background-color:#494;
    }
</style>
<?php
    if(isset($_GET['logout']))
    {
        session_destroy();
    }
?>