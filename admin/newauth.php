<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة كتاب جديد</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<form method="POST" class="container mt-2">
 <label>إسم الكاتب </label>
 <input class="form-control" type="text" name="AuthName"  required/>
 <label>وصف الكاتب</label>
 <textarea class="form-control" type="text" name="AuthDescription"  required></textarea>
 <label> الصورة الكاتب</label>
 <input class="form-control" type="text" name="AuthCover"  required/>
 <label>رابط الاقتباس</label>
 <input class="form-control" type="text" name="view"  required/>
 <button class="btn btn-outline-info mt-2 w-100" name="add" type="submit">إضافة الكاتب</button>
</form>

<?php
require_once 'connect.php';
session_start();
if (isset($_SESSION['name'] , $_SESSION['password']) && !empty($_SESSION['name']) && !empty($_SESSION['password'])) {
    if (isset($_POST['add'])) {
        $addbook = $db->prepare("INSERT INTO authors(AuthName,AuthDescription,AuthCover,view) VALUES(:authName,:authDescription,:authCover,:view)");
        $addbook->bindParam("authName",$_POST['AuthName']);
        $addbook->bindParam("authDescription",$_POST['AuthDescription']);
        $addbook->bindParam("authCover",$_POST['AuthCover']);
        $addbook->bindParam("view",$_POST['view']);
        if($addbook->execute()){
            echo '<div class="alert alert-success container mt-2">لقد تمت إضافة الكتاب بنجاح !</div>';
        }
    }
    
}else{
    header("location: https://khiallibrary.com/");
    session_destroy();
}

?>
</body>
</html>