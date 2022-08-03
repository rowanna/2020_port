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
        <!-- mainCont -->
        <section id="signUpCont">
            <div class="signTxet">
                <div class="signUp">
                    <h1><strong>webstoryboy</strong> 사이트에 오신걸 환영합니다.</h1>
                    <form name="signIn" method="post" action="logInSave.php">
                        <filedset>
                            <legend class="sr-only">회원 가입 영역</legend>
                            <div>
                                <label for="userEmail" class="sr-only">이메일</label> 
                                <input type="email" name="userEmail" id="userEmail" class="input-text" placeholder="이메일을 적어주세요." required autofocus>
                            </div>
                            <div>
                                <label for="userPw" class="sr-only">Password</label>
                                <input type="password" name="userPw" id="userPw" class="input-text" placeholder="패스워드" required>
                            </div>
                            <button class="signUpBtn" type="submit" value="로그인">로그인</button>
                            <p class="signDesc">회원가입을 원하면? <a href="signUp.html">회원가입</a></p>
                        </filedset>
                    </form>
                </div>
            </div>
        </section>
        <!— //mainCont —>
    </main>
    

</body>
</html>