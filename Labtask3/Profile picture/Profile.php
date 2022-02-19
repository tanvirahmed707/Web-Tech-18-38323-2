<?php


$err_fileupload="";
$has_error = false;
		
if(isset($_POST["submit"]))
{


	
           
     if(empty($_FILES["fileToUpload"]))
     {
          $has_error = true;
          $err_fileupload= "Upload photo";   
     }
     else if($_FILES["fileToUpload"] != "jpg" && $_FILES["fileToUpload"] != "png" && $_FILES["fileToUpload"] != "jpeg") 
     {
       
          $has_error = true;
          $err_fileupload= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       
     }
     else if ($_FILES["fileToUpload"]["size"] > 4048000) {
          $has_error = true;
          $err_fileupload= "Sorry, your file is too large.";
        }
     else
     {
          $has_error =false; 

     }


}	
	
	
?>


<!DOCTYPE html>
<html>
<body>



<form action="" method="post" enctype="multipart/form-data">
 <table border =" 1px solid black">
      <tr>
           <td> Picture Upload</td>
           <td>
           <input type="file" name="fileToUpload" ><br>
           <span><?php echo $err_fileupload;?></span>
          </td>
      </tr>
      <tr colspan="2">
           <td ><input type="submit" value="Upload Image" name="submit"></td>
      </tr>
 </table>
 
</form>

</body>


</html>