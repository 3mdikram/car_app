<?php
session_start();
include_once('config.php');
if(isset($_POST["unamess"])){
 $unamess = '';
 $uemailss = '';
 $udesignat = '';
 $usalarys = '';
 $datess = '';

 $unamess_error = '';
 $uemailss_error = '';
 $udesignat_error = '';
 $usalarys_error = '';
 $datess_error = '';
 $captcha_error = '';
 if(empty($_POST["unamess"])){
  $unamess_error = '(required)';
 }else{
  $unamess = mysqli_escape_string($conn,$_POST["unamess"]);
  $namescp= htmlentities($unamess);
 }
 if(empty($_POST["udesignat"])){
  $udesignat_error = '(required)';
 }else{
  $udesignat = mysqli_escape_string($conn,$_POST["udesignat"]);
  $designscp=htmlentities($udesignat);
 }
 if(empty($_POST["usalarys"])){
  $usalarys_error = '(required)';
 }else{
  $usalarys = mysqli_escape_string($conn,$_POST["usalarys"]);
  $salaryscp=htmlentities($usalarys);
 }
 if(empty($_POST["uemailss"])){
  $uemailss_error = '(required)';
 }else{
  if(!filter_var($_POST["uemailss"], FILTER_VALIDATE_EMAIL)){
   $uemailss_error = '(Invalid Email)';
  }else{
   $uemailss = mysqli_escape_string($conn,$_POST["uemailss"]);
   $emailscp=htmlentities($uemailss);
  }
 }
 if(empty($_POST["datess"])){
  $datess_error = '(required)';
 }else{
  $datess = mysqli_escape_string($conn,$_POST["datess"]);
  $datecovertsqlf=date("Y-m-d",strtotime($datess));
 }
if(empty($_POST['g-recaptcha-response'])){
  $captcha_error = '(Captcha is required)';
 }else{
  $secret_key = '6LeK7DAdAAAAAFfwmkE98XiL5IcaLPFtBMmJwpiX';
  $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
  $response_data = json_decode($response);
  if(!$response_data->success)
  {
   $captcha_error = '(Captcha verification failed)';
  }
 }

 if($unamess_error == '' && $uemailss_error == '' && $udesignat_error == '' && $usalarys_error == '' && $datess_error == '' && $captcha_error == '')
 {
  $data = array(
   'success'  => true
  );
 }else{
  $data = array(
   'unamess' => $unamess_error,
   'uemailss' => $uemailss_error,
   'udesignat'  => $udesignat_error,
   'usalarys' => $usalarys_error,
   'datess'  => $datess_error,
   'captcha_error'  => $captcha_error
  );
 }
  $data1= json_encode($data);
  $datas= json_decode($data1);
  $successd=$datas->success;
  if($successd==true){
  	$stmt=$conn->query("INSERT INTO utables(umane,udesign,usalary,ueamil,dates)VALUES('$namescp','$designscp','$salaryscp','$emailscp','$datecovertsqlf')");
  	echo 1;
  }else{
  	echo json_encode($data);
  }
}

?>