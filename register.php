<?php
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     require ('register-process.php');
// }
   
?>
<section id="register" class="pt-5">    
    <legend class="text-lavander text-center fw-bold pt-5">Create an Account</legend>
    <div class="d-flex justify-content-center px-3 py-0">
        <div class="col-lg-12 container pb-5">
            <div class="card card-outline card-success">
                <div class="form-row hide">
                <?php
                    if(isset($_SESSION['messages']))
                    {
                        ?>                            
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['messages']; ?></strong>
                        <button type="button" class="btn-close" id="clear-btn" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['messages']);
                    }
                ?>
                </div>
                <div class="card-body">
                    <form action="" id="create_new_user">
                        <div class="form-row col-md-12 lavander-form mx-auto">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group  my-3">
                                    <input type="text" name="firstname" class="form-control" required placeholder="First Name*" value="<?php echo isset($firstname) ? $firstname : '' ?>">
                                </div>
                                <div class="form-group  my-3">
                                    <input type="text" name="lastname" class="form-control" required placeholder="Last Name*" value="<?php echo isset($lastname) ? $lastname : '' ?>">
                                </div>
                                <div class="form-group hide">
                                    <label for="" class="control-label hide">User Role</label>
                                    <input type="hidden" name="type" value="2">                                    
                                </div>                                
                            </div>
                            <div class="col-md-6 mx-auto">
                                <div class="input-group phone-input-group px-0 mx-0  my-3">
                                    <span class="input-group-text phone-input-group-text">+63 </span>
                                    <input type="text" class="form-control" name="phone_number" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required placeholder="Phone Number*" value="<?php echo isset($phone_number) ? $phone_number : '' ?>">
                                </div>
                                <div class="form-group my-3">
                                    <input type="email" class="form-control" name="email" required placeholder="Email Address*" value="<?php echo isset($email) ? $email : '' ?>">
                                    <small id="#msg"></small>
                                </div>
                                <div class="form-group my-3">
                                    <input type="password" class="form-control" name="password" <?php echo !isset($id) ? "required":'' ?> placeholder="Password*">
                                    <small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password":'' ?></i></small>
                                </div>
                                <div class="form-group my-3">
                                    <input type="password" class="form-control" name="cpass" <?php echo !isset($id) ? 'required' : '' ?> placeholder="Confirm password*">
                                    <small id="pass_match" data-status=''></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right justify-content-center d-flex mb-5">
                            <button type="submit" name="create_new_user" class="btn btn-primary me-2">Continue</button>
                            <button class="btn btn-secondary" type="button" onclick="location.href = '<?php base() ?>home'">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#create_new_user').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		if($('[name="password"]').val() != '' && $('[name="cpass"]').val() != ''){
			if($('#pass_match').attr('data-status') != 1){
				if($("[name='password']").val() !=''){
					$('[name="password"],[name="cpass"]').addClass("border-danger")
					end_load()
					return false;
				}
			}
		}
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('startnewfund')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>