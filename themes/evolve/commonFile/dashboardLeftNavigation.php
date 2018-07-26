<?php 
$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url= $link.$_SERVER['REQUEST_URI']; 
// 2.2.11 - UPDATE Picture
// Send - 
// UserID, Image
// Response -
// N/A.
if(isset($_POST["PictureUpdate"])) {
$target_dir =__DIR__ . '/../uploads/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
//if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
//}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$imageBlob = base64_encode(file_get_contents("sites/all/themes/evolve/uploads/".$name));
$postImageData['ID'] = $_SESSION['LinkId'];
$postImageData['EntityName'] = "Persons";
$postImageData['Photo'] = $imageBlob;
$outImage = GetAptifyData("11",$postImageData); 
unlink("sites/all/themes/evolve/uploads/".$name);
    
}
if(isset($_SESSION["UserId"])) {
	$data = "UserID=".$_SESSION["UserId"];
	$details = GetAptifyData("4", $data,""); // #_SESSION["UserID"];
}
?>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dashboard-left-nav">

	<div class="navbar-collapse">
		<div class="user-avatar">
			<a  style="cursor: pointer; color:white;" id="uploadImageButton"><div class="ava-circle" style='background: url(https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/ImageField/Persons/<?php echo $_SESSION['LinkId'];?>/Photo/?NoImageObject=CRM.NoPhotoAvailable&amp;ds=636652401978000000) no-repeat center center'></div></a> 
			<span class="user-name cairo"><?php echo $details['Firstname'].' '.$details['Lastname'];?></span>
		</div>
		<ul class="nav navbar-nav navbar-left">
			<li class="dashboard-nav">
				<a href="dashboard">
					<div class="dashboard-button-name"><span class="left-nav-icon dashboard-icon"></span>Dashboard</div>
				</a>
				</li>
			<li class="dashboard-nav">
				<a href="your-details">
					<div class="dashboard-button-name"><span class="left-nav-icon account-icon"></span>Account</div>
				</a>
			</li>
			<li class="dashboard-nav">
				<a href="your-purchases">
					<div class="dashboard-button-name"><span class="left-nav-icon purchases-icon"></span>Purchases</div>
				</a>
			</li>
			<li class="dashboard-nav">
				<a href="subscriptions">
					<div class="dashboard-button-name"><span class="left-nav-icon subscription-icon"></span>Subscriptions</div>
				</a>
			</li>
			<li class="dashboard-nav">
				<?php  if($details['MemberTypeID']!="1"):?>
				<a href="/renewmymembership">
					<div class="dashboard-button-name"><span class="left-nav-icon renew-icon"></span>Renew</div>
				</a>
				<?php else:?>
				<a href="/membership-question">
					<div class="dashboard-button-name"><span class="left-nav-icon renew-icon"></span>Join a member</div>
				</a>
				<?php endif;?>
				
			</li>
		</ul>
	</div>
</div >
<div id="uploadImage" style="display:none;">
	<form action="<?php echo $url;?>" method="POST" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="PictureUpdate">
	</form>
</div>
<!-----this is for dialog function JS--->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>