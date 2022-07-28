<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>مكتبة خيال - الأقسام</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/styleme.css" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9483470310411729" crossorigin="anonymous"></script>
   <link rel="icon" type="image/x-icon" href="https://softr-prod.imgix.net/applications/96c4ff09-6593-407c-a5af-810a1fa0ca2f/assets/b9e0692f-6ae8-4fba-a2eb-6f09ef2bb618.png?rnd=1649807422200" />
    <link
      rel="stylesheet"
      href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
      integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe"
      crossorigin="anonymous"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css"
      rel="stylesheet"
    />
    <style>*{font-family: 'Tajawal' , sans-serif;}</style>
</head>
<body>
    <div id="anime" style="z-index: 1111; background-color: #fdfdfd;" class="anime position-fixed w-100 h-100 d-flex align-items-center justify-content-center">
        <img src="images/gif.gif" alt="gif" />
    </div>
<nav class="navbar navbar-white bg-white px-0 mb-4">
      <div class="container d-flex justify-content-between align-items-center">
        <i class="fa fa-bars"></i>
        <ul class="d-flex list-unstyled mr-auto mb-0">
          <li class="nav-item active p-3">
            <a class="nav-link" href="authors">
              الأعمال الكاملة</a>
          </li>
          <li class="nav-item dropdown p-3">
            <a
        class="nav-link" href="sections.php">الأقسام</a>
            <div
              id="dropdownMenu"
              class="dropdown-menu"
              aria-labelledby="dropdownId"
            ></div>
          </li>
          <li class="nav-item p-3">
            <a class="nav-link" href="we-are.html">من نحن</a>
          </li>
        </ul>

        <a class="navbar-brand" href="/"
          ><img
            style="max-height: 70px"
            src="images/3fa630cc-9e26-4cd1-b36c-beb6f6ee1f9e.jpg"
            alt=""
        /></a>
      </div>
    </nav>
<section class="section__style container">
  

    <h2><a class="text-decoration-none" href="books.php?section=الكل">الكل</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM all_books LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=تاريخ_جغرافيا">تاريخ وجغرافيا</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM hg LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=قانون_سياسة">قانون و سياسة</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM ssiyassa_kanoun LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=ثقافة_روايات_ادب_عربي_عالمي">ثقافة و روايات وادب عربي وعالمي</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM riwayat_adab LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=فكر_فلسفة_معارف">فكر وفلسفة ومعارف</a></h2>
    <div class="d-flex align-items-center justify-content-centr">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM fikr_falssafa_maaref LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=موسوعات_معاجم_قواميس_مجلات">موسوعة ومعاجم وقواميس ومجلات</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM mawsoaa LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=مشروع_كلمة">مشروع كلمة</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM machroua_kalima LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=شعر">شعر</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM chaiar LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=ادب_الطفل">ادب الطفل</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM children_literature LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=متنوعة">متنوعة</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM motanawiaa LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>

    <h2><a class="text-decoration-none" href="books.php?section=طب">طب</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM Teb LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>
    <h2><a class="text-decoration-none" href="books.php?section=تنمية_بشرية">تنمية بشرية</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM tanmiyabachariya LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>
    <h2><a class="text-decoration-none" href="books.php?section=الفقه_الدين">الفقه والدين</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM dine LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>
    <h2><a class="text-decoration-none" href="books.php?section=كتب_مترجمه">كتب مترجمه</a></h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="left: 0; width: 100%; height: auto; position: relative;">
        <?php
require_once 'admin/connect.php';
$getdata = $db->prepare('SELECT * FROM translated_books LIMIT 4');
$getdata->execute();
foreach($getdata as $data){
    $title = $data['title'];
    $cover = $data['cover'];
    $view = $data['view'];
    $download = $data['download'];
    $idbook = $data['idbook'];
    echo '
    <a target="_blank" class="m-3" href="'.$view.'">
    <img src="'.$cover.'" alt="'.$title.'" />
    </a>
    ';
}
?>
        </div>
    </div>
</section>

<footer>
      <div class="container">
        <a href="/">
          <img
            src="images/31b9dfa6-6b59-4bb2-a5f9-61ed2ac0b980.png"
            max-height="150px"
            alt=""
          />
        </a>
        <div class="mt-3 d-flex justify-content-between">
          <p>
 <a
              class="btn btn-sm btn-danger"
              href="mailto:khiallibrary.com@gmail.com"
              target="_blank"
              ><i class="fa fa-at"></i>
            </a>
            <a
              class="btn btn-sm btn-info"
              href="https://t.me/khial_library "
              target="_blank"
              ><i class="fab fa-telegram"></i>
            </a>
                        <a href="https://www.paypal.com/paypalme/ziadmohamedkhial" class="btn btn-sm" >
              <img src="images/paypal.webp" alt="paypal" width="25">
            </a>
                        <a href="https://www.youtube.com/channel/UCEwcICZxM-ZsqYjmAnBwXdg" class="btn btn-sm" >
              <img src="images/youtube.png" alt="youtube" width="25">
            </a>
            </a>
            <a href="https://chat.whatsapp.com/Hrx5dPklldU0PGDvqutZ7J" class="btn btn-sm" >
              <img src="images/whatsapp.png" alt="whatsapp" width="25">
            </a>
          </p>
          <p>© 2020 MyCompany. All rights reserved</p>
        </div>
      </div>
    </footer>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
<script src="js/bootstrap.min.js"></script>
<script>
        setInterval(()=> {
        var anime = document.getElementById('anime');
        anime.style.opacity = 0;
        anime.style.zIndex = -1;
        } , 8*1000)
    </script>
</body>
</html>