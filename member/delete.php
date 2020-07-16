<?php
   header('Content-Type: text/html; charset=EUC-KR');
	 $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL 접속 실패!!");
   $sql ="SELECT * FROM moinTable WHERE userID='".$_GET['userID']."'";

   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['userID']." 아이디의 회원이 없음!!!"."<br>";
		   echo "<br> <a href='main.html'> <--초기 화면</a> ";
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 검색 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<br> <a href='main.html'> <--초기 화면</a> ";
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   $userID = $row['userID'];
   $userName = $row["userName"];
   
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 회원 삭제 </h1>
<FORM METHOD="post"  ACTION="delete_result.php">
	아이디 : <INPUT TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
이름 : <INPUT TYPE ="text" NAME="userName" VALUE=<?php echo $userName ?> READONLY> <br> 
	<BR><BR>
	위 회원을 삭제하겠습니까?	
	<INPUT TYPE="submit"  VALUE="회원 삭제">
</FORM>

</BODY>
</HTML>