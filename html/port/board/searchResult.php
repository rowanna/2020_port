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

								    $sql = "SELECT b.boardID, b.title, m.youNickName, b.regTime FROM board2 b JOIN member2 m ON (b.memberID = m.memberID) ";

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
            </div>
        </section>
        <!-- //boardCont -->
    </main>


</body>

</html>
