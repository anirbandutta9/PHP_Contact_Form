<?php
/* Coded by Anirban Dutta [ http://www.facebook.com/hacker.anirban.dutta ] */
?>
<?php 
session_start();
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is empty";
		$error = true;
	} else {
		$name= test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameErr = "only letters and white space allowed";
			$error = true;
		}
	else {
		$_SESSION['NAME'] = $name;
	}
	}
	if (empty($_POST["email"])) {
		$emailErr = "Email is empty";
		$error = true;
	} else {
		$email = test_input($_POST["email"]);
		if ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
			$emailErr = "E-mail is not valid";
			$error = true;
		}
	else {
		$_SESSION['EMAIL'] = $email;
	}
	}
	if (empty($_POST["website"])) {
		$website = "";
	} else {
		$website = test_input($_POST["website"]);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
			$websiteErr = "Invalid URL"; 
			$error = true;
		}
  }
  if (empty($_POST["comment"])) {
	  $comment = "" ;
  } else {
	  $comment = test_input($_POST["comment"]);
  } 
  if (empty($_POST["gender"])) {
	  $genderErr = "Gender is empty" ;
		$error = true;
  } else {
		$gender = test_input($_POST["gender"]);
	}
	if ($error === false) {
	$_SESSION['issubmit'] = true;
header('location: thank.php');
	}
}
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registration...</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="contact-form">
<style>
.error {color: #FF0000;}
</style>

<h2>Contact Us</h2>
<p><span class="error" >  * required feilds </span></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Name: </label> <input type="text" name="name" value="<?php echo $name; ?>"> <span class="error" >* <?php echo $nameErr; ?></span><br><br>
<label>E-mail: </label> <input type="text" name="email" value="<?php echo $email; ?>"> <span class="error" > * <?php echo $emailErr; ?></span><br><br>
<label>Website: </label> <input type="text" name="website" value="<?php echo $website;?>"><span class="error" > <?php echo $websiteErr ?></span><br><br>
<label>Comment: </label> <textarea name="comment" rows="5" cols="30"> <?php echo $comment;?> </textarea><br><br>
<label>Gender:</label>
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 
<span class="error">* <?php echo $genderErr; ?></span>
<br><br>
<input id="submit" type="submit" name="submit" value="Submit">
<br>
<br>
<center><a style='color:green;' href=http://facebook.com/hacker.anirban.dutta>*** Coded by Anirban *** </a></center>
</form>
</body>
</html>
