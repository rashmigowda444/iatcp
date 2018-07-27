<?php
include 'db.php';
if(isset($_POST['name'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$sql="INSERT INTO `iatcp_contact`(c_name,c_phone,c_email,c_subject,c_message) values('$name','$phone','$email','$subject','$message')";
if (mysqli_query($conn, $sql)) {
   echo "<script> alert('Thanks for contacting us.Will get back to you soon')</script>";
   echo '<script>window.location="http://localhost/iatcp/contact-us/";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
