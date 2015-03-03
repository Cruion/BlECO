<?php include "views/template/header.php";?>
        <!--=========================================================================-->
        <!-- Start Content Section                                                   -->
        <!--=========================================================================-->
<div class="container">
	<h1 class="smallCap">Profile</h1>
	<?php if ($_SESSION['guest'] == "notGuest") {?>
	<div class="row">
    	<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading clearfix">
					<div class="row">
						<div class="col-xs-2">
							<img src="<?php echo $userDetails["userIcon"];?>" class="img-thumbnail" />
						</div>
						<div class="col-xs-9">
							<h3>Name: <?php echo $userDetails["givenName"]; ?> <?php echo $userDetails["familyName"]; ?></h3>
							<br />
							<h4>Username: <?php echo $userDetails["userName"]; ?></h4>
							<br />
							<h4>Group: <?php echo $userDetails["name"]; ?></h4>


						</div>
                    </div>
				</div>
				<div class="panel-body">
					
					<form class="form-horizontal" action="/profile" method="post"  enctype="multipart/form-data">
                <fieldset>
                       <div class="form-group">
                        <label for="body" class="col-lg-2 control-label">Avatar</label>
                        <div class="col-lg-10">
                        	<input placeholder="img/uqjweige_?????????.png OR http://i.imgur.com/???????.jpg" data-toggle="tooltip" data-placement="top" title = "img/uqjweige_?????????.png OR http://i.imgur.com/???????.jpg - Images hosted on this blog are preferred." type="text" class="form-control" id="avatar" name="avatar" value="<?php echo $userDetails["userIcon"]; ?>" onkeyup="avatarChange()" onchange="avatarChange()"></input>
                        </div>
                      </div>
                      <div>
                      	<img id = "avatarPreview" name = "avatarPreview" style ="display:none; margin: 0 auto;" src="<?php echo $userDetails["userIcon"];?>" class="img-thumbnail" />
                      </div>
                     <div class="form-group">
                        <button id="btnSubmit" type="submit" class="form-control btn btn-primary">Save Changes</button>
                    </div>
                </fieldset>
            </form>

					
				</div>
			</div>
		</div>
	</div>
	<?php } else {?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4 class="smallCap">No permission!</h4>
                <p>You do not have permission to post to the blogs.</p>
            </div>
<?php }?>
</div>
			
        <!--=========================================================================-->
        <!-- Stop Content Section                                                    -->
        <!--=========================================================================-->
<script type="text/javascript">

	function avatarChange() {
        var avatar = $("#avatar").val();
        
        
        
        $("#avatarPreview").attr("src", avatar);
        $("#avatarPreview").css("display","block");
    }
    
    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip({html: true});

    });

</script>

<?php include "views/template/footer.php";?>