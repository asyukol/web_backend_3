<?php 
    header('Content-Type: text/html; charset=UTF-8');
    $ability_data = ['iddqd'=> 'Бессмертие', 'idspispopd' =>'noclip', 'fly' => 'Летать', 'power'=> 'Сила'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
        if (!empty($_GET['save'])) 
        {
            print('Спасибо, результаты сохранены.');
        }
        include('form.php');
        exit();
    }
    
    
        $errors=FALSE;
        if (empty($_POST['name']))
        {
            $errors=TRUE;
            print("ЗАПОЛНИ ИМЯ<br/>");
        }

        if (empty($_POST['email']))
        {
            $errors=TRUE;
            print("ЗАПОЛНИ ПОЧТУ<br/>");
        }
        if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
        {
            $errors=TRUE;
            print("ЗАПОЛНИ ПОЧТУ НОРМАЛЬНО<br/>");
        }
        if (empty($_POST['year']))
        {
            $errors = TRUE;
            print('ВЫБЕРИ ГОД<br/>');
        }
        if (!isset($_POST['gender']))
        {
            $errors = TRUE;
            print('ВВЕДИ СВОЙ ПОЛ<br/>');
        }
        if (empty($_POST['abilities']))
        {
            $errors = TRUE;
            print('ВЫБЕРИ СПОСОБНОСТЬ<br/>');
        }
        
        if (empty($_POST['bio']))
        {
            $errors = TRUE;
            print('НАПИШИ МЕМУАРЫ<br/>');
        } 
        if(!isset($_POST['check']))
        {
            $errors = TRUE;
            print('ПОСТАВЬ ГАЛОЧКУ<br/>');
        }
        if ($errors) exit();
    
    $user = 'u16665';
    $pass = '8784162';
    $db = new PDO('mysql:host=localhost;dbname=u16665', $user, $pass,
    array(PDO::ATTR_PERSISTENT => true));
    $abilities1=[];
    $abilities_recieved=$_POST['abilities'];
    foreach ($ability_data as $ability)
    {
        $abilities1[$ability] = in_array($ability, $abilities_recieved)? 1:0;
    }
    
   $year=$_POST['year'];
   $limbs=$_POST['limbs'];
    try 
    {
        $stmt = $db->prepare("INSERT INTO web_3 SET name = ?, email = ?, year = ?, gender = ?, limbs = ?, bio = ?");//при добавлении способностей в запрос происходят странные вещи
        $stmt->execute([$_POST['name'], $_POST['email'], intval($year) , $_POST['gender'], intval($limbs),$_POST['bio']]);
    }
    catch(PDOException $e){
        print('Error : ' . $e->getMessage());
        exit();
    }
    
    header('Location: ?save=1'); 
?>
