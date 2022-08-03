<div class="tableBar">
    <form name="search" method="post" action="searchResult.php" class="form-bar">
        <filedset>
            <input class="form-search" type="search" placeholder="검색어를 입력하세요!" aria-label="Search" name="searchKeyword" required="">
            <select class="form-select" name="option" required="">
                <option value="title" selected="">제목</option>
                <option value="content">내용</option>
                <option value="tandc">제목과 내용</option>
                <option value="torc">제목 또는 내용</option>
            </select>
            <button type="submit" class="form-btn">검색</button>
            <a type="button" class="btn-write" href="writeBoard.php">글 쓰기</a>
        </filedset>
    </form>
</div>