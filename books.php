<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <style>*{font-family: 'Tajawal' , sans-serif; list-style-type: none;}</style>
    <?php 
    if (isset($_GET['section'])) {
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
    echo '<title>مكتبة خيال - '.$titlecompleter.'</title>
';
}
?>
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
<div style="flex-wrap: wrap;" class="d-flex flex-lg-wrap justify-content-center text-center container">
<?php
require_once 'admin/connect.php';
if (isset($_GET['section'])) {
    // $section = $_GET['section'];
    if ($_GET['section'] == "تاريخ_جغرافيا") {
        $section = "hg";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM hg");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "تاريخ_جغرافيا") {
            $getdata = $db->prepare("SELECT * FROM hg LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }

    }else if ($_GET['section'] == "قانون_سياسة") {
        $section = "ssiyassa_kanoun";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM ssiyassa_kanoun");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "قانون_سياسة") {
            $getdata = $db->prepare("SELECT * FROM ssiyassa_kanoun LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "ثقافة_روايات_ادب_عربي_عالمي") {
        $section = "riwayat_adab";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM riwayat_adab");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "ثقافة_روايات_ادب_عربي_عالمي") {
            $getdata = $db->prepare("SELECT * FROM riwayat_adab LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "مشروع_كلمة") {
        $section = "machroua_kalima";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM machroua_kalima");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "مشروع_كلمة") {
            $getdata = $db->prepare("SELECT * FROM machroua_kalima LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "شعر") {
        $section = "chaiar";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM chaiar");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "شعر") {
            $getdata = $db->prepare("SELECT * FROM chaiar LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "ادب_الطفل") {
        $section = "children_literature";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM children_literature");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "ادب_الطفل") {
            $getdata = $db->prepare("SELECT * FROM children_literature LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "متنوعة") {
        $section = "motanawiaa";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM motanawiaa");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "متنوعة") {
            $getdata = $db->prepare("SELECT * FROM motanawiaa LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "طب") {
        $section = 'Teb';
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM Teb");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "طب") {
            $getdata = $db->prepare("SELECT * FROM Teb LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "تنمية_بشرية") {
        $section = "tanmiyabachariya";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM tanmiyabachariya");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "تنمية_بشرية") {
            $getdata = $db->prepare("SELECT * FROM tanmiyabachariya LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4" style="width: 90%;">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "الفقه_الدين") {
        $section = "dine";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM dine");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "الفقه_الدين") {
            $getdata = $db->prepare("SELECT * FROM dine LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "كتب_مترجمه") {
        $section = "translated_books";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM translated_books");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 50;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "كتب_مترجمه") {
            $getdata = $db->prepare("SELECT * FROM translated_books LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "فكر_فلسفة_معارف") {
        $section = "fikr_falssafa_maaref";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM fikr_falssafa_maaref");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 75;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "فكر_فلسفة_معارف") {
            $getdata = $db->prepare("SELECT * FROM fikr_falssafa_maaref LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "موسوعات_معاجم_قواميس_مجلات") {
        $section = "mawsoaa";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM mawsoaa");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 75;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "موسوعات_معاجم_قواميس_مجلات") {
            $getdata = $db->prepare("SELECT * FROM mawsoaa LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }else if ($_GET['section'] == "الكل") {
        $section = "all_books";
        $titlecompleter = $_GET['section'];
        $titlecompleter = str_replace("_"," و",$titlecompleter);
        $numberOfResult = $db->prepare("SELECT * FROM all_books");
        $numberOfResult->execute();
        $numberOfResult = $numberOfResult->rowCount();

        $resultPerPage = 250;

        if(!isset($_GET['p'])){
            $p = 1;
        }else{
        $p = $_GET["p"];
        }

        if ($_GET['section'] == "الكل") {
            $getdata = $db->prepare("SELECT * FROM all_books LIMIT " . $resultPerPage . " OFFSET " . $p*$resultPerPage);
            $getdata->execute();

        foreach ($getdata as $data) {
            $id = $data['ID'];
            $title = $data['title'];
            $title = str_replace("_"," ",$title); $title = str_replace("pdf","",$title);
            $title = str_replace("rar","",$title);
            $title = str_replace("zip","",$title);
            $cover = $data['cover'];
            $view = $data['view'];
            $download = $data['download'];
            $idbook = $data['idbook'];
            echo '<div class="p-3" style="width: 22rem; border: 4px solid #eee; margin: 8px;">
            <figure>
                <img src="'.$cover.'" style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img"  alt="Not Found" onerror="this.src=&quot;images/ccc.png&quot;">
            </figure>
            <div class="card-body">
                <h5 class="card-title mb-4">'.$title.'</h5>
            <a class="btn btn-info" href="book.php?sec='.$section.'&name='.$title.'&id='.$id.'">إقرأ الكتاب</a>
            </div>
        </div>';
        }
        
        $totalPages = ceil($numberOfResult/$resultPerPage);
        
        }
    }
}
    
?>
    </div>
    <div class="d-flex justify-content-center flex-lg-wrap" style="flex-wrap: wrap;">
        <?php
        if (isset($_GET['section'])) {
            if ($_GET['section'] == "تاريخ_جغرافيا") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=تاريخ_جغرافيا&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "قانون_سياسة") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=قانون_سياسة&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "ثقافة_روايات_ادب_عربي_عالمي") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=ثقافة_روايات_ادب_عربي_عالمي&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "قانون_سياسة") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=قانون_سياسة&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "مشروع_كلمة") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=مشروع_كلمة&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "شعر") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=قانون_سياسة&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "طب") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=طب&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "ادب_الطفل") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=ادب_الطفل&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "متنوعة") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=متنوعة&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "تنمية_بشرية") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=تنمية_بشرية&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "الفقه_الدين") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=الفقه_الدين&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "كتب_مترجمه") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=كتب_مترجمه&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "فكر_فلسفة_معارف") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=فكر_فلسفة_معارف&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "موسوعات_معاجم_قواميس_مجلات") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=موسوعات_معاجم_قواميس_مجلات&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }else if ($_GET['section'] == "الكل") {
                for ($i=1; $i < $totalPages; $i++) { 
                    echo '<li class="page-item">
                        <a class="page-link text-light border-0 bg-info m-2 p-2" href="books.php?section=الكل&p='.$i.'">'.$i.'</a>
                        </li>';
                }
            }
        }else {header('location: https://khiallibrary/sections.php');}
        ?>
    </div>
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
    <!-- <script
      src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js"
      integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK"
      crossorigin="anonymous"
    ></script> -->
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