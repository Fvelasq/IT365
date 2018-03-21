<?php
session_start();
$user_id = $_POST['user_id'];
$officeManager = $_POST['officeManager'];
$dayDate = $_POST['dayDate'];
$signInTime = $_POST['signInTime'];


  
if(!isset($_SESSION['username']) or !isset($_SESSION['password']) or $_SESSION['is_admin'] == true){
   header("location: punchin.php");
}
 include 'admin/db.php';
 //include 'config.php';
  //get user id
// $username = $_SESSION['username'];
// $query = mysqli_query($con,"SELECT * FROM users WHERE username='$username'") or die('error in get user id query');
// $row = mysqli_fetch_assoc($query);
 //$user_id = $row['user_id'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="../assets/img/favicon.png">

    <title>User Punchin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/assets/jquery-multi-select/css/multi-select.css" />

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">PunchIt</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a >Welcome , <?php echo $_SESSION['username']; ?></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="punchin.php">Punch In</a></li>
            <li><a href="punchout.php">Punch Out</a></li>
            <li><a href="vacation.php">Vacation</a></li>
            <li><a href="sickday.php">Callout</a></li>
            <li><a href="viewAttendence.php">Attendence</a></li>
            <li><a href="logout.php">logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<div class="container">
			<div class="row">
                  <div class="col-md-12">
					<div id="time" >

                              <form method="post" action="">
                              <h2>Punch in</h2> 
                              Employee ID
                              <input type="number" name="user_id" value=""> 
                              Manager
                              <input type="radio" name="officeManager" value="DJ">DJ    
                              <input type="radio" name="officeManager" value="Melissa">Melissa                   
                              Punch in time
                              <input type="time" name="signInTime" value="">
                              Today's date
                              <input type="date" name="dayDate" value="">
                              <input type="submit" name="submit">
                              </form>
        				</div>
            	</div>
         	 </div>
        </div>
<!--	
                              <form method="post" action="index.php" >
                              <h2>Punch out</h2>
                              Punch out time
                              <input type="time" name="punchout" value="">
                              Today's date
                              <input type="date" name="todaydate" value="">
                              <input type="submit" name="Submit" value="Submit">
                              </form>

                              <form method="post" action="index.php" >
                              <h2>Sick Day</h2>
                              Submit your sick day                   
                              Select today's date
                              <input type="date" name="todaydate" value="">
                              <input type="submit">
                              </form>

                               <form method="post" action="index.php" >
                              <h2>Vacation Days</h2>
                              Submit your vacation days                  
                              Select start date
                              <input type="date" name="todaydate" value="">
                              Select end date
                              <input type="date" name="todaydate" value="">
                              <input type="submit">
                              </form>
  -->                 
            
<?php 

if (isset($_POST["submit"])) {
 	$servername = "localhost";
	$username = "root";
	$password = "usnavy123";
	$dbname = "timeclock2";
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  
  //$sql = "INSERT INTO `attendence` (`id`, `dayDate`, `signInTime`) VALUES ('$signInTime', 'dayDate')";
  $sql = "INSERT INTO punchclock (dayDate, signInTime, user_id, officeManager) VALUES ('$dayDate','$signInTime', '$user_id', '$officeManager')" or die("Error in loggin process"); 
if ($conn->query($sql) === TRUE) {
echo "Success";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>


</body>
</html>