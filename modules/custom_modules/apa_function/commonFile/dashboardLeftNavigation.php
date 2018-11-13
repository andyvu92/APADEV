<?php 
$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url= $link.$_SERVER['REQUEST_URI']; 
// 2.2.11 - UPDATE Picture
// Send - 
// UserID, Image
// Response -
// N/A.
if(isset($_POST["PictureUpdate"])) {
//$target_dir =__DIR__ . '/../uploads/';

$target_dir = dirname(__FILE__,5).'/themes/evolve/uploads/';
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
if ($_FILES["fileToUpload"]["size"] > 2100000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
$imageBlob = base64_encode(file_get_contents("sites/all/themes/evolve/uploads/".$name));
$postImageData['ID'] = $_SESSION['LinkId'];
$postImageData['EntityName'] = "Persons";
$postImageData['Photo'] = $imageBlob;
$outImage = aptify_get_GetAptifyData("11",$postImageData); 
unlink("sites/all/themes/evolve/uploads/".$name);
    
}
if(isset($_SESSION["UserId"])) {
	$data = "UserID=".$_SESSION["UserId"];
	$details = aptify_get_GetAptifyData("4", $data,""); // #_SESSION["UserID"];
}
?>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dashboard-left-nav">

	<div class="navbar-collapse">
		<div class="user-avatar">
			<?php 
				$AptifyAuthI = 'https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=Jing.Hu@aptifyAPAAUS.local&Password=APA%pw!58';
				$AuthTokenI = curlRequest($AptifyAuthI, "Get", "");
				$AuthTokenI = json_decode($AuthTokenI, true);
				$AuthTokenI = $AuthTokenI["TokenId"];
			?>
			<a  style="cursor: pointer; color:white;" id="uploadImageButton"><div class="ava-circle" style='background: url(https://aptifyweb.australian.physio/AptifyServicesAPI/services/ImageField/Persons/<?php echo $_SESSION['LinkId'];?>/Photo?NoImageObject=CRM.NoPhotoAvailable&amp;ds=636682564840400000<?php echo "&AptifyAuthorization=DomainWithContainer%20".$AuthTokenI; ?>) no-repeat center center'></div></a> 
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
					<div class="dashboard-button-name"><span class="left-nav-icon renew-icon"></span>Join the APA</div>
				</a>
				<?php endif;?>
				
			</li>
		</ul>
	</div>
</div >

<!-- UPLOAD IMAGE POPUP -->
<div id="uploadImage-container" style="display:none;">
	<span class="close-popup"></span>
	<div id="uploadImage">
		<form action="<?php echo $url;?>" method="POST" enctype="multipart/form-data">
			<div class="avatar-upload">
				<div class="avatar-edit">
					<input type='file' id="imageUpload" name="fileToUpload" accept=".png, .jpg, .jpeg" />
					<label for="imageUpload"></label>
				</div>
				<div class="avatar-preview">
					<div id="imagePreview" style="background-image: url(/sites/default/files/dashboard-icon/upload-image-placeholder.png);">
					</div>
				</div>
			</div>
			<input id="upload-btn" type="submit" value="Save image" name="PictureUpdate">
			<div id="checkMessage" class="display-none">
				<span>Oops! The image you uploaded is too big.</span></br>
				<span>Please make sure it's less than 2MB in size.</span>
			</div>
			<script>
				function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#imagePreview').css('background-image', 'url('+e.target.result +')');
						$('#imagePreview').hide();
						$('#imagePreview').fadeIn(650);
					}
					reader.readAsDataURL(input.files[0]);
				}
				}
				$("#imageUpload").change(function() {
					readURL(this);
				});

				$(document).ready(function () {
					$('#imageUpload').change(function () {
						if (this.files.length > 0) {
							$.each(this.files, function (index, value) {
								if( Math.round((value.size / 1024)) > 2000 ){
									$('#uploadImage #checkMessage').removeClass('display-none');
									$('#uploadImage #upload-btn').prop( "disabled", true );
								}
								else{
									$('#uploadImage #checkMessage').addClass('display-none');
									$('#uploadImage #upload-btn').prop( "disabled", false );
								}
							});
						}
					});
				});
			</script>
		</form>
	</div>
</div>
<!-- END UPLOAD IMAGE POPUP -->