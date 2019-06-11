<?php
 
require "libs/rb.php";
 
R::setup( 'mysql:host=localhost;dbname=registrdb',
        'root', '' );
 

session_start();  //запомнил пользователя