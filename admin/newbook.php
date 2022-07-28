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
<form method="POST" class="container">
 <select class="form-control mt-1" name="section" id="sec">
    <option value="unsection">اختر القسم</option>
    <option value="all_books">الكل</option>
    <option value="children_literature">أدب الطفل</option>
    <option value="motanawiaa">متنوعة</option>
    <option value="hg">تاريخ والجغرافيا</option>
    <option value="tanmiyabachariya">تنمية بشرية</option>
    <option value="riwayat_adab">ثقافة و روايات وادب عربي وعالمي</option>
    <option value="dine">دين</option>
    <option value="chaiar">شعر</option>
    <option value="Teb">طب</option>
    <option value="mawsoaa">موسوعة ومعاجم وقماويس ومجلات</option>
    <option value="fikr_falssafa_maaref">فكر وفلسفة ومعارف</option>
    <option value="ssiyassa_kanoun">قانون وسياسة</option>
    <option value="translated_books">كتب مترجمة</option>
    <option value="machroua_kalima">مشروع كلمة</option>
    <option value="maktabat_ar">مكتبة المجمع العربي للنشر والتوزيع</option>
 </select>
 <label>العنوان</label>
 <input class="form-control" type="text" name="title"  required/>
 <label>رابط الإقتباس</label>
 <input class="form-control" type="text" name="view"  required/>
 <label>رابط الصورة</label>
 <input class="form-control" type="text" name="cover"  required/>
 <label>رابط التحميل</label>
 <input class="form-control" type="text" name="download"  required/>
 <label>أيدي الكتاب</label>
 <input class="form-control" type="text" name="idbook"  required/>
 <button class="btn btn-outline-info mt-2 w-100" name="add" type="submit">إضافة الكتاب بقسمه</button>
</form>

<?php
require_once 'connect.php';
session_start();
if (isset($_SESSION['name'] , $_SESSION['password']) && !empty($_SESSION['name']) && !empty($_SESSION['password'])) {
    if (isset($_POST['add'])) {
        $section = $_POST['section'];
        $addbook = $db->prepare("INSERT INTO $section(path,title,view,cover,download,idbook) VALUES(:path,:title,:view,:cover,:download,:idbook)");
        $addbook->bindParam("path",$_POST['section']);
        $addbook->bindParam("title",$_POST['title']);
        $addbook->bindParam("view",$_POST['view']);
        $addbook->bindParam("cover",$_POST['cover']);
        $addbook->bindParam("download",$_POST['download']);
        $addbook->bindParam("idbook",$_POST['idbook']);
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