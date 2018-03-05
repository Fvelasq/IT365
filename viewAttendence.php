<?php
session_start();
  
if(!isset($_SESSION['username']) or !isset($_SESSION['password']) or $_SESSION['is_admin'] == true){
   header("location: punchin.php");
}

$user_id = $_GET['user_id'];
$vacationStart = $_POST['vacationStart'];
$vacationEnd = $_POST['vacationEnd'];
$dayDate = $_POST['dayDate'];
$officeManager = $_POST['officeManager'];


//$currentMonth = date("Y/m/d");

 include 'admin/db.php';


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

    <title>View Attendance</title>

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
           
            <li><a href="index.php">Home</a></li>
            <li><a href="punchin.php">Punch In</a></li>
            <li><a href="punchout.php">Punch Out</a></li>
            <li><a href="vacation.php">Vacation</a></li>
            <li><a href="sickday.php">Callout</a></li>
            <li><a href="logout.php">logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="row">
                  <div class="col-md-12">
       
                              <div class="col-md-3 col-xs-11">
                              <form method="GET" action="">
                                <br><br><br>
                              <h2>View Attendance</h2> 
                              <h3>Employee ID</h3>
                              <input type="number" name="user_id" value="">                               
                              <input type="submit" name="submit">
                              </form>
                            
                
              </div>
           </div>
        </div>
      </div>
            
            
<?php 


  $servername = "localhost";
  $username = "root";
  $password = "usnavy123";
  $dbname = "timeclock2";
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  
$sql = "SELECT  dayDate, vacationStart, vacationEnd, officeManager FROM vacation WHERE user_id = '$user_id' ";
$result= $conn->query($sql);

if($result->num_rows > 0 ){
  while ($row = $result->fetch_assoc()) {
    echo "Submited on: " . $row["dayDate"]. "<br>" .
    "Vacation Started ". $row["vacationStart"]. "<br>".
    "Vacation Ended " . $row["vacationEnd"]. "<br>".
    "Office Manager " . $row["officeManager"].
     " <br>" . "<br>";
  }
}else{
 
}

$con->close();



?>


</body>
</html>