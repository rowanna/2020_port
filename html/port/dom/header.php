<header id="header">
            <div class="header">
                <div class="menu-btn"><a href="https://rowanna.github.io/react-port/">React</a></div>
                <div class="head-tit"><a href="../main/index4.html">portfolio 2020</a></div>
                <nav class="nav">
                    <ul>
                        <?php if(!isset($_SESSION['memberID'])){ ?>
                        <li><a href="../sign/logIn.php">LOGIN</a></li>
                        <li><a href="../sign/signUp.php">SIGN UP</a></li>
                        <?php } else { ?>
                        <li><a href="#">WELCOME <?=$_SESSION['youNickName']?> !</a></li>
                        <li><a href="../sign/logOut.php">LOG OUT</a></li>
                        <?php } ?>
                        <li><a href="../board/listBoard.php">BOARD</a></li>
                        <li><a href="../main/index4.html#footer">CONTACT</a></li>
                    </ul>
                </nav>
                <!-- pc //.nav -->
                <div class="navShow">
                    <ul>
                        <?php if(!isset($_SESSION['memberID'])){ ?>
                        <li><a href="../sign/logIn.php">LOGIN</a></li>
                        <!-- <li><a href="../sign/signUp.php">SIGN UP</a></li> -->
                        <?php } else { ?>
                        <!-- <li><a href="#">WELCOME <?=$_SESSION['youNickName']?> !</a></li> -->
                        <li><a href="../sign/logOut.php">LOG OUT</a></li>
                        <?php } ?>
                        <li><a href="../board/listBoard.php">BOARD</a></li>
                        <li><a href="../main/index4.html#footer">CONTACT</a></li>
                    </ul>
                </div>
                <!-- tablet //.navShow -->
                <div class="ham">
                    <label for="menuicon">
                        <input type="checkbox" id="menuicon" />
                        <span class="menu">
                            <span class="hamburger"></span>
                        </span>
                        <ul>
                            <?php if(!isset($_SESSION['memberID'])){ ?>
                            <li><a href="../sign/logIn.php">LOGIN</a></li>
                            <li><a href="../sign/signUp.php">SIGN UP</a></li>
                            <?php } else { ?>
                            <li><a href="#">WELCOME <?=$_SESSION['youNickName']?> !</a></li>
                            <li><a href="../sign/logOut.php">LOG OUT</a></li>
                            <?php } ?>
                            <li><a href="../board/listBoard.php">BOARD</a></li>
                            <li><a href="../main/index4.html#footer">CONTACT</a></li>
                        </ul>
                    </label>
                </div>
                <!-- mobile //.ham -->
            </div>
    </header>
    <!-- //header -->



