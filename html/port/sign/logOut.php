<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="wonjina">
    <meta name="description" content="wonji's portfolio">
    <meta name="keywords" content="나원지, 포트폴리오, porfolio">
    <meta name="generator" content="brackets">
    <title>Porfolio</title>

    <!-- css -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <link rel="stylesheet" href="../assets/css/respon.css">

    <!-- webfonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
   
    <!--<div id="skip">
        <a href="#cont_nav">콘텐츠 바로가기</a>
    </div>-->
    <!-- //skip -->

    <?php
        include '../dom/header.php';
    ?>
    <!-- //header -->
    
    <main>
        <!-- signUp -->
        <section id="signUp">
        <?php
            include '../connect/session.php';
    
            unset($_SESSION['memberID']);
            unset($_SESSION['youNickName']);

            echo "<div class='signInfo'><p>로그아웃 되었습니다.</p><a href='../main/index4.html'>메인 페이지로 이동하기</a></div>";
            return;
            
            

        ?>
        </section>
        <!-- //signUp -->
    </main>
    

</body>
</html>
