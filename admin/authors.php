<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الكتاب - تعديل حذف إضافة</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styleme.css" />
    <style>*{font-family: 'Tajawal' , sans-serif;} </style>
</head>
<body>
<div class="container d-flex justify-content-center flex-lg-wrap">
    <a class=" w-50 m-1 mt-2 mb-2 btn btn-dark" href="newauth.php">إضافة</a>
    <a class=" w-25 mt-2 mb-2 btn btn-light" href="#" style="background-color: #ebedef;">البحث</a>
</div>
<h1 class="mt-2 h3 text-center border-bottom pb-3">الكتاب</h1>
<div class="container d-flex justify-content-center flex-lg-wrap">
    <?php
       session_start();
       if (isset($_SESSION['name'] , $_SESSION['password']) && !empty($_SESSION['name']) && !empty($_SESSION['password'])) {
           require_once 'connect.php';
       
           $getauth = $db->prepare("SELECT * FROM authors");
           if($getauth->execute()){
               foreach($getauth as $auth){
                   $id = $auth['ID'];
                   $view = $auth['view'];
                   $AuthName = $auth['AuthName'];
                   $AuthDescription = $auth['AuthDescription'];
                   $AuthCover = $auth['AuthCover'];
       
                   echo '
                   <form method="POST" class="card bg-light m-1" style="width: 16.5rem;">
                   <a class="btn btn-warning" style="margin: 0.25rem 0.25rem 0 0.25rem;" href="edit.php?authID='.$id.'"><span class="badge mb-1 text-bg-primary">تعديل</span></a>
                   <button name="delete" class="btn btn-info m-1" value="'.$id.'"><span class="badge text-bg-danger">حذف</span></button>
                       <img src="'.$AuthCover.'" class="card-img-top" />
                       <div class="card-body">
                       <p class="bg-light card-text">'.$AuthName.'</p>
                       </div>
                   </form>
                   ';
               }
       
               if (isset($_POST['delete'])) {
                   $idD = $_POST['delete'];
                   $delete = $db->prepare("DELETE FROM authors WHERE ID = :id");
                   $delete->bindParam("id",$idD);
                   if ($delete->execute()) {
                       header("location: authors.php");
                   }
               }
           }
       }else{
           session_destroy();
           header("location: https://khiallibrary.com/");
       }
    ?>
</div>
</body>
</html>