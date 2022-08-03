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
   

    
    <main>
        <!-- mainCont -->
        <section id="signUp">
        <?php
            include '../connect/session.php';
            include '../connect/connect.php';

            $userEmail = $_POST['userEmail'];
            $userPw = $_POST['userPw'];

            function goSignInPage($alert){
                echo "<div class='signInfo'><p>{$alert}</p><a href='logIn.php'>로그인 페이지로 이동하기</a></div>";
                return;
            }

            //이메일 검사
            if(!filter_Var($userEmail, FILTER_VALIDATE_EMAIL)){
                goSignInPage('올바른 이메일이 아닙니다.');
                exit;
            }

            //비밀번호 검사
            if($userPw == null || $userPw == '') {
                goSignInPage('비밀번호를 입력해 주세요.');
                exit;
            }

            //$pw = sha1('php200'.$pw);

            $sql = "SELECT youEmail, youNickName, memberID FROM member2 ";
            $sql .= "WHERE youEmail = '{$userEmail}' AND youPw = '{$userPw}'";
            $result = $dbConnect->query($sql);

            if($result){
                if($result->num_rows == 0){
                    goSignInPage('로그인 정보가 일치하지 않습니다.');
                    exit;
                } else {
                    $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                    $_SESSION['memberID'] = $memberInfo['memberID'];
                    $_SESSION['youNickName'] = $memberInfo['youNickName'];
                    Header("Location: http://rowanna.dothome.co.kr/port/main/index4.html");
                }
            }
        ?>
        </section>
        <!-- //mainCont -->
    </main>
    

</body>
</html>
