<?php
include "./mail.php";
$mail = "toanlmpc05557@fpt.edu.vn";
$content ="test nè";
$title ="Bai viet test";
 SendMail($mail,$content,$title);