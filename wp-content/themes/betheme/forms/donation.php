<?php
include 'db.php';
if(isset($_POST['name'])){
$name=$_POST['name'];
$phone=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$amount=$_POST['amount'];

$sql="INSERT INTO `iatcp_donations`(d_name,d_phone,d_email,d_address,d_city,d_state,d_country,d_amount) values('$name','$phone','$email','$address','$city','$state','$country','$amount')";
if (mysqli_query($conn, $sql)) {
   echo "<script> alert('Thanks for contacting us.Will get back to you soon')</script>";
   echo '<script>window.location="http://localhost/iatcp/donations-sponsors/";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
