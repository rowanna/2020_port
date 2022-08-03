<?php
    include '../connect/session.php';
    include '../connect/connect.php';
    include '../connect/checkSession.php';
?>

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
<body class="gray">
   
    <div id="skip">
        <a href="#mainCont">콘텐츠 바로가기</a>
    </div>
    <!-- //skip -->
    
    <!-- header -->
    <?php
        include '../dom/header.php';
    ?>
    <!-- //header -->
     
    <main>
        <!-- boardCont -->
        <section id="boardCont">
            <div class="container">
                <h1 class="contTitle" aria-label="CODING NOTICE">
                    <span aria-hidden="true">Code</span>
                    <span aria-hidden="true">NOTICE</span>
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
							    	$sql = "SELECT b.title, b.content, m.youNickName, b.regTime FROM board b JOIN member m ON (b.memberID = m.memberID) WHERE b.boardID = {$boardID}";
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
        </section>
        <!— //boardCont —>
    </main>
    

</body>
</html>