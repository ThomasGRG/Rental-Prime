<?php 
session_start();
$host="localhost";
$user="root";
$password="";
$db="rentalprime";
$mysqli=new mysqli("localhost",$user,$password,$db);

if(isset($_POST['type']) && $_POST['type'] == "register")
{
	$username=mysqli_real_escape_string($mysqli,$_POST['username']);
	$fName=mysqli_real_escape_string($mysqli,$_POST['firstName']);
	$lName=mysqli_real_escape_string($mysqli,$_POST['lastName']);
	$email=mysqli_real_escape_string($mysqli,$_POST['email']);
    $password_1=mysqli_real_escape_string($mysqli,$_POST['pass1']);

    $safe = true;
    
	$qu="SELECT username FROM users WHERE username='$username'";
	$res=$mysqli->query($qu);
    if (mysqli_num_rows($res)>0) 
    {
        $safe = false;
        echo json_encode(array("statusCode"=>201, "msg"=>"username exists"));
    }
    $qe="SELECT email FROM users WHERE email='$email'";
    $rsu=$mysqli->query($qe);
    if (mysqli_num_rows($rsu)>0 && $safe==true)
    {
        $safe = false;
        echo json_encode(array("statusCode"=>201, "msg"=>"email exists"));
    }

	if ($safe == true) {
        $password=md5($password_1);
        $sql="INSERT INTO users (id,firstName,lastName,profilePic,username,email,password) VALUES ('','$fName','$lName','defaultuser.png','$username','$email','$password')";
        if (mysqli_query($mysqli, $sql)) {
            echo json_encode(array("statusCode"=>200, "msg"=>"success"));
        } 
        else {
            echo json_encode(array("statusCode"=>201, "msg"=>"error"));
        }
        mysqli_close($mysqli);
	}
}

if(isset($_POST['saveuserdetails']))
{
	$username=mysqli_real_escape_string($mysqli,$_POST['username']);
	$name=mysqli_real_escape_string($mysqli,$_POST['name']);
	$email=mysqli_real_escape_string($mysqli,$_POST['email']);
	$password_1=mysqli_real_escape_string($mysqli,$_POST['password_1']);
	$password_2=mysqli_real_escape_string($mysqli,$_POST['password_2']);
	$password_3=mysqli_real_escape_string($mysqli,$_POST['password_3']);

	$ema;$use;$nam;

	$quuee="SELECT email FROM users WHERE username='$sesname'";
	$reesuu=$mysqli->query($quuee);
	$qwe=mysqli_fetch_assoc($reesuu);
	if($email==$qwe["email"])
	{
		$ema=1;
	}
	else
	{
		$ema=0;
	}
	$quee="SELECT name FROM users WHERE username='$sesname'";
	$resuu=$mysqli->query($quee);
	$qw=mysqli_fetch_assoc($resuu);
	if($name==$qw["name"])
	{
		$nam=1;
	}
	else
	{
		$nam=0;
	}
	if($username==$_SESSION['username'])
	{
		$use=1;
	}
	else
	{
		$use=0;
	}

	if($use==0)
	{
	$quu="SELECT username FROM users WHERE username='$username'";
	$ress=$mysqli->query($quu);
		if (mysqli_num_rows($ress)!=0) 
		{
			array_push($errors, "Username Already Exists!");
		}	
	}
	if($nam==0)
	{
	$quee="SELECT name FROM users WHERE name='$name'";
	$resuu=$mysqli->query($quee);
		if (mysqli_num_rows($resuu)!=0)
		{
			array_push($errors, "Name Already Exists!");
		}
	}
	if($ema==0)
	{
	$qee="SELECT email FROM users WHERE email='$email'";
	$rsuu=$mysqli->query($qee);
		if (mysqli_num_rows($rsuu)!=0)
		{
			array_push($errors, "Email ID Already Exists!");
		}
	}

	if (empty($username)) {
		array_push($errors, "Username cannot be empty!");
	}
	if (empty($name)) {
		array_push($errors, "Name cannot be empty!");
	}
	if (empty($email)) {
		array_push($errors, "Email cannot be empty!");
	}
	if(!(empty($password_2)))
	{
		if(empty($password_1))
		{
			array_push($errors, "Please Enter Current Password First!");
		}
		else
		{
			if(empty($password_3))
			{
				array_push($errors, "Please Confirm Your Password!");
			}
			if($password_2!=$password_3 and !(empty($password_3)))
			{
				array_push($errors, "The Two Passwords Don't Match!");
			}
		}
	}
	if (count($errors)==0) {
	if(!(empty($password_2)))
	{
	$password=md5($password_2);
	$sql="UPDATE users SET username='$username',email='$email',password='$password',name='$name' WHERE username='$sesname'";
	$mysqli->query($sql);
	}
	elseif (empty($password_2)) {
	$sql="UPDATE users SET username='$username',email='$email',name='$name' WHERE username='$sesname'";
	$mysqli->query($sql);
	}
	$_SESSION['username']=$username;
	$_SESSION['successs']="Successfully Updated!";
	header('Location: http://localhost/VULCAN/dashboard.php?q=setting');
	}

}
if (isset($_POST['type']) && $_POST['type'] == "login") {
	$username=mysqli_real_escape_string($mysqli,$_POST['username']);
	$password=mysqli_real_escape_string($mysqli,$_POST['pass']);

    $password=md5($password);
    $query="Select * from users where username='$username' and password='$password'";
    $result=$mysqli->query($query);
    if (mysqli_num_rows($result)==1) {
        echo json_encode(array("statusCode"=>200, "msg"=>"success"));
        $_SESSION['username'] = $username;
    }
    else
    {
        echo json_encode(array("statusCode"=>201, "msg"=>"error"));
    }
    mysqli_close($mysqli);
}
if(isset($_GET['logout']))
	{
		unset($_SESSION['username']);
		session_destroy();
		header('Location: http://localhost/Rental-Prime/login.php');
    }
?>