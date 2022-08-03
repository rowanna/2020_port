<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="wonjina">
    <meta name="description" content="wonji's portfolio">
    <meta name="keywords" content="나원지, 포트폴리오, portfolio, rowanna">
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
            include '../connect/connect.php';
            
            $userEmail = $_POST['userEmail'];
            $userName = $_POST['userName'];
            $userNickName = $_POST['userNickName'];
            $userPw = $_POST['userPw'];
            $birthYear = (int) $_POST['birthYear'];
            $birthMonth = (int) $_POST['birthMonth'];
            $birthDay = (int) $_POST['birthDay'];

            function goSignUpPage($alert){
                echo "<div class='signInfo'><p>{$alert}</p><a href='signUp.php'>회원가입페이지로 이동하기</a></div>";
                return;
            }

            //이메일 검사
            if(!filter_Var($userEmail, FILTER_VALIDATE_EMAIL)){
                goSignUpPage('죄송합니다. <br>올바른 이메일이 아니네요.');
                exit;
            }

            //이름이 한글로 구성되어있는지 정규식 검사
            $userNameRegPattern = '/^[가-힣]{1,}$/';
            if (!preg_match($userNameRegPattern, $userName, $matches)) {
                goSignUpPage('닉네임은 한글로만 입력해 주세요.');
                exit;
            }

            //닉네임 검사
            if($userNickName == null || $userNickName == ''){
                goSignUpPage('활동에 필요한 이름을 입력해 주세요.');
                exit;
            }

            //비밀번호 검사
            if($userPw == null || $userPw == ''){
                goSignUpPage('비밀번호를 입력해 주세요.');
                exit;
            }

            //$userPw = sha1('php'.$userPw);

            //생년 검사
            if($birthYear == 0) {
                goSignUpPage('생년을 정확히 입력해 주세요.');
                exit;
            }

            //생월 검사
            if($birthMonth == 0) {
                goSignUpPage('생월을 정확히 입력해 주세요.');
                exit;
            }

            //생일 검사
            if($birthDay == 0) {
                goSignUpPage('생일을 정확히 입력해 주세요.');
                exit;
            }

            $birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;

            //이메일 중복 검사
            $isEmailCheck = false;

            $sql = "SELECT youEmail FROM member2 WHERE youEmail = '{$userEmail}'";
            $result = $dbConnect->query($sql);

            if( $result ) {
                $count = $result->num_rows;
                if($count == 0){
                    $isEmailCheck = true;
                } else {
                    goSignUpPage('이미 존재하는 이메일 입니다.');
                    exit;
                }
            } else {
                echo "에러발생 : 관리자 문의 요망";
                exit;
            }

            //닉네임 중복 검사
            $isNickNameCheck = false;

            $sql = "SELECT youName FROM member2 WHERE youName = '{$userNickName}'";
            $result = $dbConnect->query($sql);

            if( $result ) {
                $count = $result->num_rows;
                if($count == 0){
                    $isNickNameCheck = true;
                } else {
                    goSignUpPage('이미 존재하는 닉네임 입니다.');
                    exit;
                }
            } else {
                echo "에러발생 : 관리자에게 문의하세요!";
                exit;
            }

            //이상 없으면 데이터 입력
            if ($isEmailCheck == true && $isNickNameCheck == true) {
                $regTime = time();
                $sql = "INSERT INTO member2(youEmail, youName, youNickName, youPw, birthday, regTime)";
                $sql .= "VALUES('{$userEmail}','{$userName}','{$userNickName}','{$userPw}','{$birth}', {$regTime})";
                $result = $dbConnect->query($sql);

                if ($result) {
                    $_SESSION['memberID'] = $dbConnect->insert_id;
                    $_SESSION['youName'] = $userName;
                    $_SESSION['youNickName'] = $userNickName;
                    Header("Location: http://rowanna.dothome.co.kr/port/main/index3.html");
                } else {
                    echo '에러발생 : 관리자에게 문의하세요!';
                    exit;
                }
            } else {
                goSignUpPage('이메일 또는 닉네임이 존재합니다.');
                exit;
            }
        ?>

        </section>
        <!-- //signUp -->
    </main>
    

</body>
</html>
