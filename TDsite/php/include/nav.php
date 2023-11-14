<nav id="nav">
    <div class="container">
        <ul>
            <li>
                스마트폰
                <ul class="submenu">
                    <li><a href="../phone/samsung.php">삼성</a></li>
                    <li><a href="../phone/apple.php">애플</a></li>
                    <li><a href="../phone/compare.php">제품비교하기</a></li>
                    <li><a href="../board/boardCate.php?category=리뷰게시판">제품리뷰</a></li>
                </ul>
            </li>
            <li>
                커뮤니티
                <ul class="submenu">
                    <li><a href="../notice/notice.php">공지사항</a></li>
                    <li><a href="../board/boardCate.php?category=자유게시판">자유게시판</a></li>
                    <li><a href="../board/boardCate.php?category=토론게시판">토론게시판</a></li>
                </ul>
            </li>
            <li>
                고객센터
                <ul class="submenu">
                    <li><a href="../mypage/mypage.php">마이페이지</a></li>
                    <li><a href="../surpport/surpport.php">문의하기</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="blurEffect"></div>
</nav>
<script>
    let header = document.querySelector("#header");
    let nav = document.querySelector("#nav");
    let hamMenu = document.querySelector("#header .header__ham");
    let hamShape = document.querySelector("#header .header__ham div");
    let blur = document.querySelector(".blurEffect");

    let isNavOpen = false;

    function toggleNav() {
        if (isNavOpen) {
            nav.style.height = "0";
            blur.style.height = "0px";
            blur.style.opacity = "0";
            hamShape.classList.add("ham");
            hamShape.classList.remove("hamX");
        } else {
            if (window.innerWidth > 600) {
                nav.style.height = "360px";
            } else {
                nav.style.height = "100vh";
            }
            blur.style.height = "100%";
            blur.style.opacity = "1";
            hamShape.classList.add("hamX");
            hamShape.classList.remove("ham");
        }

        isNavOpen = !isNavOpen;
    }

    hamMenu.addEventListener("click", toggleNav);
    blur.addEventListener("click", toggleNav);

    // if(window.innerWidth > 780){
    //     blur.addEventListener("mouseover", toggleNav);
    // } else {
    //     blur.addEventListener("click", toggleNav);
    // }

    

    // 스크롤 감지하여 nav 닫히도록
    window.addEventListener("scroll", function() {
        if(isNavOpen) {
            toggleNav();
        }
    });
</script>