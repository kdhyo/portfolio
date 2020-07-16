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
   $birthYear = $row["birthYear"];
   $addr = $row["addr"];
   $mobile1 = $row["mobile1"];
   $mobile2 = $row["mobile2"];
   $height = $row["height"];   
   $mDate = $row["mDate"];      
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 회원 정보 수정 </h1>
<FORM METHOD="post"  ACTION="update_result.php">
	아이디 : <INPUT TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
	이름 : <INPUT TYPE ="text" NAME="userName" VALUE=<?php echo $userName ?>> <br> 
	출생연도 : <INPUT TYPE ="text" NAME="birthYear" VALUE=<?php echo $birthYear ?>> <br>
	지역 : <INPUT TYPE ="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
	휴대폰 국번 : <INPUT TYPE ="text" NAME="mobile1" VALUE=<?php echo $mobile1 ?>> <br>
	휴대폰 전화번호 : <INPUT TYPE ="text" NAME="mobile2" VALUE=<?php echo $mobile2 ?>> <br>
	신장 : <INPUT TYPE ="text" NAME="height" VALUE=<?php echo $height ?>> <br>
	회원가입일 : <INPUT TYPE ="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY><br>
	<BR><BR>
	<INPUT TYPE="submit"  VALUE="정보 수정">
</FORM>

</BODY>
</HTML>