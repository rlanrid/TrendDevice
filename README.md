# Trend__Device
PHP를 이용하여 휴대폰 비교하기 사이트를 만들었습니다.

<img src="https://github.com/rlanrid/TrendDevice/blob/main/TDsite/assets/TDsiteCover.png">

## 프로젝트 소개
Trend Device는 직관적이고 사용하기 편리한 인터페이스를 제공하여 사용자가 원하는 휴대폰 모델을 선택하고, 선택한 모델들을 한눈에 비교할 수 있도록 합니다.    
<br>
각 휴대폰 모델에는 사진, 기술 사양, 가격 등의 정보가 제공되어 사용자가 원하는 정보를 쉽게 찾을 수 있습니다.   
<br>
또한, 사용자들은 자신의 요구 사항과 선호도에 맞는 휴대폰을 찾기 위해 여러 기능을 필터링하고 정렬할 수 있습니다. 이를 통해 사용자들은 다양한 옵션을 비교하고, 가장 적합한 휴대폰 모델을 선택할 수 있게 됩니다.   
<br>
Trend Device는휴대폰의 장단점을 명확히 보여주며, 사용자들이 최종 결정을 내리기 위한 정보를 제공하여 휴대폰 구매 과정을 보다 간편하고 이성적으로 할 수 있도록 도와줍니다.
<br>
<br>
작업 시간: 3주

## 팀 소개
|김우주|서유진|윤영식|
|:---:|:---:|:---:|
|<img width="150px" src="https://avatars.githubusercontent.com/u/144635615?v=4" />|<img width="150px" src="https://avatars.githubusercontent.com/u/144635615?v=4">|<img width="150px" src="https://avatars.githubusercontent.com/u/144635615?v=4">|
|[@GIT](https://github.com/rlanrid)|[@GIT](https://github.com/seoeugene)|[@GIT](https://github.com/yunyoungsik/)|


## 주요 기능
1. 비교: 삼성과 애플의 다양한 스마트폰 모델의 사양, 기능, 가격 등을 비교할 수 있는 환경을 제공하며, 2개에서 최대 4개까지 사용자들이 설정한 환경에서 비교, 분석을 할 수 있습니다.
2. 경험: 사용자들의 다양한 제품 사용경험을 리뷰를 통해 공유하여 제품 사용경험을 미리 파악 할수 있으며, 상품과 상품을 설정하여 토론을 진행하여 제품을 구매하는 부분에 참고할 수 있습니다.

## 사이트 바로가기
[Trend Device](http://rlanrider9.dothome.co.kr/TDsite/php/main/main.php)

## 작업 순서
[작업과정](http://rlanrider9.dothome.co.kr/TDsite/index.html)


## 기여 방법
저는 이 페이지의 게시판, 게시글, 위시리스트, 댓글, 공감 등의 기능을 맡았습니다.   

**게시판**
1. board테이블에서 삭제되지 않은 게시글 정보들을 boardId를 기준으로 내림차순해서 가져옵니다.
2. 가져온 정보들 중에서 카테고리와 일치하는 게시글들을 추려서 가져옵니다.
3. 데이터를 10개씩 페이지로 나누어 화면에 정보를 보여줍니다.

**게시글**
1. 사용자가 클릭한 게시글의 정보를 boardId와 카테고리를 이용해 가져옵니다.
2. 가져온 데이터를 fetch_array 함수를 사용해 배열로 반환한 후, 각각 데이터를 보여줍니다.
3. 이전 글과 다음 글은 boardId가 작거나 큰 Id들 중 하나만 가져와서 페이지를 만들었습니다.
4. 처음 글과 마지막 글도 이전 글과 비슷한 맥락으로 가져왔습니다.

**댓글**
1. 댓글 기능을 만들기 위해 댓글테이블을 새로 만들었습니다.
2. 댓글 작성 시에 게시글의 위치와 댓글 작성자를 알아야하기 때문에 해당 게시글의 boardId와 memberId를 저장합니다.
3. 삭제 또는 수정 시에는 memberId와 commentId를 확인해 일치하는 경우에만 가능하게 만들었습니다.
4. 댓글을 보여주는 작업은 해당 게시글의 boardId와 댓글 작성시에 저장해둔 boardId를 비교하여 일치하는 데이터만 보여줍니다.

**공감**
1. 공감기능도 댓글기능과 마찬가지로 공감테이블을 만들었습니다.
2. 공감을 했을경우 boardId를 저장하고 session에서 memberId를 받아온 뒤 일치하는 이미 공감을 했다면 알림창을 띄우고, 공감을 하지 않은 경우에는 버튼의 색상을 변경하도록 만들었습니다.
3. session에서 memberId를 받아오고, 만약 받아올 memberId가 없다면, 로그인 창으로 이동하게됩니다.

**위시리스트**
1. 위시리스트는 따로 테이블을 만들기보다, 기존의 공감 테이블을 활용했습니다.
2. 상품게시판에서 찜하기(하트 버튼)을 클릭하면, 공감 테이블에 phoneId와 memberId를 저장합니다.
3. 마이페이지의 위시리스트에 이동하면 JOIN문을 사용하여 상품테이블과 공감 테이블을 합쳐줍니다.
4. 합친 데이터에서 memberId와 phoneId 등을 비교하여 가져온 데이터의 정보들을 보여줍니다.


## 트러블슈팅
<details>
    <summary>공감 오류</summary>
    - 문제 원인   
    
    $unlikeSql = "UPDATE FBoard SET fLike = fLike - 1 WHERE blogId = '$blogId'";
    $connect->query($unlikeSql);
    $deleteLikeSql = "DELETE FROM LikedPosts WHERE blogId = '$blogId'";
    $connect->query($deleteLikeSql);

    memberId와 $memberId (현재 세션의 memberID)가 같은 경우에만 공감테이블에서 삭제해야 하는데 그 부분이 빠졌다.

    - 문제 해결
    
    $memberId = $_SESSION['memberID'];
    $unlikeSql = "UPDATE FBoard SET fLike = fLike - 1 WHERE blogId = '$blogId'";
    $connect->query($unlikeSql);
    $deleteLikeSql = "DELETE FROM LikedPosts WHERE memberId = '$memberId' AND blogId = '$blogId'";
    $connect->query($deleteLikeSql);
    
    현제 세션을 가져와서 조건문에 넣으면 해결된다.
</details>


## 스택
**Environment**
<div>
    <img src="https://img.shields.io/badge/VisualStudioCode-007ACC?style=flat-square&logo=VisualStudioCode&logoColor=white">
    <img src="https://img.shields.io/badge/Github-181717?style=flat-square&logo=Github&logoColor=white"> 
    <img src="https://img.shields.io/badge/Git-F05032?style=flat-square&logo=Git&logoColor=white">
    <img src="https://img.shields.io/badge/Filezilla-BF0000?style=flat-square&logo=Filezilla&logoColor=white">
</div>
  
**Development**
<div>
  <a href="#"><img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=JavaScript&logoColor=white"></a>
  <a href="#"><img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?logo=HTML5&logoColor=white"></a>
  <a href="#"><img alt="CSS3" src="https://img.shields.io/badge/CSS3-1572B6?logo=CSS3&logoColor=white"></a>
  <a href="#"><img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?logo=PHP&logoColor=white"></a>
</div>

**Communication**
<div>
    <img src="https://img.shields.io/badge/Slack-4A154B?style=flat-square&logo=Slack&logoColor=white">
    <img src="https://img.shields.io/badge/Notion-000000?style=flat-square&logo=Notion&logoColor=white">
</div>
