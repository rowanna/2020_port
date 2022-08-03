<header id="header">
    <div class="port"><a href="port.html">port</a></div>
    <div class="logo"><a href="../main/index.html">webstroyboy</a></div>
    <nav class="nav">
        <ul>
            <?php if(!isset($_SESSION['memberID'])){ ?>
                <li><a href="../sign/signUp.php">회원가입</a></li>
                <li><a href="../sign/logIn.php">로그인</a></li>    
            <?php } else { ?>
                <li><a href="#"><?=$_SESSION['youNickName']?>님 환영합니다.</a></li>
                
                <li><a href="../sign/logOut.php">로그아웃</a></li>      
            <?php } ?>
            <li><a href="../board/listBoard.php">게시판</a></li>
        </ul>
        <ul>
            <li><a href="about.html">About</a></li>
            <li><a href="reference.html">Reference</a></li>
            <li><a href="youtube.html">Youtube</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
</header>
