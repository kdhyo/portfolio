<?php
   header('Content-Type: text/html; charset=EUC-KR');
   $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL 접속 실패!!");
   
   $userID = $_POST["userID"];
     
   $sql ="DELETE FROM moinTable WHERE userID='".$userID."'";
   
   $ret = mysqli_query($con, $sql);
 
    echo "<h1> 회원 삭제 결과 </h1>";
   if($ret) {
	   echo $userID." 회원이 성공적으로 삭제됨..";
   }
   else {
	   echo "데이터 삭제 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   echo "<br><br> <a href='main.html'> <--초기 화면</a> ";
?>
