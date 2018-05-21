<?php 
$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url= $link.$_SERVER['REQUEST_URI']; 

?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Please select background image</h4>
			</div>
		<div class="modal-body">
			<form name="formradio" action="<?php echo $url;?>" method="POST"">
				<input type="hidden" name="userID" value="<?php if(isset($_SESSION["UserId"])){ $userID = $_SESSION["UserId"]; echo $userID;}  ?>"> 
				<input type="hidden" name="update">  
				<label> <input type="radio" name="background" value="1" id="background1"><img src="../sites/default/files/DASHBOARD_PIC_1170X600.jpg"></label>
				<label> <input type="radio" name="background" value="2"  id="background2"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_2.jpg"></label>
				<label> <input type="radio" name="background" value="3"  id="background3"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_3.jpg"></label>
				<label> <input type="radio" name="background" value="4"  id="background4"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_4.jpg"></label>
				<label> <input type="radio" name="background" value="5"  id="background5"><img src="../sites/default/files/DASHBOARD_PIC_1170X600_5.jpg"></label>
		</div>
				<div class="modal-footer">
				<button type="Submit" class="btn btn-default" id="background_save">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>