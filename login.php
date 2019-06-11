<?php
   require "db.php";
?>   



<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/1.css" type="text/css"/>      
  <title>Mars</title>
</head>
<body>
<div class="main-block1">
<div class="main-block2">
<div class="message-block">

<form ation="/login.php" method="POST">

<?    
	$data = $_POST;            
   if (isset($data['do_login']))  
   {     
     $errors = array();                       
	 $user = R::findOne('users', 'login = ?', array($data['login']));  //находим  user по логину
	  if ($user)                                                   //если пользователь найден то..
	  {
		//логин существует
		
        if (password_verify($data['password'], $user->password)){  //последняя запись звучит : считывается пароль который принадлежит user
	      //password_verify - хэш пароль считывает
		  
		  $_SESSION['logged_user'] = $user;    // теперь доступен
		  echo '<div style="color: green;">Вы успешно авторизованы!<br/>Вы можете перейти на <a href="/registr.php"">главную </a>страницу!</div><hr style="width:285px;margin-right:30px">';
		
		}else
		{
			$errors[] = 'Пароль введен неверно';
		}
	  } else
	  {
		  $errors[] = 'Пользователь с таким логином не найден!';
	  }
	  
	  
	  
	  if (! empty($errors))                         
	 {
		 echo '<div style="color: red">'.array_shift($errors).'</div><hr style="width:285px;margin-right:30px">'; 
	 }
   }
	
?>

  <p>
     <p><strong>Логин</strong>:</p>
     <input type="text" name="login"         value="<?php echo @$data['login'];?>">   
  </p>                                                                                
  
   <p>
     <p><strong>Пароль</strong>:</p>
     <input type="password" name="password"  value="<?php echo @$data['password'];?>">
  </p>
  
   <p>
      <button type="submit" name="do_login">Войти</button>
   </p>

</form>
</div>
</div>
</div>
</body>