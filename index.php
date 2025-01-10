<?php
session_start();
require 'action/secureAction.php';
include 'includes/header.php';

echo "Bienvenue sur la page" .$_SESSION['name'] ;
?>