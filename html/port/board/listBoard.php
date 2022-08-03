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
                        <?php
                    include './searchBoard.php';
                    ?>
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

                                    // LIMIT 0, 20  //(20 * 1) - 20 -> ($numView * $page) - $numView
                                    // LIMIT 20, 20 //(20 * 2) - 20 -> ($numView * $page) - $numView
                                    // LIMIT 40, 20 //(20 * 3) - 20 -> ($numView * $page) - $numView
                                    $numView = 20;
                                    $firstLimitValue = ($numView * $page) - $numView;


                                    $sql = "SELECT b.boardID, b.title, m.youNickName, b.regTime FROM board2 b JOIN member2 m ON (b.memberID = m.memberID) ORDER BY boardID ";
                                    $sql .= "DESC LIMIT {$firstLimitValue}, {$numView}";
                                    $result = $dbConnect->query($sql);

                                    if($result){
                                        $dataCount = $result->num_rows;

                                        if($dataCount > 0){
                                            for($i=0; $i<$dataCount; $i++){
                                                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                                                echo "<tr>";
                                                echo "<td>".$memberInfo['boardID']."</td>";
                                                echo "<td><a href='viewBoard.php?boardID={$memberInfo['boardID']}'>".$memberInfo['title']."</a></td>";
                                                echo "<td>".$memberInfo['youNickName']."</td>";
                                                echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    } else {
                                        //게시글이 없을 경우
                                        echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
                                    }

                                ?>


                                    <!--<tr>
                                    <td>100</td>
                                    <td>포트폴리오 사이트는 어떻게 만드나요?</td>
                                    <td>웹스토리보이</td>
                                    <td>2020-10-20 15:07</td>
                                </tr>-->


                                </tbody>
                            </table>
                        </div>
                        <!--pagination-->
                        <?php
                    include './pagination.php';
                ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- //boardCont -->
    </main>
</body>

</html>
