<?php
include "../assets/classes/website_class.php";
$website = new Website();

$name=$_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$cellphone = $_POST['cellphone'];
$a_jobid = $_POST['id'];
//$path = "img/".$_POST['pp'];
$position = $_POST['job_title'];
//echo $website->checkAppliExist($email,$position);
if($website->checkAppliExist($email,$position) == 0){
if($_FILES['resume']['name']!="")
	{
		$file_array = $_FILES['resume'];
		
			if($file_array['error'])
			{
				
			}
			else{
				$allow = array('pdf','docx');
				$fileExt = explode('.',$file_array['name']);
				$fileActualExt = strtolower(end($fileExt));
				if(!in_array($fileActualExt, $allow))
				{
					
				}
				else
				{
					$new_filename = round(microtime(true)).'.'.$fileActualExt;
					move_uploaded_file($file_array['tmp_name'] ,'../assets/cv/'.$new_filename);
					
				$resume= $new_filename;	
				/*if(!unlink($path))
				{
					echo "not Deleted";
				}	*/	
				?>
				</div>
				<?php  

				$website->addApplication($name, $surname, $email, $cellphone, $resume,$a_jobid);					
			}
		}	
	}
include "../assets/emails/application-confirmation.php";
include "../assets/emails/send_confirmation_to_company.php";
$id = md5("no_exist");
}
else{
	$id = md5("exist");
}
?>
	<script type="text/javascript">window.location = "../application-message?id=<?php echo $id ?>"</script>
	