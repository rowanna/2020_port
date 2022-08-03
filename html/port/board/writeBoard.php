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
                    <div class="writeBoard">
                        <form action="./saveBoard.php" name="boardWrite" method="post">
                            <fieldset>
                                <div>
                                    <label for="title">제목</label>
                                    <input type="text" name="title" class="form-control" id="title" required autofocus>
                                </div>
                                <div>
                                    <label for="content">내용</label>
                                    <textarea class="form-control" name="content" id="content" rows="13" required></textarea>
                                </div>
                                <div class="form-btn">
                                    <input type="submit" value="저장하기" class="btn btn-primary">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- //boardCont -->
    </main>
</body>

</html>
