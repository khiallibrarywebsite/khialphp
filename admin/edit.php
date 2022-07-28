<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل كتاب <?php ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styleme.css" />
    <style>
        *{font-family: 'Tajawal';}
    </style>
</head>
<body>
    <?php 
    $username = "root";
    $password = "";
    $db = new PDO("mysql:host=localhost;dbname=khiallibrary", $username, $password);

    session_start();

    if (isset($_SESSION['name'] , $_SESSION['password']) && !empty($_SESSION['name']) && !empty($_SESSION['password'])) {
        if (isset($_GET['bookid'] , $_GET['sec']) && !empty($_GET['bookid']) && !empty($_GET['sec'])) {
            $id = $_GET['bookid'];
            $section = $_GET['sec'];
            $getbook = $db->prepare("SELECT * FROM $section WHERE ID = " . $id);
            if ($getbook->execute()) {
                foreach ($getbook as $data) {
                    $title = $data['title'];
                    $cover = $data['cover'];
                    $view = $data['view'];
                    $download = $data['download'];
                    $idbook = $data['idbook'];
    
                    echo '
            <form method="POST" class="container">
            <label class="mt-2">العنوان</label>
            <input type="text" name="new_title" class="form-control" value="'.$title.'" />
            <label class="label">رابط الصورة</label>
            <input type="text" name="new_cover" class="form-control" value="'.$cover.'" />
            <label class="label">رابط الإقتباس</label>
            <input type="text" name="new_view" class="form-control" value="'.$view.'" />
            <label class="label">رابط التحميل الكتاب</label>
            <input type="text" name="new_download" class="form-control" value="'.$download.'" />
            <label class="label">ايدي الكتاب</label>
            <input type="text" name="new_idbook" class="form-control" value="'.$idbook.'" />
            <button class="btn btn-warning mt-1" name="save">حفظ</button>
            </form>
                    ';
                }
                if (isset($_POST['save'])) {
                    $new_title = $_POST['new_title'];
                    $new_view = $_POST['new_view'];
                    $new_cover = $_POST['new_cover'];
                    $new_download = $_POST['new_download'];
                    $new_idbook = $_POST['new_idbook'];
                    $editdata = $db->prepare("UPDATE $section SET title = :title, view = :view, cover = :cover, download = :download, idbook = :idbook WHERE ID = :id");
                    $editdata->bindParam('id',$id);
                    // $editdata->bindParam('section',$section);
                    $editdata->bindParam('title',$new_title);
                    $editdata->bindParam('view',$new_view);
                    $editdata->bindParam('cover',$new_cover);
                    $editdata->bindParam('download',$new_download);
                    $editdata->bindParam('idbook',$new_idbook);
        
                    if ($editdata->execute()) {
                        echo '<div class="alert alert-success container mt-2">تمت عمليت الحفظ بنجاح !</div>';
                    }
                       
                }
            }
    }elseif(isset($_GET['authID']) && !empty($_GET['authID'])){
            $authID = $_GET['authID'];
            $authInfo = $db->prepare("SELECT * FROM authors WHERE ID = " . $authID);
            if ($authInfo->execute()) {
                foreach ($authInfo as $info) {
                    $ID = $info['ID'];
                    $name = $info['AuthName'];
                    $description = $info['AuthDescription'];
                    $cover = $info['AuthCover'];
                    $view = $info['view'];
    
                    echo '
                    <form method="POST" class="mt-2 container">
                    <label>الإسم</label>
                    <input class="form-control" type="text" value="'.$name.'" name="AuthName" required />
                    <label>الوصف</label>
                    <input class="form-control" type="text" value="'.$description.'" name="AuthDescription" required />
                    <label>الصوة</label>
                    <textarea class="form-control" type="text" name="AuthCover" required>'.$cover.'</textarea>
                    <label>المؤلفات</label>
                    <input class="form-control" type="text" value="'.$view.'" name="view" required />
                    <button name="saveAuth" class="btn w-100 mt-2 btn-outline-info">حفظ</button>
                    </form>
                    ';
                }
                if (isset($_POST['saveAuth'])) {
                    $saveAuth = $db->prepare("UPDATE authors SET AuthName=:newname,AuthDescription=:newdescription,AuthCover=:newcover,view=:newview WHERE ID = :id");
                    $saveAuth->bindParam("id",$ID);
                    $saveAuth->bindParam("newname",$_POST['AuthName']);
                    $saveAuth->bindParam("newdescription",$_POST['AuthDescription']);
                    $saveAuth->bindParam("newcover",$_POST['AuthCover']);
                    $saveAuth->bindParam("newview",$_POST['view']);
                    if ($saveAuth->execute()) echo '<div class="container mt-2 alert alert-success">لقد تم الحفظ بنجاح</div>';                
                }
            }
            
    }else{header('location: home.php');}
    }else{
        header("location: https://khiallibrary.com/");
    session_destroy();
    }

    
    ?>
</body>
</html>