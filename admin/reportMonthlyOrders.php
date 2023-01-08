<?php include "../connection.php";?>
<?php include "connection.php";

function display_month()
{
  global $conn;

  if (isset($_POST['monthly_r']))
  {
    if($_SERVER["REQUEST_METHOD"]=="POST") 
    {
      if (!($_POST['monthly']))
      {
        echo "<tr>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo "<td>Please select the month.----</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo "</tr>";
      }
      else
      {
        $mon = new DateTime($_POST['monthly']);    
        $month = $mon->format('m');
        $year = $mon->format('Y');  

        $sql = "SELECT * FROM saleorder WHERE MONTH(_date)= $month AND YEAR(_date)=$year";
        $result = $conn->query($sql) ;

        echo "<br>";
        echo "<br>";
        echo "MONTH : $month /  $year" ; 
        echo "<br>";
        echo "<br>";
        echo "<br>";

        if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc())
          {
            echo"<tr>";
            echo" <td>".$row['id']."</td>";
            echo" <td>".$row['userid']."</td>";
            echo" <td>".$row['_date']." </td>";
            echo" <td>".$row['_time']."</td>";
            echo" <td>".$row['shipping_fee']."</td>";
            echo" <td>".$row['merchandise_total']."</td>";
            echo" <td>".$row['grand_total']."</td>";
            echo" <td>".$row['ShippingOption']."</td>";
            echo "<td>";

            if ($row['ShippingOption'] == "SelfCollection"){
              if($row['_status'] == 1){
                echo "Picked Up";
              }else{
                echo "Pending";
              }
            }else{
              echo "Courier service";
            }

          echo"</td>";
            echo"</tr>";
          }
        }
        else
        {
          echo "<tr>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo "<td>---- No record available. ----</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo "</tr>";
        }
        $_SESSION['Monthly'] = $_POST['monthly']; 
        $_SESSION['month_mon']= $month;
        $_SESSION['year_mon']=$year;
      } 
    }    
  }
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
      <a href="admindashboard.php"><img src="Pictures/icon.png" class="logo" ></a>
    </div>
  </header>


  <div class="sidenav">
		<a href="admindashboard.php"><span><img src="Pictures/sidebar.png" alt="sidebar"> Dashboard</span></a>
  		<a href="manageServiceAppointment.php"><span><img src="Pictures/serviceApp.png" alt="account"> Services Appointments</span></a>
  		<a href="manageProductOrder.php"><span><img src="Pictures/productOrder.png" alt="product"> Products Orders</span></a>
  		<a class="active"href="reportPage.php"><span><img src="Pictures/report.png" alt="transaction"> Reports</span></a>
        <a href="services.php"><span><img src="Pictures/services.png" alt="transaction"> Services</span></a>
        <a href="product.php"><span><img src="Pictures/products.png" alt="transaction"> Products</span></a>

  		<div class="fixed">
		  <a href="logoutPage.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
		</div>
	</div>

  <div class="transaction">
    <div class="tranTitle"> 
  	  <h3>Report</h3>
    </div> <br>

    <div class="viewOpt">
      <form name="form"  method="POST">
      <div class="selectMonth">
        <h6><label for="monthly">Select month:</label>
        <input type="month"  name="monthly">
        <input type="submit" name="monthly_r"></h6>
      </div>
    </form>

      <a href="reportPage.php"><button>Monthly Services Appointments</button></a>
      <button><a href="reportPageMonthlyOrders.php">Monthly Products Orders</button></a>
    </div>
  

    <table style="width:115%">
      <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Transaction Date</th>
        <th>Transaction Time</th>
        <th>Shipping Fees (RM) </th>
        <th>Merchandise Total (RM) </th>
        <th>Total Price (RM) </th>
        <th>Shipping Option</th>
        <th>Status</th>
      </tr>
      <?php display_month()?>
    </table>
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