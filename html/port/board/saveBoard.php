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


    <?php
        include '../dom/header.php';
    ?>
    <!-- //header -->
    
    <main>
        <!-- mainCont -->
        <section id="signUp">
        <?php
            include '../connect/session.php';
            include '../connect/connect.php';
            include '../connect/checkSession.php';

            $title = $_POST['title'];
            $content = $_POST['content'];
            if($title != null && $title != ''){
                $title = $dbConnect->real_escape_string($title);
            } else {
                echo "<div class='signInfo'><p>제목을 입력하세요~</p><a href='./writeBoard.php'>작성 페이지로 이동하기</a></div>";
                exit;
            }

            if($content != null && $content != ''){
                $content = $dbConnect->real_escape_string($content);
            } else {
                echo "<div class='signInfo'><p>내용을 입력하세요~</p><a href='./writeBoard.php'>작성 페이지로 이동하기</a></div>";
                exit;
            }

            $memberID = $_SESSION['memberID'];
            $regTime = time();

            $sql = "INSERT INTO board2 (memberID, title, content, regTime) ";
            $sql .= "VALUES ('{$memberID}', '{$title}', '{$content}', {$regTime})";
            $result = $dbConnect->query($sql);

            if($result){
                echo "<div class='signInfo'><p>저장 완료</p><a href='./listBoard.php'>게시판 목록으로 이동하기</a></div>";
                exit;
            } else {
                echo "<div class='signInfo'><p>저장 실패 - 관리자에게 문의하세요</p><a href='./listBoard.php'>게시판 목록으로 이동하기</a></div>";
                exit;
            }
        ?>
        </section>
        <!-- //mainCont -->
    </main>
</body>
</html>
