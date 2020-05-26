<?php
require "includes/common.php";


// This page updates the user password
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
if(isset($_POST['submit']))
{

$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$contact=mysqli_real_escape_string($con,$_POST['contact']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$address=mysqli_real_escape_string($con,$_POST['address']);	
//error handlers
//check for empty fields
	if(empty($name)|| empty($email) || empty($password)||  empty($contact)||  empty($city)||  empty($address))
	{
		header("Location:signup.php?signup=empty");
		exit();
	}
	else
	{
		//check if input is valid
		if(!preg_match("/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/",$name))
		{
			header("Location:signup.php?signup=nameinvalid");
			exit();
		}
		else
		{//check if email is valid
			if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
			{ 
				header("Location:signup.php?signup=emailinvalid");
				exit();
			}
			else
			{	//check email is taken or not
				$signup_taken="SELECT * FROM users WHERE email='$email'";
				$signup_taken_result=mysqli_query($con,$signup_taken);
				$signup_taken_result_check=mysqli_num_rows($signup_taken_result);
				
				if($signup_taken_result_check>0)
				{
					header("Location:signup.php?signup=taken");
					exit();
				}
				else
				{	
					if(strlen($password)<=6)//check password contains a minimum of 6 characters
					{
							header("Location:signup.php?signup=pwdnotvalid");
							exit();
					}
					else
					{
						if(strlen($contact)!=10 || is_numeric($contact)==FALSE)//check contact has valid 10 digit number
						{
							header("Location:signup.php?signup=cotnotvalid");
							exit();
						}
						else
						{
							$pwd=md5($password);//to encrypt password
							//inserting values
							$signup_query="insert into users(name,email,password,contact,city,address) values ('$name','$email','$pwd','$contact','$city','$address')" or die(mysqli_error($con));
							$signup_query_result=mysqli_query($con,$signup_query)or die(mysqli_error($con));
							
							$SESSION['email']=$email;
							$user_id = mysqli_insert_id($con);
							$_SESSION['user_id'] = $user_id;
							$id=mysqli_insert_id($con);
							$_SESSION['id']=$id;
							
							header("Location:signup.php?signup=success");
						}
					
					}
										
				}
				
			}
		}
	}
}
else{
	header("Location: signup.php");
	exit();
}
?>
