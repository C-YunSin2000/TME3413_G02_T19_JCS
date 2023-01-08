<?php include "connection.php";?>
<?php include "../connection.php";?>

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
		<a href="admindashboard.php"><span><img src="Pictures/sidebar.png" alt="sidebar"> Dashboard</span></a>
  		<a href="manageServiceAppointment.php"><span><img src="Pictures/serviceApp.png" alt="account"> Services Appointments</span></a>
  		<a class="active"href="manageProductOrder.php"><span><img src="Pictures/productOrder.png" alt="product"> Products Orders</span></a>
  		<a href="reportPage.php"><span><img src="Pictures/report.png" alt="transaction"> Reports</span></a>
        <a href="services.php"><span><img src="Pictures/services.png" alt="transaction"> Services</span></a>
        <a href="product.php"><span><img src="Pictures/products.png" alt="transaction"> Products</span></a>

  		<div class="fixed">
		  <a href="logoutPage.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
		</div>
	</div>

    <?php
      $sql = "SELECT * FROM saleorder";
      $result = $conn->query($sql) ;
    ?>

  <div class="transaction">
    <div class="tranTitle"> 
  	  <h3>Manage Product Orders</h3>
    </div> <br>

    <div>
    <form action="AddOrder.php" method="POST">
        <input type="hidden" name="insertOrder">
        <button type="submit" name="addOrder" class="addBtn"> Add New Order </button>
      </form>
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
        <th>Status </th>
        <th></th>
        <th></th>
      </tr>

      <?php
            if ($result->num_rows > 0) 
            {
              while($row = $result->fetch_assoc())
              {
          ?>

          <tr>
              <td><?=$row['id'];?></td>
              <td><?=$row['userid'];?></td>
              <td><?=$row['_date'];?></td>
              <td><?=$row['_time'];?></td>
              <td><?=$row['shipping_fee'];?></td>
              <td><?=$row['merchandise_total'];?></td>
              <td><?=$row['grand_total'];?></td>
              <td><?=$row['ShippingOption'];?></td>
              <td><?php 
                if ($row['ShippingOption'] == "SelfCollection"){
                  if($row['_status'] == 1){
                    echo "Picked Up";
                  }else{
                    echo "Pending";
                  }
                }else{
                  echo "Courier service";
                }
              ?></td>
      
              <td>
              <?php if($row['ShippingOption'] == "SelfCollection" && $row['_status']==0){?>
                <form action="EditOrderProduct.php" method="POST">
                <input type="hidden" name="changeProduct" value="<?php echo $row['id'];?>">
                <button type="submit" name="editProduct" >  
                <a style="color:black; text-decoration: none;" href="EditOrderProduct.php?id=<?php echo $row['id'] ?>">Edit Status</a></button>
                </form>
                <?php
                }
                else if($row['ShippingOption'] == "StandaryDelivery" ){ ?>
                <form action="" method="POST">
                <input type="hidden" name="changeProduct" value="<?php echo $row['id'];?>">
                <button type="submit" name="editProduct" onclick="alert('Shipping option for Standary Delivery does not require status update.')">Edit Status  
                </button>
                </form>
                <?php
                }
                else if($row['ShippingOption'] == "SelfCollection" && $row['_status']==1){ ?>
                <form action="" method="POST">
                <input type="hidden" name="changeProduct" value="<?php echo $row['id'];?>">
                <button type="submit" name="editProduct" onclick="alert('Shipping option for Self Collection (Picked Up) does not require status update.')">Edit Status  
                </button>
                </form>
                <?php } ?>
              </td>
              <td>
                <form action="DeleteOrderProduct.php" method="POST">
                <input type="hidden" name="eraseProduct" value="<?php echo $row['id']; ?>">
                <button type="submit" name="deleteProduct" onclick="return confirm('Are You Sure You Want To Delete?')"> Delete Order </button>
                </form>
              </td>
          </tr>

          <?php } }?>
    </table>
    <!-- <input type="submit" name="add" class="deleteBtn" value="Add New Order" onclick="">
        <input type="submit" name="edit" class="deleteBtn" value="Edit Order" onclick=""> -->
   
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