<?php
session_start();

if($_SESSION['operator_email']=="" && $_SESSION['operator_pass']==""){
  if($_SESSION['admin_email']!="" && $_SESSION['admin_pass']!=""){  
    $mode="admin";
  }

  else{
    header('location:operator.html');
  }
}

else{
  $mode="operator";
}

?>

<!DOCTYPE html>
</html>

<head>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<style>
body{
text-transform:capitalize;
}


</style>

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand">DoctorWebapp</a>
  <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div id="my-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.html">home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="patient.php">patient</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="doctor.php" >doctor</a>
      </li>
    </ul>
  </div>
</nav>


<div class="container" style="margin-top:5%; margin-bottom:10%">

<h1>patient form mode: <?php echo $mode; ?></h1>
<form name="patient-form" class="was-validated" action="patient.php" method="get" >

<div class="form-group">
<label for="patient-id">Patient id:</label>
<input type="text" class="form-control" id="patient-id" placeholder="Patient Id" name="patient_id" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter valid patient id</div>
</div>

<div class="form row"  style="margin-bottom:10px;">
<div class="col">
<label for="patient-fname">First Name:</label>
<input type="text" class="form-control" id="patient-fname" placeholder="First Name" name="patient_fname" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter your first name</div>
</div>

<div class="col">
<label for="patient-fname">last Name:</label>
<input type="text" class="form-control" id="patient-lname" placeholder="Last Name" name="patient_lname" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter your last name</div>
</div>

</div>

<div class="form-row">

<div class="col">
<label for="patient-email">email:</label>
<input type="email" class="form-control" id="patient-email" placeholder="E-mail" name="patient_email" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter your valid email</div>
</div>

<div class="col">
<label for="patient-phone">phone number:</label>
<input type="text" class="form-control" id="patient-phone" placeholder="Phone Number" name="patient_phone" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter your phone number</div>
</div>
</div>

<div class="form-group">
<label for="patient-address">address:</label>
<textarea class="form-control" id="patient-address" placeholder="address" name="patient_address" required></textarea>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter your address</div>
</div>





<div class="form-group">
<label for="patient-ref">reffered doctor:</label>
<input type="text" class="form-control" id="patient-ref" placeholder="reffered doctor" name="patient_ref" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter the reffered doctor id</div>
</div>

<div class="form-group">
<label for="patient-pass">password:</label>
<input type="password" class="form-control" id="patient-pass" placeholder="password" name="patient_pass" required>
<div class="valid-feedback">valid</div>
<div class="invalid-feedback">please enter a password</div>
</div>

<input type="submit" class="btn btn-outline-primary btn-lg" name="submit" value="Submit">
</form>
<br>
<br>
<form name="logout" action="logout.php" method="get">
<input type="submit" class="btn btn-outline-primary btn-lg" value="logout"  >
</form>

</div>
</body>

</html>
<?php
include("connect.php");

if(isset($_GET['submit'])){
    $pid=$_GET['patient_id'];
    $fname=$_GET['patient_fname'];
    $lname=$_GET['patient_lname'];
    $email=$_GET['patient_email'];
    $ph=$_GET['patient_phone'];
    $addr=$_GET['patient_address'];
    $passw=$_GET['patient_pass'];
    $pref=$_GET['patient_ref'];

    $res="insert into tblpatient (patient_id,patient_fname,patient_lname,patient_email,patient_phone,patient_address,patient_ref,patient_pass)
            VALUES('$pid','$fname','$lname','$email','$ph','$addr','$pref','$passw')";

    if($conn->query($res)==true){
        echo "resistration successful!";
    }
    else{
        echo "unsuccessful regestration";
    }


}


?>
