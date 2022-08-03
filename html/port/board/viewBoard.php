<?php 
	include '../connect/connect.php';
    include '../connect/session.php';
    include '../connect/checkSession.php';
?>

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
        <!-- boardCont -->
        <section id="boardCont">
            <div class="row">
                <div class="container">
                    <h1 class="contTitle" aria-label="visitor board">
                        <span aria-hidden="true">VISITOR</span>
                        <span aria-hidden="true">BOARD</span>
                    </h1>
                    <div class="listBoard">

                        <div class="tableList">
                            <table class="table">
                                <colgroup>
                                    <col style="width: 20%;">
                                    <col style="width: 80%;">
                                </colgroup>
                                <tbody>

                                    <?php
								if(isset($_GET['boardID']) && (int) $_GET['boardID'] > 0){
							    	$boardID = $_GET['boardID'];
							    	$sql = "SELECT b.title, b.content, m.youNickName, b.regTime FROM board2 b JOIN member2 m ON (b.memberID = m.memberID) WHERE b.boardID = {$boardID}";
							    	$result = $dbConnect->query($sql);

							    	if($result){
							    		$contentInfo = $result->fetch_array(MYSQLI_ASSOC);
							    		echo "<tr><th>제목</th><td>{$contentInfo['title']}</td></tr>";
							    		echo "<tr><th>등록자</th><td>{$contentInfo['youNickName']}</td></tr>";
							    		$regDate = date("Y-m-d h:i");
							    		echo "<tr><th>등록일</th><td>{$regDate}</td></tr>";
							    		echo "<tr style='height:400px'><th>내용</th><td>{$contentInfo['content']}</td></tr>";
							    	}
							    }
							?>
                                </tbody>
                            </table>
                        </div>
                        <a href="listBoard.php" class="btn-list">목록보기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- //boardCont -->
    </main>


</body>

</html>
