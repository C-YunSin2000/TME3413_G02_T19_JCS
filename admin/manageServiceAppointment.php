<?php include "../connection.php";?>
<?php include "connection.php";
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
  		<a class="active"href="manageServiceAppointment.php"><span><img src="Pictures/serviceApp.png" alt="account"> Services Appointments</span></a>
  		<a href="manageProductOrder.php"><span><img src="Pictures/productOrder.png" alt="product"> Products Orders</span></a>
  		<a href="reportPage.php"><span><img src="Pictures/report.png" alt="transaction"> Reports</span></a>
        <a href="services.php"><span><img src="Pictures/services.png" alt="transaction"> Services</span></a>
        <a href="product.php"><span><img src="Pictures/products.png" alt="transaction"> Products</span></a>

  		<div class="fixed">
		  <a href="logoutPage.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
		</div>
	</div>

  <div class="transaction">
    <div class="tranTitle"> 
  	  <h3>Manage Service Appointments</h3>
    </div> <br>

    <div>
    <form action="AddAppointment.php" method="POST">
        <input type="hidden" name="insertAppointment">
        <button type="submit" name="addAppointment" class="addBtn"> Add New Appointment </button>
      </form>
    </div>

  
    <table style="width:115%">
    <tr>
        <th>Appointment ID</th>
        <th>User ID</th>
        <th>Services</th>
        <th>Additional Information</th>
        <th>Appointment Date </th>
        <th>Appointment Time </th>
        <th>Status </th>
        <th></th>
   <!--     <th></th> -->
      </tr>

      <?php
            $sql = "SELECT * FROM appointment";
            $result = $conn->query($sql) ;
            if ($result->num_rows > 0) 
            {
              while($row = $result->fetch_assoc())
              {
          ?>

          <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['userid'];?></td>
              <td><?php echo $row['serviceid'];?></td>
              <td><?php echo $row['addtionalinformation'];?></td>
              <td><?php echo $row['appointmentdate'];?></td>
              <td><?php echo $row['appointmenttime'];?></td>
              <td><?php echo $row['status'];?></td>
              <td>
                <form action="EditServiceAppointment.php" method="POST" >
                <input type="hidden" name="changeService" value="<?php echo $row['id'];?>">
                <button type="submit" name="editService" >
                <a style="color:black; text-decoration: none;" href="EditServiceAppointment.php?id=<?php echo $row['id'] ?>">Edit Appointment</a> </button>
                </form>
              </td>
       <!--       <td>
                <form action="DeleteServiceAppointment.php" method="POST">
                <input type="hidden" name="eraseService" value="<?php /*echo $row['id']; */?>">
                <button type="submit" name="deleteService" onclick="return confirm('Are You Sure You Want To Delete?')"> Delete Service </button>
                </form>
              </td> -->
          </tr>

          <?php } }?>

    </table>
    <!-- <input type="submit" name="add" class="deleteBtn" value="Add New Appointment" onclick="">
        <input type="submit" name="edit" class="deleteBtn" value="Edit Appointment" onclick="">
    <input type="submit" name="delete" class="deleteBtn" value="Delete Appointment" onclick="return confirm('Delete Appointment will delete all records in database. Are you confirm to delete?')"> -->
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