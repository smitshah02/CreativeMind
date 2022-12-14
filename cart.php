<?php
  session_start();
  if(empty($_SESSION['name']))
		header("Location: index.php");
  $servername = "localhost:3308";
  $username = "root";
  $password = "";
  $dbname = "ud";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Creative Mind</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/cm-logo.jpg">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">  
  </style>
  <script>
  </script>
</head>
<body>
	<?php include("modal.php");?>
  <nav class="nav navbar-expand navbar-fixed-top my-navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand navbar-nav navbar-left" style="font-size:25px;font-family:Lobster;color:#3374FF;font-weight:bold" href="index.php">CREATIVE MIND</a>                                          
        <button class="navbar-default navbar-toggle my-toggle" id="tgl" data-toggle="collapse" data-target=".navHeaderCollapse" style="color:#151057;border-color:##151057;border-width:0.5px;padding:2px;margin:10px;">
          <span class="glyphicon glyphicon-menu-hamburger" style="width:20px;height:100%"></span>
        </button>
      </div>
      
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav" id="mynav">
           <li class="active"><a style="font-size:16px" href="Catalogue.php?ct=1">HAMPERS</a></li>
          <li><a style="font-size:16px" href="Catalogue.php?ct=3">BIRTHDAY</a></li>
          <li><a style="font-size:16px" href="Catalogue.php?ct=2">ANNIVERSARY</a></li>
          <li><a style="font-size:16px" href="Catalogue.php?ct=4">PAINTINGS</a></li>    
          <li><a style="font-size:16px" href="Catalogue.php?ct=5">ALBUMS</a></li>
        </ul>
        <form class="navbar-form navbar-left" action="index.php" >
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" value=<?php if(isset($_GET['search']))echo $_GET['search']; ?> >
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
        <?php
          if(isset($_SESSION['name']))
          {
        ?>

        <ul class="nav navbar-nav navbar-right text-center">
          <li><a href="#" id="mybtn" style="height:40px;border:0px;" title="Cart"><i class="medium material-icons">shopping_cart</i><span class="badge">
			<?php
			
			  $conn = new mysqli($servername, $username, $password, $dbname);
			  if ($conn->connect_error) 
			  {
			    die("Connection failed: " . $conn->connect_error);
			  }
			        
			    if(isset($_SESSION['name'])) 
			    {
			        $sql1="SELECT * FROM cart WHERE user_id=".$_SESSION['id']." AND checkout=0";
			    }
			    else
			    {		
			        goto end2;
			    }
			    $result=$conn->query($sql1);
			    if($result->num_rows >0)
			    {
			    	echo $result->num_rows;

			    }	
			    else
				{
						echo '0';
			  	}

			    end2:
			    $conn->close();
			?>
				
			</span></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle mybtn1 fontq" data-toggle="dropdown" href="#">Hi  <?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <!--<li><a href="#"><i class="small material-icons">assignment</i>My Orders</a></li>-->
          <li><a href="#" class="fontq" data-toggle="modal" data-target="#modalAccountForm"><i class="small material-icons">account_circle</i> My Account</a></li>
          <li><a href="logout.php" class="fontq"><i class="small material-icons">power_settings_new</i> Log Out</a></li>
        </ul>
      </li>

        </ul>
        <?php
          }
        ?>
      </div>
    </div>
  </nav>
  
  <?php
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql="SELECT qty FROM cart WHERE user_id=".$_SESSION['id']." AND checkout=0";
        $result=$conn->query($sql);
            if ($result->num_rows > 0)
            {
            	$i=0;
                while($row=$result->fetch_assoc())
                {
                	$qnty[$i]=$row['qty'];
                	$i+=1;
                }     
            }
        $conn->close();
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
            if(isset($_SESSION['id'])) 
            {
              $sql="SELECT * FROM catalogue WHERE pid IN (SELECT item_id FROM cart WHERE user_id=".$_SESSION['id']." AND checkout=0) ";
            }
            else
            {
              goto end1;
            }
            $result=$conn->query($sql);
            
            if ($result->num_rows > 0)
            {
            	echo "<div class='container' style='overflow:auto;padding-top: 50px'>";
            	$i=0;
            	$total=0;
            	 echo "<table class='table table-striped'><thead><tr><th>&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Name</th><th>Type</th><th>Quantity</th><th style='text-align:right;'>Cost</th><th style='text-align:right;'>Amount</th></tr></thead><tbody>";
                while($row=$result->fetch_assoc())
                {
                	$amt=0;
                	$cat='Unknown';
                  switch($row['pcategory'])
                  {
                  	case 1:$cat= 'Hampers';break;
                  	case 2:$cat= 'Bithday';break;
                  	case 3:$cat= 'Anniversary';break;
                  	case 4:$cat= 'Paintings';break;
                    case 5:$cat= 'Albums';break;
                  }
                  switch($row['pcategory'])
                  {
                    case 1:
                    $sel='';
                    	switch($qnty[$i])
                    	{
                    		case 1:$sel='1';break;
                    		case 2:$sel='2';break;
                    		case 3:$sel='3';break;
                    		case 4:$sel='4';break;
                    		case 5:$sel='5';break;
                    	}
                      $qty= "<div class='form-group'><select id='quantity' class='form-control' name='quantity' onchange='this.form.submit();'><option>".$sel."</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></div>";
                      break;
                    default:
                      $qty='<div class="form-group"><input type="number" min="1" max="5" value="'.$qnty[$i].'" onKeyDown="return false" class="form-control" name="quantity" onchange="this.form.submit();"></div>';
                  }
                  $amt=$qnty[$i]*$row['pcost'];
                  echo "<tr><td><form method='get' action='delItem.php'><input type='hidden' class='form-control' name='item' value='".$row['pid']." ' ><button type='submit' class='btn btn-outline-dark' id='mybtn' style='border:0px;color:#f23c48' title='Delete'><i class='medium material-icons'>remove_circle_outline</i></button></form></td><td height='75px' width='75px'><img class='img-responsive img-thumbnail img-circle' src='".$row['pimage']."'></td><td>".$row['pname']."</td><td>".$cat."</td><td><form method='get' action='UpdateItem.php'><input type='hidden' class='form-control' name='item' value='".$row['pid']." ' >".$qty."</form></td><td align='right'>&#8377;".$row['pcost']."</td><td align='right'>&#8377;".$amt."</td></tr>";
                  	$total=$total+$amt;
      				$i+=1;
                  }
                 echo "</tbody><caption align='bottom'>Total:&#8377;".$total."<br>";
                 $conn->close();
               ?>
                 <?php 
                 if(isset($_SESSION['address']))
                 {
                    if($_SESSION['address']!=0)
                      include("pay.php"); 
                    else
                    {
                    ?>
                    <a href="#" data-toggle="modal" data-target="#modalAddressForm">      
                    <button class="btn btn-default mybtn-inv">PROCEED TO CHECKOUT</button>
                    </a>
                    <?php
                    }
                  }
                else
                { ?>
                 <a href="#" data-toggle="modal" data-target="#modalAddressForm">       
                 	<button class="btn btn-default mybtn-inv">PROCEED TO CHECKOUT</button>
                 </a>
                <?php } ?>
				</caption></table>
			</div>
            <?php 
            }
            else
            {
            ?>
            
	            <div class='container-fluid text-center overlay' style='padding-top: 100px'>
	            	<img src="images/empty-cart.svg">
	            	<h5 class="fontq">Cart is empty.</h5>
        		<a href='Catalogue.php?ct=1'><button class="btn btn-default mybtn-inv">Start Shopping</button></a>
	            </div>
            <?php
            }
            end1:
            
        
      ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <footer class="container-fluid text-center ">
        
        
          <div class="col-sm-5 col-md-5">
            <a href="index.php?p=about">ABOUT US</a>
            <a href="index.php?p=contact">CONTACT US</a>    
          </div>
          
        
        </div>
  </footer>

 <div class="modal fade" id="modalAddressForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title">Shipping Address</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="InsertAdd.php">
              <div class="floating-label-wrap">
                <input type="text" class="floating-label-field floating-label-field--s3" id="addr1" name="addr1" placeholder="Address Line 1" maxlength="40" title="Invalid Address" required>
                <label for="addr1" class="floating-label">Address Line 1</label>
              </div>
              <div class="floating-label-wrap">
                <input type="text" class="floating-label-field floating-label-field--s3" id="addr2" name="addr2" placeholder="Address Line 2" maxlength="40" title="Invalid Address" required>
                <label for="addr2" class="floating-label">Address Line 2</label>
              </div>
              <div class="floating-label-wrap">
                <input type="text" class="floating-label-field floating-label-field--s3" id="addr3" name="addr3" placeholder="Address Line 3" maxlength="20">
                <label for="addr3" class="floating-label">Address Line 3</label>
              </div>
              <div class="floating-label-wrap">
                <input type="text" class="floating-label-field floating-label-field--s3" id="city" name="city" placeholder="City" pattern="[A-Za-z]{1,30}" title="Please enter the City name correctly" required>
                <label for="city" class="floating-label">City</label>
              </div>
              <div class="floating-label-wrap">
                <select class="floating-label-field floating-label-field--s3" name="state" id="state" class="form-control" style="padding-bottom:19px;text-transform: uppercase;" placeholder="State" required>
                  <option>Select...</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chandigarh">Chandigarh</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
          <option value="Daman and Diu">Daman and Diu</option>
          <option value="Delhi">Delhi</option>
          <option value="Lakshadweep">Lakshadweep</option>
          <option value="Puducherry">Puducherry</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Uttarakhand">Uttarakhand</option>
          <option value="West Bengal">West Bengal</option>
          </select>
                <label for="state" class="floating-label">State</label>
              </div>
              <div class="floating-label-wrap">
                <input type="text" class="floating-label-field floating-label-field--s3" id="pincode" name="pincode" placeholder="Contact" title="Invalid Pin Code" maxlength="6" required>
                <label for="pincode" class="floating-label">Pin Code</label>
              </div>
              
              <div class="modal-footer" style="text-align:center">
                <button class="btn btn-default mybtn-inv">Submit</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>