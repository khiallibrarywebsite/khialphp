<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحكم بالكتب - تعديل وحذف وإضافة </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styleme.css" />
    <style>*{font-family: 'Tajawal' , sans-serif;} </style>
</head>
<body class="bg-light">
    <div id="anime" class="anime bg-dark d-flex justify-content-center align-items-center position-fixed w-100 h-100" style="z-index: 1111;">
        <div class="spinner spinner-border text-light fw-bold h1" style="width:150px; height: 150px;"></div>
    </div>
    <form method="GET" class="row col-12 container w-100">
        <select class="form-control m-2 mb-1 col-8 p-0" name="section" id="sec">
            <option value="unsection">اختر القسم</option>
            <option value="all_books">الكل</option>
            <option value="children_literature">أدب الطفل</option>
            <option value="hg">تاريخ والجغرافيا</option>
            <option value="tanmiyabachariya">تنمية بشرية</option>
            <option value="riwayat_adab">ثقافة و روايات وادب عربي وعالمي</option>
            <option value="dine">دين</option>
            <option value="chaiar">شعر</option>
            <option value="motanawiaa">متنوعة</option>
            <option value="Teb">طب</option>
            <option value="mawsoaa">موسوعة ومعاجم وقماويس ومجلات</option>
            <option value="fikr_falssafa_maaref">فكر وفلسفة ومعارف</option>
            <option value="ssiyassa_kanoun">قانون وسياسة</option>
            <option value="translated_books">كتب مترجمة</option>
            <option value="machroua_kalima">مشروع كلمة</option>
            <option value="maktabat_ar">مكتبة المجمع العربي للنشر والتوزيع</option>
        </select>
        <button class="col-1 m-1 mt-2 mb-2 btn btn-dark" name="search" type="submit">جلب الكتب</button>
        <a class="col-1 m-1 mt-2 mb-2 btn btn-light" style="background-color: #ebedef;" href="newbook.php">إضافة</a>
        <a class="col-1 m-1 mt-2 mb-2 btn btn-light" style="background-color: #ebedef;">البحث</a>
    </form>


    <div id="parent" class="container d-flex justify-content-center" style="flex-wrap: wrap;">
    <?php
    session_start();
    require_once 'connect.php';
    
    if (isset($_SESSION['name'] , $_SESSION['password']) && !empty($_SESSION['name']) && !empty($_SESSION['password'])) {
        if (isset($_GET['search'])) {
            $section = $_GET['section'];
            if ($section == "unsection") {
                echo '<div class="alert alert-info">لا يوجد أي قسم بهذا الإسم</div>';
            }
    
            // Pagination Systeme---------
            $numberOfResult = $db->prepare("SELECT * FROM " . $section);
            $numberOfResult->execute();
            $numberOfResult = $numberOfResult->rowCount();
    
            $resultPerPage = 250;
    
            if(!isset($_GET['p'])){
                $p = 1;
            }else{
                $p = $_GET["p"];
            }
    
            $totalPages = ceil($numberOfResult/$resultPerPage);
    
            // Pagination Systeme---------
            $getdata = $db->prepare("SELECT * FROM " . $section . " LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();
            
            foreach ($getdata as $data) {
                $id = $data['ID'];
                $title = $data['title'];
                $cover = $data['cover'];
                $view = $data['view'];
                $download = $data['download'];
                $idbook = $data['idbook'];
                echo '
                <form method="POST" class="card bg-light m-1" style="width: 16.5rem;">
                <a class="btn btn-warning" style="margin: 0.25rem 0.25rem 0 0.25rem;" href="edit.php?bookid='.$id.'&sec='.$section.'"><span class="badge mb-1 text-bg-primary">تعديل</span></a>
                <button name="delete" class="btn btn-info m-1" value="'.$id.'"><span class="badge text-bg-danger">حذف</span></button>
                    <img src="'.$cover.'" class="card-img-top" />
                    <div class="card-body">
                    <p class="bg-light card-text">'.$title.'</p>
                    </div>
                </form>
                ';
            }
            if (isset($_POST['delete'])) {
                $idD = $_POST['delete'];
                $delete = $db->prepare("DELETE FROM $section WHERE ID = :id");
                $delete->bindParam("id",$idD);
                if ($delete->execute()) {
                    echo "<script>location.assign(books.php?section=".$section."&p=".$p."&search=true);</script>";
                }
            }
        }
        
    }else{
        header("location: https://khiallibrary.com/");
    }

    
    ?>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-center mt-2" style="flex-wrap: wrap;">
    <?php
    if (isset($_SESSION['name'] , $_SESSION['password']) && !empty($_SESSION['name']) && !empty($_SESSION['password'])) {
    if (isset($_GET['search'])) {
        for ($i=1; $i < $totalPages; $i++) { 
            echo '<li class="page-item">
                <a class="page-link" href="books.php?section='.$section.'&p='.$i.'&search=true">'.$i.'</a>
                </li>';
        }
    }
}else{
    session_destroy();
    header("location: https://khiallibrary.com/");
}
    ?>
        </ul>
    </nav>

    <script>
        setInterval(()=> {
        var anime = document.getElementById('anime');
        anime.style.opacity = 0;
        anime.style.zIndex = -1;
        } , 5000)
    </script>
</body>
</html>