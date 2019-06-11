<?php
   
   require "db.php";
   unset($_SESSION['logged_user']);  //сессия "забывает" значение заданной сессионой переменной;
   header('Location: registr.php');  //Перенаправление на страницу
?>

