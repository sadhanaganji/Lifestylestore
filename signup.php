<?php
require "includes/common.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
      <nav >
        <?php
        include "includes/header.php";
        ?>
        </nav>
       
        <div class="container-fluid decor_bg" id="content">
        <div class="row">
        <div class="container">
           <div class="col-xs-offset-3 col-xs-6 col-xs-offset-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Signup
                </div>
                <div class="panel-body">
                  <form method="POST" action="signup_script.php">
					  
                    <div class="form-group">
                      <input class="form-control" type="name" name="name" placeholder="Name" />
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="email" name="email" placeholder="Enter Valid Email" />
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="password" placeholder="Password (Min. 6 characters)" />
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="contact" name="contact" placeholder="Enter Valid Phone Number(Ex:8448444853)" />
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="city" name="city" placeholder="City" />
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="address" name="address" placeholder="Address" />
                    </div>
                    <div class="form-group">
                      <button class=" btn btn-primary"name="submit">Submit</button>
                    </div>
                  </form>
                  <?php
					$fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					if(strpos($fullurl,"signup=empty")==true)
					{
							echo "<p class='red'>You did not fill the details</p>";
							exit();
					}
					elseif(strpos($fullurl,"signup=nameinvalid")==true)
					{
							echo "<p class='red'>You used invalid characters</p>";
							exit();
					}
					elseif(strpos($fullurl,"signup=emailinvalid")==true)
					{
							echo "<p class='red'>email is invalid</p>";
							exit();
					}
					elseif(strpos($fullurl,"signup=success")==true)
					{
							echo "<p class='success'>You have succesfully Registered</p>";
							
					}
					elseif(strpos($fullurl,"signup=taken")==true)
					{
							echo "<p class='red'>This email is already Registered</p>";
							exit();
					}
					elseif(strpos($fullurl,"signup=pwdnotvalid")==true)
					{
							echo "<p class='red'>Password is less than 6 characters</p>";
							exit();
					}
					elseif(strpos($fullurl,"signup=cotnotvalid")==true)
					{
							echo "<p class='red'>Contact number is invalid</p>";
							exit();
					}
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php
		include "includes/footer.php";
        ?>
    </body>
</html>
