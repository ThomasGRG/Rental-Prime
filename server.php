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

if(isset($_POST['type']) && $_POST['type'] == "updateuser")
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
        $sql="UPDATE users SET firstName='$fName',lastName='$lName',profilePic='defaultuser.png',username='$username',email='$email',password='$password'";
        if (mysqli_query($mysqli, $sql)) {
            echo json_encode(array("statusCode"=>200, "msg"=>"success"));
        } 
        else {
            echo json_encode(array("statusCode"=>201, "msg"=>"error"));
        }
        mysqli_close($mysqli);
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