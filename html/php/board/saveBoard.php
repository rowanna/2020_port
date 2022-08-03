<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="webstoryboy">
    <meta name="description" content="웹스토리보이 포트폴리오 사이트입니다.">
    <meta name="keywords" content="웹표준, 웹접근성, 사이트만들기, 포트폴리오, 웹스토리보이">
    <title>Webstoryboy Portfolio</title>
    
    <!-- CSS Style -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <!-- webfonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
</head>
<body>
   
    <div id="skip">
        <a href="#cont_nav">콘텐츠 바로가기</a>
    </div>
    <!-- //skip -->
    
    <!-- header -->
    <?php
        include '../dom/header.php';
    ?>
    
    <main>
       <section id="signUpCont">
           <?php
                include '../connect/session.php';
                include '../connect/connect.php';
                include '../connect/checkSession.php';

                $title = $_POST['title'];
                $content = $_POST['content'];
                if($title != null && $title != ''){
                    $title = $dbConnect->real_escape_string($title);
                } else {
                    echo "<div class='signInfo'><p>제목을 입력하세요~</p><a href='writeBoard.php'>작성 페이지로 이동하기</a></div>";
                    exit;
                }

                if($content != null && $content != ''){
                    $content = $dbConnect->real_escape_string($content);
                } else {
                    echo "<div class='signInfo'><p>내용을 입력하세요~</p><a href='writeBoard.php'>작성 페이지로 이동하기</a></div>";
                    exit;
                }

                $memberID = $_SESSION['memberID'];
                $regTime = time();

                $sql = "INSERT INTO board (memberID, title, content, regTime) ";
                $sql .= "VALUES ('{$memberID}', '{$title}', '{$content}', {$regTime})";
                $result = $dbConnect->query($sql);

                if($result){
                    echo "<div class='signInfo'><p>저장 완료</p><a href='listBoard.php'>게시판 목록으로 이동하기</a></div>";
                    exit;
                } else {
                    echo "<div class='signInfo'><p>저장 실패 - 관리자에게 문의하세요</p><a href='listBoard.php'>게시판 목록으로 이동하기</a></div>";
                    exit;
                }

            ?>
       </section>
    </main>
    
</body>
</html>
   

   
   
   
   
   
