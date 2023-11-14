<?php
    if(!isset($_SESSION['memberID'])){
        echo "<script>alert('로그인 후 이용가능합니다.');</script>";
        echo '<script>window.location.href = "../login/login.php";</script>';
    }
?>