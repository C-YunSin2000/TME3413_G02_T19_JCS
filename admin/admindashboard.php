<?php include "../connection.php";session_start();?>
<?php include "connection.php";

if(!isset($_SESSION['adminEmail']))
header("Location: adminLogin.php");

function display_totalAppt()
{
	global $conn;

  $mon = new DateTime();    
  $month = $mon->format('F');
  $year = $mon->format('Y');  

  $sql = "SELECT * FROM appointment WHERE MONTHNAME(appointmentdate)= $month AND YEAR(appointmentdate)=$year";
  $result = $conn->query($sql) ;

  echo"<br>";
  echo"<u>$month $year </u>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  
	$sql2="SELECT * FROM appointment WHERE MONTH(appointmentdate) = MONTH(CURRENT_DATE()) AND YEAR(appointmentdate) = YEAR(CURRENT_DATE())";
	$result2 = $conn->query($sql2) ;
	$row2 = $result2->num_rows;

  echo"Total Appointments : $row2";
  echo"<br>";
  echo"<br>";
  echo"<br>";
}

function display_totalSales()
{
	global $conn;

  $mon = new DateTime();    
  $month = $mon->format('F');
  $year = $mon->format('Y');  

  $sql = "SELECT * FROM appointment WHERE MONTHNAME(appointmentdate)= $month AND YEAR(appointmentdate)=$year";
  $result = $conn->query($sql) ;

  echo"<br>";
  echo"<u>$month $year </u>";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";

  $sql3="SELECT * FROM saleorder WHERE MONTH(_date) = MONTH(CURRENT_DATE()) AND YEAR(_date) = YEAR(CURRENT_DATE())";
	$result3 = $conn->query($sql3) ;
	$row3 = $result3->num_rows;

  echo"Total Orders : $row3";
  echo"<br>";
  echo"<br>";
  echo"<br>";
  
}
?>

<html>
<head>
        <title>JCS</title>
        <link rel="icon" href="Pictures/smallicon.png">
        <link rel="shortcut icon" href="Pictures/smallicon.png">
        <link rel="stylesheet" href="CSS/adminStyle.css">
        <link rel="stylesheet" href="../CSS/footer.css">
        <script src="slides.js"></script>
    </head>

<body>
 <header class="header-border">
    <div class="header-content">
      <a href="admindashboard.php"><img src="Pictures/icon.png" class="logo"></a>
    </div>
  </header>



	<div class="sidenav">
		<a class="active" href="admindashboard.php"><span><img src="Pictures/sidebar.png" alt="sidebar"> Dashboard</span></a>
  		<a href="manageServiceAppointment.php"><span><img src="Pictures/serviceApp.png" alt="account"> Services Appointments</span></a>
  		<a href="manageProductOrder.php"><span><img src="Pictures/productOrder.png" alt="product"> Products Orders</span></a>
  		<a href="reportPage.php"><span><img src="Pictures/report.png" alt="transaction"> Reports</span></a>
        <a href="services.php"><span><img src="Pictures/services.png" alt="transaction"> Services</span></a>
        <a href="product.php"><span><img src="Pictures/products.png" alt="transaction"> Products</span></a>

  		<div class="fixed">
		  <a href="logoutPage.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
		</div>
	</div>

	<div class="admin">
		<div class="totalOrder">
        	<h3>Monthly Services Appointment</h3>
	        <hr size="2" width="70%" color=black>
	        <h1><?php display_totalAppt(); ?></h1>
      	</div>

	    <div class="totalSales">
	        <h3>Monthly Products Orders</h3>
	        <hr size="2" width="70%" color=black>
	        <h1><?php display_totalSales(); ?></h1>
	    </div>
  	</div>

      <footer class="FooterFooter" id="Push_footer" >
            <div class="FFooterUpperPortion">
                <div class="FFooterIcon">
                    <img src="Pictures/icon.png" alt="Jacqueline Cheers System">
                </div>
            </div>

            <br>
            <br>
            <hr id="FooterLine"/>

            <div class="FFooterBlocks">
                    <ul>
                      <li><img src="../Pictures/wechat.png" alt="wechat">siew2249</li>
                      <li><a href="https://www.facebook.com/jacquelinengosaloon?mibextid=ZbWKwL" ><img src="../Pictures/facebook.png" alt="facebook">Jacqueline Ngo</a></li>
                    </ul>
            </div>

            <div class="FFooterLowerPortion" >
              <sub class="Disclaimer">©2022 Jacqueline Cheers System - All Rights Reserved</sub>
            </div>
        </footer>   
</body>
</html>


