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
            <div class="signUpWrap">
                <div class="signUp">
                    <h1>Welcome to <strong>My Portfolio Site🙌</strong></h1>
                    <form name="signIn" method="post" action="logInSave.php">
                        <filedset>
                            <legend class="sr-only">로그인 영역</legend>
                            <div>
                                <label for="userEmail" class="sr-only">이메일</label> 
                                <input type="email" name="userEmail" id="userEmail" class="input-text" placeholder="EMAIL ADDRESS" required="" autofocus="">
                            </div>
                            <div>
                                <label for="userPw" class="sr-only">Password</label>
                                <input type="password" name="userPw" id="userPw" class="input-text" placeholder="PASSWORD" required="">
                            </div>
                            <button class="signUpBtn" type="submit" value="로그인">LOGIN</button>
                            <p class="signDesc">Not on My site yet? <a href="signUp.php">Sign Up</a>💁</p>
                        </filedset>
                    </form>
                </div>
            </div>
        </section>
        <!-- //signUp -->
    </main>

</body>
</html>