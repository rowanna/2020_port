<?php
    include '../connect/connect.php';
    include '../connect/session.php';


    $userEmail = $_POST['userEmail']; //데이터 가져오기
    $userName = $_POST['userName'];
    $userNickName = $_POST['userNickName'];
    $userPw = $_POST['userPw'];
    $birthYear = (int) $_POST['birthYear'];
    $birthMonth = (int) $_POST['birthMonth'];
    $birthDay = (int) $_POST['birthDay'];

    function goSignUpPage($alert){
        echo "<div class='signInfo'><p>{$alert}</p><a href='signUp.php'>회원가입 페이지로 이동하기</a></div>";
        return; //(종료, 실행또는 출력)
    }

    //이메일 검사해 주는 메서드
    if(!filter_Var($userEmail, FILTER_VALIDATE_EMAIL)){
        goSignUpPage("죄송합니다. <br>올바른 이메일이 아닙니다.");
        exit;
    }

    //이름이 한글로 구성되어있는지 정규식 검사
    $userNameRegPattern = '/^[가-힣]{1,}$/';
    if (!preg_match($userNameRegPattern, $userName, $matches)) { //! 부정의 의미, preg_match검사해주는 메서드
        goSignUpPage('닉네임은 한글로만 입력해 주세요.');
        exit;  //return의 의미
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
    //암호 암호화 됨. 프로토콜이 http이면 에러가 떠서 주석처리.
    //구글에서 https가 아니면 경고창이 뜬다. 

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

    $sql = "SELECT youEmail FROM member WHERE youEmail = '{$userEmail}'";
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

    $sql = "SELECT youName FROM member WHERE youName = '{$userNickName}'";
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
        $sql = "INSERT INTO member(youEmail, youName, youNickName, youPw, birthday, regTime)";
        $sql .= "VALUES('{$userEmail}','{$userName}','{$userNickName}','{$userPw}','{$birth}', {$regTime})";
        $result = $dbConnect->query($sql);

        if ($result) {
            $_SESSION['memberID'] = $dbConnect->insert_id;
            $_SESSION['youName'] = $userName;
            $_SESSION['youNickName'] = $userNickName;
            Header("Location: http://rowanna.dothome.co.kr/php/main/index.html");
        } else {
            echo '에러발생 : 관리자에게 문의하세요!';
            exit;
        }
    } else {
        goSignUpPage('이메일 또는 닉네임이 존재합니다.');
        exit;
    }




?>