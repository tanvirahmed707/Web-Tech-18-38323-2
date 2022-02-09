<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $degreeErr = $dobErr = $bloodgroupErr = "";
	$name = $email = $gender = $degree = $website =  $dob = $bloodgroup = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed";
		  $name = "";
		}
	  }

	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		  $email="";
		}
	  }

	  

	

	  if (empty($_POST["gender"])) {
	    $genderErr = "Gender is required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	}

    if (empty($_POST["degree"])) {
	    $degreeErr = "Degree is required";
	  } else {
	    $degree = test_input($_POST["degree"]);
	  }
	
	  if (empty($_POST["dob"])) {
	    $dobErr = "Value can't be empty";
	  } else {
	    $dob = test_input($_POST["dob"]);
	  }
     

	  if (empty($_POST["bloodgroup"])) {
	    $dobErr = "Value can't be empty";
	  } else {
	    $bloodgroup = test_input($_POST["bloodgroup"]);
	  }




	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		E-mail:
		<input type="text" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>
		
		Gender:
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="female") echo "checked";?>
		value="female">Female
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="male") echo "checked";?>
		value="male">Male
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="other") echo "checked";?>
		value="other">Other
		<span class="error">* <?php echo $genderErr;?></span>
		<br><br>


        Degree:
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="ssc") echo "checked";?>
		value="ssc">SSC
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="hsc") echo "checked";?>
		value="hsc">HSC
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="bsc") echo "checked";?>
		value="bsc">BSc
        <input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="msc") echo "checked";?>
		value="msc">MSc
		<span class="error">* <?php echo $degreeErr;?></span>
		<br><br>




		Date of Birth:
		<label for="dob"><span style="color: red">*</span></label>
    <input type="date" name="dob" id="dob">
    <span style="color: red"><?php echo $dobErr; ?></span><br><br>


	Blood Group:
	<label for="bloodgroup"><span style="color: red">*</span>:</label>
    <select id = "bloodgroup" name="bloodgroup">
    <option value="A+"> A+ </option> 
    <option value="A-"> A- </option>
    <option value="B+"> B+ </option>
    <option value="B-"> B- </option> 
	<option value="AB+"> AB+ </option> 
    <option value="AB-"> AB- </option>
    <option value="O+"> O+ </option>
    <option value="O-"> O- </option> 
       


		<input type="submit" name="submit" value="Submit">
	</form>
	<h2>Your input</h2>
	<?php 
			echo $name."<br>";
			echo $email."<br>";
			echo $gender."<br>";
            echo $degree."<br>";
			echo $dob."<br>";
			echo $bloodgroup."<br>";
           
	 ?>
</body>
</html>