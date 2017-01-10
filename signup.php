<?php

ini_set('display_errors', 'On');

session_start();
	
$host="localhost";
$username="root";
$password="";
$db_name="login";
$tbl_name="UserName";

$con=mysqli_connect("$host", "$username", "$password") or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db($con, "$db_name") or die("Failed to connect to MySQL1: " . mysqli_error());

function SignUp() {
    
	global $tbl_name, $con, $db;
	
	if(!empty($_POST['user']) AND !empty($_POST['pass']) AND !empty($_POST['confirm'])) {
		
		if (!preg_match('/\s/', $_POST['user'])){
		    
		    $checkusername = "SELECT * FROM ".$tbl_name." WHERE userName = '".$_POST['user']."'";
		    $rs = mysqli_query($con, $checkusername);
		    if (!mysqli_fetch_array($rs, MYSQLI_NUM)) {
	    	    
	    		$adduser = "INSERT INTO ".$tbl_name." (userName, pass) VALUES ('".$_POST['user']."' , '".$_POST['pass']."')";
	    		    
	    		if ($_POST['pass'] == $_POST['confirm']) {
	        		
	                if(mysqli_query($con, $adduser)) {
	            		
	            		$_SESSION['userName'] = $_POST['user'];
						$_SESSION['login']="1";
	            	    $_SESSION['message'] = "User added successfully";
	            	    Header("Location:home.php");
	            		    
	            	} else {
	            		    
	            	    $_SESSION['message2'] = "Failed to add user";
	            	    Header("Location:index.php");
	            		    
	            	}
	            		
	            } else {
	    		        
	    		        $_SESSION['message2'] = "Passwords do not match";
	    		        Header("Location:index.php");
	    		        
	    		}
	    		
		    } else {
		        
		        $_SESSION['message2'] = "Username already exists";
		        Header("Location:index.php");
		        
		    }
		    
		} else {
			
		    $_SESSION['message2'] = "Username cannot contain spaces";
			Header("Location:index.php");
			
		}
		
	} else {
	    
	    $_SESSION['message2'] = "Username/Password not entered";
		Header("Location:index.php");
		
	}
}

if(isset($_POST['submit'])) {
    
	SignUp();
	
}

?>