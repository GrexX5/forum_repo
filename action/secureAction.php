<?php 
if(!isset($_SESSION['auth'])){
    header('location:signLog.php');
}