<?php
  session_start();
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
  <script>
    function show() {
    var x = document.getElementById("password");
    var y=document.getElementById("eye");
    if (x.type === "password") {
      y.innerHTML="visibility_off";
      x.type = "text";
    } else {
      y.innerHTML="visibility";
      x.type = "password";
    }
    }
    function show1() {
    var x = document.getElementById("password1");
    var y=document.getElementById("eye1");
    if (x.type === "password") {
      y.innerHTML="visibility_off";
      x.type = "text";
    } else {
      y.innerHTML="visibility";
      x.type = "password";
    }
    }
  </script>
  <style type="text/css">
    
  </style>
</head>
<body>
<?php include("modal.php");?>
  <nav class="nav navbar-expand navbar-fixed-top my-navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand navbar-nav navbar-left" style="font-size:25px;font-family:Lobster;color:#3374FF;font-weight:bold" href="index.php">CREATIVE MIND</a>                                          
        <button class="navbar-default navbar-toggle my-toggle" id="tgl" data-toggle="collapse" data-target=".navHeaderCollapse" style="color:#070f82;border-color:#070f82;border-width:0.5px;padding:2px;margin:10px;">
          <span class="glyphicon glyphicon-menu-hamburger" style="width:20px;height:100%"></span>
        </button>
      </div>
      
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav" id="mynav">
          <!--<li class="active"><a href="#">Home</a></li>-->
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
        <style type="text/css">
          input::-webkit-outer-spin-button.num,
          input::-webkit-inner-spin-button.num {
            -webkit-appearance: none;
            margin: 0;
          }

          input[type=number] .num{
            -moz-appearance: textfield;
          }
        </style>
        <ul class="nav navbar-nav navbar-right text-center">
          <li><a href="cart.php" id="mybtn" style="height:50px;border:0px;" title="Cart"><i class="medium material-icons">shopping_cart</i><span class="badge">
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
        ?></span></a></li>
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
          else
          {
        ?>
        <ul class="nav navbar-nav navbar-right text-center">
          <li id="pad"><a href="#" id="mybtn" data-toggle="modal" data-target="#modalSignUpForm" style="font-size:15px">SIGN UP</a></li>
          <li id="pad"><a href="#" id="mybtn" data-toggle="modal" data-target="#modalLoginForm" style="font-size:15px">LOGIN</a></li>
        </ul>
        <?php
          }
        ?>
      </div>
    </div>
  </nav>
<?php
  if(isset($_GET['p']))
  {
    $page=$_GET['p'];
    if($page=='about')
    {
?>
      <div class="container-fluid text-center" style="overflow-x:auto">
        <div class="row">
          <div class="col-sm-12" style="padding:0px;">
            <img src="images/about.jpg" width="100%" height="800px">
          </div>
        </div>
      
          <div class="col-sm-10 fontq" style="padding:50px;font-size:20px;">
          <p style="padding-bottom:50px;padding-top:50px;margin-left: 6cm"><b>FOR YOUR LOVED ONE'S </b><br>
We customised birthday gifts, anniversary gifts, other occasions on your needs and budget.
There are a variety of options available with us including hampers, personalised cards, photo albums, canvas paintings, gift cards.According to your choice and budget we are here to help you gift your loved ones something special which can make their day.</p></div>
        </div>
      </div>
<?php
    }
    else
    {
?>
      <div class="container-fluid text-center" style="overflow-x:auto">
        <div class="row">
          <div class="col-sm-12" style="padding:0px;">
            <img src="images/contact2.jpg" width="100%" height="650px">
          </div>
        </div>
      
          <div class="col-sm-8 fontq" style="padding:5px;font-size:20px;">
            <p style="padding-bottom:20px;padding-right:300px"></p>
            <p style="margin-left: 12cm"><b>GENERAL</b><br>
For general questions and feedback, please contact <b>support@cm.net</b> or you can call us on <b>9920345348/9920567345</b></p><br>
          <p style="margin-left: 12cm"><b>COMMUNICATIONS TEAM</b><br>
For people with creative minds who interested in collaboration with us reach Creative Mind communications team, contact <b>inquiries@cm.net</b></p><br>
          </div>
        </div>
      </div>

<?php
    }
  }
  else
  {
?>

  <?php
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
            if(isset($_GET['search'])) 
            {
              $sql="SELECT * FROM `catalogue` WHERE `pname` LIKE '%".$_GET['search']."%' ORDER BY pname ASC";
            }
            else
            {
              ?>
              <div class="container-fluid text-center" >
                <div class="row">
                  <div class="col-sm-12" style="padding:0px;">
                    <img src="images/main_page.jpg" width="100%">
                  </div>
                </div>
              </div>
              <?php
              goto end1;
            }
            $result=$conn->query($sql);
            $temp=0;
            echo "<div class='container'>";
            if ($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
              {
                 switch($row['pcategory'])
                  {
                    case 1:
                      $qty= "<div class='form-group'><select id='quantity' class='form-control' name='quantity'><option value='1'selected>Quantity:1</option><option value='2'>Quantity:2</option><option value='3'>Quantity:3</option><option value='4'>Quantity:4</option></select></div>";
                      break;
                    default:
                      $qty='<div class="form-group"><input type="number" min="1" max="60" value="1" onKeyDown="return false" class="form-control" name="quantity"></div>';
                  }
                if($temp==0)
                {
                echo "<div class='row display-flex'>";
                }
                else if($temp==$result->num_rows)
                { 
                  echo "</div>";
                }
                else if($temp%3==0)
                {
                echo "</div>";
                echo "<div class='row display-flex'>";
                }
                echo "<div class='col-sm-4'><div class='card text-center c1' title='".$row['pname']."'><div class='card-body'><img class='card-img-top' src='".$row['pimage']."' height='100%' width='100%'><div class='card-body text-center'><h5 class='card-title'>".$row['pname']."<br><b>&#8377;".$row['pcost']."</b></p><form method='get' action='addCart.php'><input type='hidden' class='form-control' name='item' value='".$row['pid']." ' >".$qty."<button type='submit' class='btn btn-outline-dark' id='mybtn' style='border:0px;color:#f23c48' title='Add to Cart'><i class='medium material-icons'>add_shopping_cart</i></button></form></div></div></div></div>";
                $temp+=1;
                }
            }
            echo "</div>";
        end1:
      $conn->close();
      ?>
<?php
  }
?>

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
            <form method="post" action="InsertAdd.php?url=index">
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