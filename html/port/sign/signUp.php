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
            <div class="container signUpWrap">
                <div class="signUp">
                    <h1>Be a<br>Special member<strong>On My Site </strong></h1>
                    <form name="signUp" method="post" action="signUpSave.php">
                        <fieldset>
                            <legend class="sr-only">회원 가입 폼입니다.</legend>
                            <div>
                                <label for="userEmail" class="sr-only">이메일</label>
                                <input type="email" name="userEmail" id="userEmail" class="input-text" placeholder="EMAIL ADDRESS" required autofocus>
                            </div>
                            <div>
                                <label for="userName" class="sr-only">이름</label>
                                <input type="text" name="userName" id="userName" class="input-text" placeholder="NAME" required>
                            </div>
                            <div>
                                <label for="userNickName" class="sr-only">닉네임</label>
                                <input type="text" name="userNickName" id="userNickName" class="input-text" placeholder="NICKNAME" required>
                            </div>
                            <div>
                                <label for="userPw" class="sr-only">패스워드</label>
                                <input type="password" name="userPw" id="userPw" class="input-text" placeholder="PASSWORD" required>
                            </div>
                            <div class="birth">
                                <div>
                                    <label for="birthYear">YEAR</label>
                                    <select id="birthYear" name="birthYear" required>
                                        <!--birthYear-->
                                        <?php
                                            $thisYear = date('Y', time());
                                            for($i = $thisYear; $i >= 1930; $i-- ){
                                                echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="birthMonth">MONTH</label>
                                    <select id="birthMonth" name="birthMonth" required>
                                        <!--birthMonth-->
                                        <?php
                                            for($i = 1; $i <= 12; $i++){
                                                echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="birthDay">DAY</label>
                                    <select id="birthDay" name="birthDay" required>
                                        <!--birthDay-->
                                        <?php
                                            for($i = 1; $i <= 31; $i++){
                                                echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button class="signUpBtn" type="submit" value="회원가입">SIGN UP</button>
                            <p class="signDesc">Already on My site? <a href="logIn.php">LogIn</a>🙋</p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
        <!-- //signUp -->
    </main>

</body>

</html>
