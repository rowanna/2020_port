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
								<col style="width: 10%;">
								<col style="width: 65%;">
								<col style="width: 10%;">
								<col style="width: 15%;">
							</colgroup>
                            <thead>
                                <tr>
                                    <th scope="col">번호</th>
                                    <th scope="col">제목</th>
                                    <th scope="col">등록자</th>
                                    <th scope="col">등록일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								    if(isset($_GET['page'])){
										$page = (int) $_GET['page'];
									} else {
										$page = 1;
									}

									$numView = 20;
									$firstLimitValue = ($numView * $page) - $numView;

									//서치
								    $searchKeyword = $dbConnect->real_escape_string($_POST['searchKeyword']);
								    $searchOption = $dbConnect->real_escape_string($_POST['option']);

								    if($searchKeyword == '' || $searchKeyword == null){
								    	echo "검색어가 없습니다.";
								    	exit;
								    }

								    switch ($searchOption) {
								    	case 'title':
								    	case 'content':
								    	case 'tandc':
								    	case 'torc':
								    		break;
								    	default:
								    		echo "검색 옵션이 없습니다.";
								    		exit;
								    		break;
								    }

								    $sql = "SELECT b.boardID, b.title, m.youNickName, b.regTime FROM board b JOIN member m ON (b.memberID = m.memberID) ";

								    switch ($searchOption) {
								    	case 'title':
								    		$sql .= "WHERE b.title LIKE '%{$searchKeyword}%' ";
								    		break;
								    	case 'content':
								    		$sql .= "WHERE b.content LIKE '%{$searchKeyword}%' ";
								    		break;
								    	case 'tandc':
								    		$sql .= "WHERE b.title LIKE '%{$searchKeyword}%' AND b.content LIKE '%{$searchKeyword}%' ";
								    		break;
								    	case 'torc':
								    		$sql .= "WHERE b.title LIKE '%{$searchKeyword}%' OR b.content LIKE '%{$searchKeyword}%' ";
								    		break;
								    }

								    $sql .= "LIMIT {$firstLimitValue}, {$numView}";
								    //echo $sql;

								    $result = $dbConnect->query($sql);
								    
								    if($result){
								    	$dataCount = $result -> num_rows;

								    	if($dataCount > 0){
									    	for($i=0; $i < $dataCount; $i++){
									    		$memberInfo = $result->fetch_array(MYSQLI_ASSOC);
									    		echo "<tr>";
												echo "<td scope='row'>".$memberInfo['boardID']."</td>";
												echo "<td><a href='viewBoard.php?boardID={$memberInfo['boardID']}'>".$memberInfo['title']."</a></td>";
												echo "<td>".$memberInfo['youNickName']."</td>";
												echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
												echo "</tr>";
									    	}
									    } else {
											//게시글이 없을 경우
											echo "<tr><td colspan='4'>{$searchKeyword}를 포함하는 게시글이 없습니다.</td></tr>";
										}
								    } else {
								    	echo "오류 발생 - 관리자에게 문의하세요";
								    	exit;
								    }

                                ?>
                            </tbody>
                        </table>
                        <?php
							include 'pagination.php';
						?>
                    </div>
                
                </div>
            </div>
            <!-- //container -->
        </section>
        <!-- //boardCont -->
    </main>
    

</body>
</html>