<head>
    <title> Задание 3 </title>
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
  </head>
  <body>

	 <form action="" id="Form" class="form" method="POST">
         <label>
           Имя: <br/>
           <input name="name">
         </label> <br/>
         <label>
           Почта: <br/>
           <input name="email">
         </label> <br/>
         
          Год рождения: <br/>
          <select name="year">
           	<?php for($i=0; $i<2201; $i++) {?> 
           	<option value="<?php print($i);?>"><?= $i?></option>
           	<?php } ?>	
          </select>
          <br/>
         Пол: <br/>
         <label>
           <input type="radio" value="m" name="gender"/> Мужской
         </label>
         <label>
           <input type="radio" value="f" name="gender"/> Женский
         </label>
         <label>
           <input type="radio" value="?" name="gender"> Не определилось
         </label> <br/>
         Количество конечностей: <br/>
         <label>
           <input type="radio" value="1" name="limbs"/> 1
         </label>
         <label>
           <input type="radio" value="2" name="limbs"/> 2 
         </label>
         <label>
           <input type="radio" value="3" name="limbs"/> 3
         </label>
         <label>
           <input type="radio" value="4" name="limbs" > 4
         </label>
         <label>
           <input type="radio" value="17" name="limbs"> 17
         </label> <br/> 
         Сверхспособности:  <br/>
         <select name="abilities[]" multiple>
         	<?php foreach ($ability_data as $key => $value) {?>
			<option value="<? $key; ?>"><?= $value; ?></option>
			<?php } ?> 
<!--   			<option value="1">iddqd</option> -->
<!--   			<option value="2">idkfa</option> -->
<!--   			<option value="3">idspispopd</option> -->
<!--   			<option value="4">В ад!</option> -->
         </select>
         <br/>
         <label> <br/>
           Биография: <br/>
           <textarea name="bio"></textarea>
         </label> <br/> 
        <label>
          <input type="checkbox" name="check"> С условиями контракта ознакомлен 
        </label> <br/>
        <input type="submit" value="Отправить">
      </form>
  </body>  
</html>
