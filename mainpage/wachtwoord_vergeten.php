<?php
if(isset($_GET['code']))
{
    include('password_reset.php');
}else{
    include('request_reset.php');
}