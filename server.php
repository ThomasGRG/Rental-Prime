<?php 
session_start();
$host="localhost";
$user="root";
$password="";
$db="rentalprime";
$mysqli=new mysqli("localhost",$user,$password,$db);

if(isset($_POST['type']) && $_POST['type'] == "register")
{
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
    }
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
if(isset($_POST['type']) && $_POST['type'] == "logout")
{
	unset($_SESSION['username']);
	session_destroy();
	echo json_encode(array("statusCode"=>200));
}

if(isset($_POST['type']) && $_POST['type'] == "statuscheck")
{
	if(isset($_SESSION['username'])){
		echo json_encode(array("statusCode"=>200, "username"=>$_SESSION['username']));
	}
	else{
		echo json_encode(array("statusCode"=>201));
	}
}

if(isset($_POST['type']) && $_POST['type'] == "fetchlatest")
{
	$query="Select id,itemName,pic from items order by id desc limit 9";
	$result=$mysqli->query($query);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	echo json_encode($rows);
}

if(isset($_POST['type']) && $_POST['type'] == "fetchitem")
{
	$id = mysqli_real_escape_string($mysqli,$_POST['id']);
	$query="Select * from items where id = '$id'";
	$result=$mysqli->query($query);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	echo json_encode($rows);
}

if(isset($_POST['type']) && $_POST['type'] == "addtocart")
{
	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$itemID = mysqli_real_escape_string($mysqli,$_POST['itemID']);
	$itemName = mysqli_real_escape_string($mysqli,$_POST['itemName']);
	$pic = mysqli_real_escape_string($mysqli,$_POST['pic']);
	$price = mysqli_real_escape_string($mysqli,$_POST['price']);
	$deposit = mysqli_real_escape_string($mysqli,$_POST['deposit']);
	$days = mysqli_real_escape_string($mysqli,$_POST['days']);
	$count = mysqli_real_escape_string($mysqli,$_POST['count']);
	$dateStart = mysqli_real_escape_string($mysqli,$_POST['dateStart']);
	$dateEnd = mysqli_real_escape_string($mysqli,$_POST['dateEnd']);
	
	$sql="INSERT INTO cart (username,itemID,itemName,pic,price,deposit,count,days,dateStart,dateEnd) VALUES ('$username','$itemID','$itemName','$pic','$price','$deposit','$count','$days','$dateStart','$dateEnd')";
	if (mysqli_query($mysqli, $sql)) {
		echo json_encode(array("statusCode"=>200, "msg"=>"success"));
	} 
	else {
		echo json_encode(array("statusCode"=>201, "msg"=>"error"));
	}
	mysqli_close($mysqli);
}

if(isset($_POST['type']) && $_POST['type'] == "fetchcart")
{
	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	
	$query="Select * from cart where username = '$username'";
	$result=$mysqli->query($query);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	echo json_encode($rows);
	mysqli_close($mysqli);
}

if(isset($_POST['type']) && $_POST['type'] == "removecartitem")
{
	$id = mysqli_real_escape_string($mysqli,$_POST['id']);
	
	$query="delete from cart where id = '$id'";
	if (mysqli_query($mysqli, $query)) {
		echo json_encode(array("statusCode"=>200, "msg"=>"success"));
	} 
	else {
		echo json_encode(array("statusCode"=>201, "msg"=>"error"));
	}
	mysqli_close($mysqli);
}

if(isset($_POST['type']) && $_POST['type'] == "editcartitem")
{
	$id = mysqli_real_escape_string($mysqli,$_POST['id']);
	
	$query="select * from cart where id = '$id'";
	$result=$mysqli->query($query);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	echo json_encode($rows);
	mysqli_close($mysqli);
}

if(isset($_POST['type']) && $_POST['type'] == "editcart")
{
	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$id = mysqli_real_escape_string($mysqli,$_POST['id']);
	$itemID = mysqli_real_escape_string($mysqli,$_POST['itemID']);
	$itemName = mysqli_real_escape_string($mysqli,$_POST['itemName']);
	$pic = mysqli_real_escape_string($mysqli,$_POST['pic']);
	$price = mysqli_real_escape_string($mysqli,$_POST['price']);
	$deposit = mysqli_real_escape_string($mysqli,$_POST['deposit']);
	$days = mysqli_real_escape_string($mysqli,$_POST['days']);
	$count = mysqli_real_escape_string($mysqli,$_POST['count']);
	$dateStart = mysqli_real_escape_string($mysqli,$_POST['dateStart']);
	$dateEnd = mysqli_real_escape_string($mysqli,$_POST['dateEnd']);
	
	$sql="UPDATE cart SET username='$username',itemID='$itemID',itemName='$itemName',pic='$pic',price='$price',deposit='$deposit',count='$count',days='$days',dateStart='$dateStart',dateEnd='$dateEnd' WHERE id='$id'";
	if (mysqli_query($mysqli, $sql)) {
		echo json_encode(array("statusCode"=>200, "msg"=>"success"));
	} 
	else {
		echo json_encode(array("statusCode"=>201, "msg"=>"error"));
	}
	mysqli_close($mysqli);
}
?>