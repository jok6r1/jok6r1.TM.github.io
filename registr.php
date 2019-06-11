<?php
   require "db.php";
?>
<?php if(isset($_SESSION['logged_user']) ) : ?>               <!-- двоеточие - замена круглой скобки { -->


  Авторизован!<br>
  Привет, <?php echo $_SESSION['logged_user']->login.' !' ?>  <!-- прописываем текст + имя пользователя -->
  <a href = "/logout.php">Выйти</a>
  
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/1.css" type="text/css"/>    
   <script src="js/1.js"></script>   
  <title>Mars</title>
</head>
<body>


<div class="main-block1">
<div class="main-block2">

<div clas="top-line">
 <div class="headline">Team messenger</div>

<div class="menu">

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Контакты сквада</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#about">Владимир</a>
    <a href="#base">Роман</a>
    <a href="#blog">Дмитрий</a>
    <a href="#contact">Оля</a>
    <a href="#custom">Ульяна</a>
    <a href="#support">Ангелина</a>
    <a href="#tools">Илья</a>
	<a href="#assistant">Анастасия</a>
	<a href="#programmer">Александр</a>
  </div>
</div>

  
  </div>
 </div>
 
 <div class="message-block">
 
  <form method="POST">
    <input style="display: inline;" type='text' name='pole' size='16' maxlength='500' placeholder='введите сообщение'  AUTOCOMPLETE="off">  <!--AUTOCOMPLETE="off" не вылазит снизу текст как подсказка-->
    <p><input style="cursor:pointer;background: transparent; border: none;" type="submit" name="button_id" value=""/></p>
</form>
<?php
 
# Если кнопка нажата
    
	// $timezone = date_default_timezone_get(); - определяет в каком регионе находится сервер, у меня показывает Москву
	
    date_default_timezone_set('Asia/Vladivostok');   // выставил вручную
    $date = date('G:i', time());                   //('m/d/Y h:i:s a', time()) если хочу вытащить все временные штучки
	
	
	
	
	if(isset( $_POST['button_id']))
    {
        $a = $_POST['pole'];
		
	 
     if (!empty($a)){
		 
    
		 
		 echo '<div style=" 
		 float:left;
		 width:200px; 
		 height:auto; 
		 padding-top:3px;
		 padding-bottom:3px;
		 background-color:grey; 
		 padding-left:5px;
		 border-radius:5px;
		 font-size:14px;
		 word-wrap: break-word; ">'.$a.'</div>'.
		'<div style="
		 display:inline-block; 
		 width:30px; 
		 height:auto; 
		 padding-top:3px;
		 padding-bottom:3px;
		 padding-left:2px;
		 border-radius:5px;
		 margin-left:8px;
		 font-size:14px;">'.$date.'</div>'; 
	 }

    }
	
	
?>

	   
 </div>
</div>
</div>
<style>

</style>

</body>
</html>


<?php else : ?>

 <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/2.css" type="text/css"/>      
  <title>Mars</title>
</head>
<body>


<div class="main-block1">
<div class="main-block2">
<div clas="top-line">
 <div class="headline">Team messenger</div>

<div class="menu">

<div class="dropdown1"><button class="dropbtn" ><a href="signup.php">Регистрация</a></button></div>
<div class="dropdown2"><button class="dropbtn" ><a href="login.php">Авторизоваться</a></button></div>
</div>
</div>
<div class="message-block">
<p style="margin-left:28%;">Привет, сквадовец!</p>
<p style="padding-right:1.5em">В этом мессенджере ты сможешь общаться со всей бандой TEAM SQUAD не выходя из дома</p>
</div>
</body>
</html>


<?php endif; ?> 

