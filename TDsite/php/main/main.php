<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_SESSION['memberID'])){
        $memberId = $_SESSION['memberID'];
    } else {
        $memberId = -1;
    }
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Device</title>
    <!-- css -->
    <?php include "../include/head.php"?>
    <style>

    </style>
</head>

<body>
    <div id="wrap">

        <!-- <div class="mouse__cursor none"></div> -->
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->

        <main id="main">
            <div id="slider">
                <div class="sliderWrap">
                    <div class="slider s1">
                        <div class="text">
                            <strong>iPhone 15 Pro</strong>
                            <p>티타늄. 초강력. 초경량. 초프로.</p>
                            <i>10월 13일 출시</i>
                            <a href="#">더 알아보기 ></a>
                        </div>
                    </div>
                    <div class="slider s2">
                        <div class="text">
                            <span>Galaxy Z Flip5</span>
                            <strong>갤럭시 Z 플립5</strong>
                            <p>갤럭시 Z 플립 사상 최대 크기의 커버 스크린, 플렉스 윈도우</p>
                            <i>08월 11일 출시</i>
                            <a href="#">더 알아보기 ></a>
                        </div>
                    </div>
                    <div class="slider s3">
                        <div class="text">
                            <span>SAMSUNG</span>
                            <strong>THOM BROWNE.</strong>
                            <p>NEW YORK</p>
                            <i>09월 12일 사전예약</i>
                            <a href="#">더 알아보기 ></a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- 이미지 고정 -->
            <div class="parallax__cont">
                <section id="section1" class="parallax__item">
                    <span class="item__name1 t1">
                        <h2>갤럭시 Z폴드 5</h2>
                        <p>주머니에서 꺼내는 PC급 스마트폰.</p>
                        <a href="#">바로가기</a>
                    </span>
                    <span class="item__img1">
                        <img src="../../assets/img/z-Fold51.jpg" alt="GSAP이미지1">
                    </span>
                </section>
                <!-- //section1 -->

                <section id="section2" class="parallax__item">
                    <span class="item__img2">
                        <img src="../../assets/img/z-Fold52.jpg" alt="GSAP이미지2">
                    </span>
                    <span class="item__desc2 t1">
                        <h2>몰입감 넘치는 192.1 mm 메인 디스플레이</h2>
                        <p>
                            강력한 게임 몰입감, 영화 감상은 기본.<br>
                            PC 수준의 생산성까지 발휘할 수 있도록 도와주는 태블릿급 크기의 디바이스로 무한한 경험을 펼쳐 보세요.
                        </p>
                    </span>
                </section>
                <!-- //section2 -->

                <section id="section3">
                    <div class="content__wrap">
                        <div class="content__img"></div>
                        <div class="content__text">
                            <h2>더 가볍고, 더 얇게.<br>
                                향상된 휴대성6
                            </h2>
                            <p>
                                프레임이 줄어들었다고,성능을 타협하진 않았습니다.<br>
                                더 좋아진 그립감으로 보다 편하게<br>
                                갤럭시 Z 폴드5를 휴대할 수 있습니다.
                            </p>
                        </div>
                    </div>
                </section>
                <!-- //section3 -->

                <section id="section4">
                    <span class="item__title">iPhone 15 Pro</span>
                    <span class="item__img3">
                        <img src="../../assets/img/GSAPiPhone15.jpg" alt="iPhone15Pro">
                    </span>
                    <div class="item__link">
                        <a href="http://rlanrider9.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=1&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90">
                            바로가기
                        </a>
                    </div>
                </section>
                <!-- //section4 -->
            </div>

            <div class="intro__inner container">
                <div class="intro__header">
                    <h2>Trend Device를 소개합니다.</h2>
                    <p>
                        Trend는 소비자들이 다양한 스마트폰 모델을 비교하고 최적의 선택을 할 수 있도록 도와주는 웹 사이트입니다.<br>
                        휴대폰 모델, 기능, 가격, 성능, 디자인 등과 같은 다양한 요소를 비교하고 평가해보세요!
                    </p>
                </div>
                <!-- //intro__header -->

                <div class="intro__images">
                    <div class="intro__img">
                        <a href="../phone/compare.php"><img src="../../assets/img/icon__compare.png" alt="스마트폰 비교하기"></a>
                        <span><a href="../phone/compare.php">비교하기</a></span>
                    </div>
                    <div class="intro__img">
                        <a href="../join/join.php"><img src="../../assets/img/icon__join.png" alt="회원가입"></a>
                        <span><a href="../join/join.php">회원가입</a></span>
                    </div>
                    <div class="intro__img">
                        <a href="../board/boardCate.php?category=자유게시판"><img src="../../assets/img/icon__comunity.png" alt="커뮤니티"></a>
                        <span><a href="../board/boardCate.php?category=자유게시판">커뮤니티</a></span>
                    </div>
                </div>
                <!-- //intro__img -->

                <div class="intro__footer">
<?php 
    if($memberId === -1){ ?>
        <span>이미 회원이신가요?</span>
        <div class="intro__btn">
            <a href="../login/login.php">로그인</a>
        </div>
        <!-- <div class="intro__btn">
            <a href="../phone/apple.php">둘러보기</a>
        </div> -->
    <?php } else { ?>
        <span></span>
    <?php }
?>
                </div>
                <!-- //intro__footer -->
            </div>
        </main>
        <!-- //main -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->
    <!-- gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1/bundled/lenis.min.js"></script>

    <!-- script -->
    <script>
        window.onload = () => {
            // 슬라이드
            let currentIndex = 0;   //현재 이미지
            const sliderWrap = document.querySelector(".sliderWrap");   //전체 이미지
            const slider = document.querySelectorAll(".slider");    //각각이미지
            const sliderClone = sliderWrap.firstElementChild.cloneNode(true);
            sliderWrap.appendChild(sliderClone);

            let slideInterval;



            function slide() {
                currentIndex++;
                sliderWrap.style.transition = "all 0.6s";   //애니메이션 추가
                sliderWrap.style.marginLeft = -currentIndex * 100 + "%";  //왼쪽으로 100%씩 이동

                if (currentIndex == slider.length) {
                    setTimeout(() => {
                        sliderWrap.style.transition = "0s";
                        sliderWrap.style.marginLeft = "0";
                        currentIndex = 0;
                    }, 1000);
                }
            }
            slideInterval = setInterval(slide, 5000);
        }
    

        // 애니메이션
        const ani1 = gsap.timeline();
        ani1.from("#section1 h2", {yPercent: -5, opacity: 0, ease: "expo.out", duration: 1,})
            .from("#section1 p", {yPercent: -5, opacity: 0, ease: "expo.out", duration: 0.8,})
            .from("#section1 a", {yPercent: -5, opacity: 0, ease: "expo.out", duration: 0.8,});

        ScrollTrigger.create({
            animation: ani1,
            trigger: "#section1",
            start: "top center",
            end: "+=2000",
        });

        const ani2 = gsap.timeline();
        ScrollTrigger.matchMedia({
            "(min-width: 1090px)" : function(){
                ani2.from("#section2 .item__img2", {
                    opacity: 0,
                    scale: 2,
                    width: "100%",
                    height: "100%",
                    duration: 1,
                    trigger: "#section2",
                    start: "top top",
                    end: "+=3500",
                }).from("#section2 .item__desc2 h2", {
                    yPercent: -5,
                    opacity: 0,
                    ease: "expo.out",
                    duration: 0.8
                }).from("#section2 .item__desc2 p", {
                    yPercent: -5,
                    opacity: 0,
                    ease: "expo.out",
                    duration: 0.8
                });
                ScrollTrigger.create({
                    animation: ani2,
                    trigger: "#section2",
                    start: "top center",
                    end: "+=3500",
                });
            },
            "(max-width: 1080px)" : function(){
                ani2.from("#section2 .item__img2", {
                    opacity: 0,
                    scale: 2,
                    width: "100%",
                    height: "100%",
                    duration: 1,
                }).from("#section2 .item__desc2 h2", {
                    yPercent: -5,
                    opacity: 0,
                    ease: "expo.out",
                    duration: 0.8,
                }).from("#section2 .item__desc2 p", {
                    yPercent: -5,
                    opacity: 0,
                    ease: "expo.out",
                    duration: 0.8
                });
                ScrollTrigger.create({
                    animation: ani2,
                    trigger: "#section2",
                    start: "top center",
                    end: "+=3500",
                });
            }
        })

        const ani3 = gsap.timeline();
        ani3.from("#section3 .content__text h2", {yPercent: -5, opacity: 0, ease: "expo.out", duration: 0.8,})
            .from("#section3 .content__text p", {yPercent: -5, opacity: 0, ease: "expo.out", duration: 0.8,});

        ScrollTrigger.create({
            animation: ani3,
            trigger: "#section3",
            start: "top center",
            end: "+=2500",
        });


        const ani4 = gsap.timeline();
        ani4.to("#section4 .item__img3", {xPercent: -150, opacity: 1, ease: "expo.out", duration: 1})
            .from("#section4 .item__title", {yPercent: -5, opacity: 0, ease: "expo.out", duration: 1})
            .from("#section4 .item__link a", {yPercent: -5, opacity:0, ease: "expo.out", duration: 1});

        ScrollTrigger.create({
            animation: ani4,
            trigger: "#section4",
            start: "top center",
            end: "+=3000"
        });


        // 스무스효과

        const lenis = new Lenis()

        lenis.on('scroll', (e) => {
            console.log(e)
        })

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }

        requestAnimationFrame(raf)
    </script>
</body>

</html>