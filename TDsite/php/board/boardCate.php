<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: boardCate.php");
    }
    
    $boardSql = "SELECT * FROM FBoard WHERE fDelete = 1 ORDER BY blogId DESC";
    $FboardInfo = $connect -> query($boardSql);
    
    // 현재 시간과의 차이 계산
    $currentTimestamp = time(); // 현재 시간의 타임스탬프
    
    // 총 페이지 갯수
    $sql = "SELECT count(blogId) FROM FBoard WHERE fDelete = 1";
    $result = $connect -> query($sql);
    
    $FboardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $FboardTotalCount = $FboardTotalCount['count(blogId)'];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Device</title>
    
    <!-- css -->
    <?php include "../include/head.php"?>
</head>
<body>
    <div id="wrap">
        <?php include "../include/header.php" ?>
        <!-- //header -->
        
        <?php include "../include/nav.php" ?>
        <!-- //nav -->
        
        <main id="main">
            <div class="board__inner container">
                <div class="board__top">
                    <h2><?=$category?></h2>
                    <a href="boardWrite.php?category=<?=$category?>" class="bw__btn__style">글쓰기</a>
                </div>
                <div class="board__search">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                            <input type="hidden" name="category" value="<?=$category?>">
                        </fieldset>
                        <div class="search__bar">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z " fill="#59595A"/></svg>
                            </button>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색" required>
                        </div>
                    </form>    
                </div>
                <div class="board__filter">

                </div>
                <div class="board__pages">
                    <ul>
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;
    
    // 총 페이지 갯수
    $boardTotalCount = ceil($FboardTotalCount/$viewNum);
    
    // 이전 페이지 링크
    if($page > 1){
        echo "<li class='prev'><a href='boardCate.php?page=".($page-1)."&category=".($category)."'>이전</a></li>";
    }
    
    // 다음 페이지 링크
    if($page < $boardTotalCount){
        echo "<li class='next'><a href='boardCate.php?page=".($page+1)."&category=".($category)."'>다음</a></li>";
    }
?>
                    </ul>
                </div>
                <div class="board__table">
                    <table>
                        <!-- <colgroup>
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col>
                        </colgroup> -->
                        <thead class="blind">
                            <tr>
                                <th>프로필 이미지</th>
                                <th>게시글 제목</th>
                                <th>등록일</th>
                                <th>공감</th>
                                <th>조회수</th>
                                <th>작성자</th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
    $sql = "SELECT * FROM FBoard WHERE fDelete = 1 AND fCategory = '$category' ORDER BY blogId DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    
    if($sql){
        $count = $result -> num_rows;
        
        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                $memberID = $info['memberID'];
                
                // 프로필 이미지 가져오기
                $imgSql = "SELECT youImgFile FROM tdMembers WHERE memberID = '$memberID'";
                $imgResult = $connect->query($imgSql);
                $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);
                
                echo "<tr>";
                echo "<td rowspan='2' style='width: 5%'>";
                if (!empty($imgInfo['youImgFile'])) {
                    echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
                } else {
                    echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
                }
                echo "</td>";
                echo    "<td colspan='5' class='fL'><a href='boardView.php?blogId={$info['blogId']}&nTitle={$info['fTitle']}&category={$category}'>{$info['fTitle']}</a></td>";
                echo "</tr>";
                echo "<tr class='fG'>";
                echo    "<td>";
                            $timeDifference = $currentTimestamp - $info['fRegTime'];
                            
                            if ($timeDifference < 60) {
                                $timeAgo = $timeDifference." 초 전";
                            } elseif ($timeDifference < 3600) {
                                $minutes = floor($timeDifference / 60);
                                $timeAgo = $minutes." 분 전";
                            } elseif ($timeDifference < 86400) {
                                $hours = floor($timeDifference / 3600);
                                $timeAgo = $hours." 시간 전";
                            } else {
                                $days = floor($timeDifference / 86400);
                                $timeAgo = $days." 일 전";
                            }
                            
                            echo $timeAgo;
                echo    "</td>";
                echo    "<td>공감 <em>" . $info['fLike'] . "</em></td>";
                echo    "<td>조회수 <em>" . $info['fView'] . "</em></td>";
                echo    "<td>작성자 <em>" . $info['fAuthor'] . "</em></td>";
                echo    "<td style='width: 50%'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    } else {
        echo "관리자에게 문의하세요.";
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>
<?php
    // 이전 페이지 링크
    if($page > 1){
        echo "<li class='prev'><a href='boardCate.php?page=".($page-1)."&category=".($category)."'>이전</a></li>";
    }
    
    // 다음 페이지 링크
    if($page < $boardTotalCount){
        echo "<li class='next'><a href='boardCate.php?page=".($page+1)."&category=".($category)."'>다음</a></li>";
    }
?>
                    </ul>
                </div>
                <div class="leader__board">
                    <div class="lb__top">
                        <h2>상위 참여자</h2>
                        <div class="cate">
                            <a class="active">게시글</a>
                            <a>댓글</a>
                        </div>
                    </div>
                    <div class="lb__left">
                        <div class="lb__title">
                            <span>회원</span>
                            <span>카운트</span>
                        </div>
                        <ul>
<?php 
    $rankSql = "SELECT memberID, COUNT(blogId) AS boardCount FROM FBoard WHERE fDelete = 1 GROUP BY memberID ORDER BY boardCount DESC LIMIT 5";
    $rankResult = $connect -> query($rankSql);

    if($rankResult){
        $rank = 1;

        while($row = $rankResult->fetch_assoc()){
            $memberID = $row['memberID'];
            $boardCount = $row['boardCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

            echo "<li>";
            echo "<div class='lb__user'>";
            echo "<div class='lb__avata'>";
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
            }
            echo "</div>";
            echo "<div class='lb__author'>";
            echo "<div class='lb__name'>{$rank}. {$imgInfo['youName']}</div>";
            echo "<span class='lb__grade'>관리자</span>";
            echo "</div>";
            echo "<div class='lb__count'><span><p>";
            echo "$boardCount";
            echo "</span></p></div>";
            echo "</div>";
            echo "</li>";

            $rank++;
        }
    }
?>
                        </ul>
                        <ul class="cont2">
<?php 
    $rankSql2 = "SELECT memberId, COUNT(commentId) AS commentCount FROM boardComment WHERE commentDelete = 1 GROUP BY memberId ORDER BY commentCount DESC LIMIT 5";
    $rankResult2 = $connect -> query($rankSql2);

    if($rankResult2){
        $rank = 1;

        while($row = $rankResult2->fetch_assoc()){
            $memberID = $row['memberId'];
            $commentCount = $row['commentCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

            echo "<li>";
            echo "<div class='lb__user'>";
            echo "<div class='lb__avata'>";
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
            }
            echo "</div>";
            echo "<div class='lb__author'>";
            echo "<div class='lb__name'>{$rank}. {$imgInfo['youName']}</div>";
            echo "<span class='lb__grade'>관리자</span>";
            echo "</div>";
            echo "<div class='lb__count'><span><p>";
            echo "$commentCount";
            echo "</span></p></div>";
            echo "</div>";
            echo "</li>";

            $rank++;
        }
    }
?>
                        </ul>
                    </div>
                    <div class="lb__right">
                        <div class="lb__title">
                            <span>회원</span>
                            <span>카운트</span>
                        </div>
                        <ul>
<?php 
    $rankSql = "SELECT memberID, COUNT(blogId) AS boardCount FROM FBoard WHERE fDelete = 1 GROUP BY memberID ORDER BY boardCount DESC LIMIT 5, 5";
    $rankResult = $connect -> query($rankSql);

    if($rankResult){
        $rank = 6;

        while($row = $rankResult->fetch_assoc()){
            $memberID = $row['memberID'];
            $boardCount = $row['boardCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

            echo "<li>";
            echo "<div class='lb__user'>";
            echo "<div class='lb__avata'>";
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
            }
            echo "</div>";
            echo "<div class='lb__author'>";
            echo "<div class='lb__name'>{$rank}. {$imgInfo['youName']}</div>";
            echo "<span class='lb__grade'>관리자</span>";
            echo "</div>";
            echo "<div class='lb__count'><span><p>";
            echo "$boardCount";
            echo "</span></p></div>";
            echo "</div>";
            echo "</li>";

            $rank++;
        }
    }
?>
                        </ul>
                        <ul>
                        <?php 
    $rankSql2 = "SELECT memberId, COUNT(commentId) AS commentCount FROM boardComment WHERE commentDelete = 1 GROUP BY memberId ORDER BY commentCount DESC LIMIT 5, 5";
    $rankResult2 = $connect -> query($rankSql2);

    if($rankResult2){
        $rank = 1;

        while($row = $rankResult2->fetch_assoc()){
            $memberID = $row['memberId'];
            $commentCount = $row['commentCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

            echo "<li>";
            echo "<div class='lb__user'>";
            echo "<div class='lb__avata'>";
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
            }
            echo "</div>";
            echo "<div class='lb__author'>";
            echo "<div class='lb__name'>{$rank}. {$imgInfo['youName']}</div>";
            echo "<span class='lb__grade'>관리자</span>";
            echo "</div>";
            echo "<div class='lb__count'><span><p>";
            echo "$commentCount";
            echo "</span></p></div>";
            echo "</div>";
            echo "</li>";

            $rank++;
        }
    }
?>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <!-- //main -->
        
        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->
    
    <!-- script -->
    <script src="../assets/script/script.js"></script>
    <script>
        const tabBtn = document.querySelectorAll(".lb__top > .cate > a");
        const tabCont = document.querySelectorAll(".lb__left > ul");
        const tabContR = document.querySelectorAll(".lb__right > ul");

        tabCont.forEach(el => el.style.display = "none");
        tabCont[0].style.display = "block";
        tabContR.forEach(el => el.style.display = "none");
        tabContR[0].style.display = "block";

        tabBtn.forEach((tab, index) => {
            tab.addEventListener("click", () => {
                tabBtn.forEach(tab => tab.classList.remove("active"));
                tab.classList.add("active");

                tabCont.forEach(cont => cont.style.display = "none");
                tabCont[index].style.display = "block";
                tabContR.forEach(cont => cont.style.display = "none");
                tabContR[index].style.display = "block";
            })
        })
    </script>
</body>
</html>