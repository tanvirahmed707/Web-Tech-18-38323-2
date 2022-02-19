<?php
	

	
	$currpass="";
	$err_currpass="";
	$newpass="";
	$err_newpass="";
	$retypepass="";
	$err_retypepass="";
	$hasError = false;
	
	if(isset($_POST["submit"]))
    {

		if(empty($_POST["currpass"])){
			$err_currpass=" * Current Password required";
			$hasError = true;
		}
        
		elseif(strlen($_POST["currpass"]) < 8){
			$err_currpass="*Password must be 8 characters long";
			$hasError = true;
		}
		else{
			$currpass=$_POST["currpass"];
		}




		if(empty($_POST["newpass"])){
			$err_newpass=" *New Password required";
			$hasError = true;
		}
		elseif(strlen($_POST["newpass"]) < 8){
			$err_newpass=" *Password must be 8 characters long";
			$hasError = true;
		}
        elseif($_POST["currpass"]==$_POST["newpass"])
        {
            $err_newpass="This password is same to current pass";
			$hasError = true;
        }
		else{
			$newpass=$_POST["newpass"];
		}



		if(empty($_POST["retypepass"])){
			$err_retypepass=" *Retype new Password required";
			$hasError = true;
		}
		elseif(strlen($_POST["retypepass"]) < 8){
			$err_retypepass=" *Password must be 8 characters long";
			$hasError = true;
		}
        elseif($_POST["retypepass"]!=$_POST["newpass"])
        {
            $err_retypepass="Enter right  password ";
			$hasError = true;
        }
		else{
			$retypepass=$_POST["retypepass"];
		}



        if(!$hasError)
        {
            echo "Suceesfull";
        }

    }    

	
	
?>
<html>
	<head>
		<title>Change Password</title>
	</head>
	<body>
		
		<hr>
		<form action="" method="post">
			<fieldset>
				<legend>Change Password</legend>
				<table>
					
					<tr>
						<td align="right">Current Password:</td>
						<td><input type="password" name="currpass"><span><?php echo $err_currpass;?></span></td>
					</tr>


                    <tr>
						<td align="right">New Password:</td>
						<td><input type="password" name="newpass"><span><?php echo $err_newpass;?></span></td>
					</tr>


					<tr>
						<td align="right"> Retype new Password:</td>
						<td><input type="password" name="retypepass"><span><?php echo $err_retypepass;?></span></td>
					</tr>
					
					
					
				</table>


			</fieldset>
			<hr>
             
               <br><br>
              <input type="submit" name="submit" value="Submit"> 
	
		          </fieldset>
		
		</form>
	</body>
	
</html>