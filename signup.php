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
<form ation="/signup.php" method="POST">                 <!-- Post -  Метод post посылает на сервер данные в запросе браузера. -->

 <?php  
   $data = $_POST;                  // все переменные которые возвращаются по Post - будет являться супермассивом
   if (isset($data['do_signup']))  // isset - отлична ли переменная от NULL ,    do_signup - при нажатии кнопки выполняется команда
   {                              
	   // здесь регистрируем
	  
	  $errors = array();
	  if (trim($data['login']) == '' ) //trim-обрезает пробелы перед и после символов в строке
      {
		 $errors[] = 'Введите логин!'; //проверяем элемент на путсоту
	  }
	  
	  if (trim($data['email']) == '' )  // записываем в массив $data['email'] по имени элемента
      {
		 $errors[] = 'Введите mail!'; 
	  }
	  
	  if ($data['password'] == '' ) 
      {
		 $errors[] = 'Введите пароль!'; 
	  }
	  
	   if ($data['password2'] != $data['password'] ) 
      {
		 $errors[] = 'Повторный пароль введен неверно!'; 
	  }
	  
	  
	  if (R::count('users', 'login = ?' , array($data['login'])) > 0 )        //count - подсчитывает количество записей
      {                                                                      //это смотрим : нет ли одинаково-забитых логинов 
		  $errors[] = "Пользователь с таким логином уже существует" ;
	  }
	  
	  if (R::count('users' , 'email = ?' , array($data['email'])) > 0 )      
      {                                                                     //это смотрим : нет ли одинаково-забитых мэйлов
		  $errors[] = "Пользователь с таким Email уже существует" ;
	  }
	  
	 if (empty($errors))                         // empty - проверка считается ли переменная пустой
	 {
		    //все хорошо, регестрируем
			$user = R::dispense('users');                                              // создаем в созданной БД таблицу users
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);     // ( -> означает "что находится справа от оператора, является членом объекта, созданного в переменной в левой части оператора.")
			R::store($user);                                                          //присваиваем все значения user в таблицу users         
			echo '<div style="color: green;">Вы успешно зарегистрированы!</div><hr>';
	 }
	 else
	 {
		 echo '<div style="color: red">'.array_shift($errors).'</div><hr style="width:260px;margin-right:50px;">'; //array_shift - извлекает первый элемент
	 }
	  
   }
?>

  <p>
     <p><strong>Ваш логин</strong>:</p>
     <input type="text" name="login"         value="<?php echo @$data['login'];?>">   <!--если введен, то значение запоминается-->
  </p>                                                                                <!--@ не дает вывестись ошибке-->
    
  <p>
     <p><strong>Ваш Email</strong>:</p>  
     <input type="email" name="email"        value="<?php echo @$data['email'];?>">
  </p>
  
   <p>
     <p><strong>Ваш пароль</strong>:</p>
     <input type="password" name="password"  value="<?php echo @$data['password'];?>">
  </p>
  
   <p>
     <p><strong>Введите пароль еще раз</strong>:</p>
     <input type="password2" name="password2" value="<?php echo @$data['password2'];?>">
  </p>
  
   <p>
      <button type="submit" name="do_signup">Зарегистрироваться</button>
   </p>

</form>
</div>
</div>
</div>
</body>
</html>

