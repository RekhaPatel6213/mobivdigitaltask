<section class="row">
	<?php if ($this->session->userdata('mobivUserID')) { ?>
		<center><h2> My Profile </h2></center>
		<section class="col-md-6 col-md-offset-2 mx-auto border border-secondary rounded p-3 bg-light" id="profileDiv">
	        <form action="" method="post" id="profileform" class="horizontal-form" enctype="multipart/form-data">
	        	<div id="profileErrorMsg"></div>
	        	<input type="hidden" name="id" id="userid" value="<?= $userdata['id']; ?>">
	          	<div class="row">
	                <div class="col-sm-6 col-xs-12 mb-3">
	                  	<div class="input-field">
	                      	<label for="first_name" class="form-label">First Name *</label>
	                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required value="<?= $userdata['first_name']; ?>" tabindex="1" class="form-control" minlength="3"  maxlength="20"/>
	                  	</div>
	                </div>
	                <div class="col-sm-6 col-xs-12 mb-3">
	                  	<div class="input-field">
	                  		<label for="last_name" class="form-label">Last Name *</label>
	                     	<input type="text" id="last_name" name="last_name" placeholder="Last Name" required value="<?= $userdata['last_name']; ?>" tabindex="2" class="form-control"  minlength="1" maxlength="20"/>
	                  	</div>
	                </div>
	          	</div>
	            <div class="row">
	                <div class="col-sm-6 col-xs-12 mb-3">
	                    <div class="input-field">
	                    	<label for="email" class="form-label">Email Address *</label>
	                        <input type="email" id="email" name="email" placeholder="Email Address" required value="<?= $userdata['email']; ?>" tabindex="3" class="form-control" maxlength="50" readonly disabled/>
	                    </div>
	                </div>
	                <div class="col-sm-6 col-xs-12 mb-3">
	                	<div class="input-field">
	                  		<label for="mobile_number" class="form-label">Mobile Number *</label>
	                     	<input type="Number" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required value="<?= $userdata['mobile_number']; ?>" tabindex="4" class="form-control" minlength="10" maxlength="12" />
	                  	</div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 col-xs-12 mb-3">
	                    <div class="input-field">
				            <label class="form-label" for="customFile">Default file input example</label>
							<input type="file" class="form-control" id="customFile" accept="image/*"/>
						</div>
	                </div> 
	            </div>

	            <div class="row">
	                <div class="col-sm-12 col-xs-12 mb-3">
	                    <div class="input-field">
	                    	<label for="bio" class="form-label">Bio</label>
	                        <textarea id="bio" name="bio" placeholder="Bio" rows="2" class="form-control" tabindex="6" ><?= $userdata['bio']; ?></textarea>
	                    </div>
	                </div> 
	            </div>
	            <div class="row">
	                <div class="col-sm-12 col-xs-12 mb-3">
	                    <div class="input-field">
	                    	<label for="address" class="form-label">Address</label>
	                        <textarea id="address" name="address" placeholder="Address" rows="2" class="form-control" tabindex="7" ><?= $userdata['address']; ?></textarea>
	                    </div>
	                </div> 
	            </div>
	            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
				  	<button type="submit" name="submit" tabindex="8" id="updateProfile" class="btn btn-primary">Update</button>
				</div>
	        </form>
	    </section>
	<?php } else {?> 
	    <section class="col-md-6 col-md-offset-2 mx-auto border border-secondary rounded p-3 bg-light mt-4" id="signUpDiv" style="display: none;">
	    	<center><h2> New User Sign-Up </h2></center>
	        <form action="" method="post" id="userSignUpform" class="horizontal-form">
	        	<div id="signupErrorMsg"></div>
	          	<div class="row">
	                <div class="col-sm-6 col-xs-12 mb-3">
	                  	<div class="input-field">
	                      	<label for="first_name" class="form-label">First Name *</label>
	                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required value="" tabindex="1" class="form-control" minlength="3"  maxlength="20"/>
	                  	</div>
	                </div>
	                <div class="col-sm-6 col-xs-12 mb-3">
	                  	<div class="input-field">
	                  		<label for="last_name" class="form-label">Last Name *</label>
	                     	<input type="text" id="last_name" name="last_name" placeholder="Last Name" required value="" tabindex="2" class="form-control"  minlength="1" maxlength="20"/>
	                  	</div>
	                </div>
	          	</div>
	            <div class="row">
	                <div class="col-sm-6 col-xs-12 mb-3">
	                    <div class="input-field">
	                    	<label for="signgup_email" class="form-label">Email Address *</label>
	                        <input type="email" id="signgup_email" name="signgup_email" placeholder="Email Address" required value="" tabindex="3" class="form-control" maxlength="50"/>
	                    </div>
	                </div>
	                <div class="col-sm-6 col-xs-12 mb-3">
	                	<div class="input-field">
	                  		<label for="mobile_number" class="form-label">Mobile Number *</label>
	                     	<input type="Number" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required value="" tabindex="4" class="form-control" minlength="10" maxlength="12" />
	                  	</div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-6 col-xs-12 mb-3">
	                  	<div class="input-field">
	                      	<label for="password" class="form-label">Password *</label>
	                        <input type="password" id="password" name="password" placeholder="Password" required value="" tabindex="5" class="form-control" minlength="3"  maxlength="20"/>
	                  	</div>
	                </div>
	                <div class="col-sm-6 col-xs-12 mb-3">
	                  	<div class="input-field">
	                      	<label for="confirmpassword" class="form-label">Confirm Password *</label>
	                        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required value="" tabindex="6" class="form-control"  minlength="3" maxlength="20"/>
	                  	</div>
	                </div>
	            </div>
	            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
				  	<button type="submit" name="submit" tabindex="7" id="signUpUser" class="btn btn-primary">Sign-Up</button>
				</div>
				<p>Goto Login? <a href="javascript:void(0);" class="signInBtn">Click here</a> </p>
	        </form>
	    </section>
	    <section class="col-md-4 col-md-offset-2 mx-auto border border-secondary rounded p-3 bg-light mt-4" id="signInDiv">
	    	<center><h2> User Sign-In </h2></center>
	        <form action="" method="post" id="userSignInform" class="horizontal-form">
	        	<div id="signinErrorMsg"></div>  
	            <div class="mb-3">
	                <div class="input-field">
	                	<label for="useremail" class="form-label">Email Address *</label>
	                    <input type="email" id="useremail" name="useremail" placeholder="Email Address" required value="" tabindex="1" class="form-control" maxlength="50"/>
	                </div>
	            </div>
	            <div class="mb-3">
	              	<div class="input-field">
	                  	<label for="password" class="form-label">Password *</label>
	                    <input type="password" id="userpassword" name="password" placeholder="Password" required value="" tabindex="2" class="form-control" minlength="3"  maxlength="20"/>
	              	</div>
	            </div>
	            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
				  	<button type="submit" name="submit" tabindex="3" id="signInUser" class="btn btn-primary">Sign-In</button>
				  	<!-- <button type="button" name="New User Sign-Up" tabindex="4" id="signUpBtn" class="btn btn-primary">New User Sign-Up</button> -->
				</div>
				<p class="mb-3">Forgotten your Password? <a href="javascript:void(0);" id="forgotPassBtn">Click here</a> to reset your Password.</p>
				<p>Not a member? <a href="javascript:void(0);" id="signUpBtn">Register</a></p>
	        </form>
	    </section>
	    <section class="col-md-4 col-md-offset-2 mx-auto border border-secondary rounded p-3 bg-light mt-4" id="forgotPasswordDiv" style="display: none;">
	    	<center><h2>Forgot Password</h2></center>
	        <form action="" method="post" id="forgotPasswordform" class="horizontal-form">
	        	<div id="forgoterrormsg"></div>  
	            <div class="mb-3">
	                <div class="input-field">
	                	<label for="forgotemail" class="form-label">Email Address *</label>
	                    <input type="email" id="forgotemail" name="forgotemail" placeholder="Email Address" required value="" tabindex="1" class="form-control" maxlength="50"/>
	                </div>
	            </div>
	            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
				  	<button type="submit" name="submit" tabindex="3" id="forgotPassword" class="btn btn-primary">Submit</button>
				</div>
				<p>Goto Login? <a href="javascript:void(0);" class="signInBtn">Click here</a> </p>
	        </form>
	    </section>
	<?php } ?>
</section>

<script type="text/javascript">
	$(document).ready(function() {
	    $(window).load(function() {
	        $('#overlay').hide();
	    });

	    $("#forgotPassBtn").click(function(e) {
	    	$("#signUpDiv, #signInDiv").hide();
	    	$("#forgotPasswordDiv").show();
	    });

	    $(".signInBtn").click(function(e) {
	    	$("#signUpDiv, #forgotPasswordDiv").hide();
	    	$("#signInDiv").show();
	    });

	    $("#signUpBtn").click(function(e) {
	    	$("#signInDiv, #forgotPasswordDiv").hide();
	    	$("#signUpDiv").show();
	    });

	    $("#signUpUser").click(function(e) {
	    	//Jquery Form Validations
		    $("#userSignUpform").validate({
		        ignore: [],
		        rules: {
		        	firstname: "required",
		            first_name: "required",
		            last_name: "required",
		            signgup_email: {
		                required: true,
		                email: true
		            },
		            mobile_number: {
		                required: true,
		                number: true,
		                minlength: 10,
		                maxlength: 12
		            },
		            password: {
		                required: true,
		                minlength: 3
		            },
		            confirmpassword: {
		                required: true,
		                minlength: 3,
		                equalTo: "#password"
		            }
		        },
		        messages: {
		            first_name: "Please Enter First Name",
		            last_name: "Please Enter Last Name",
		            signgup_email: {
		        		required: "Please Enter Email Address",
		        		email:  "Please Enter a Valid Email Address",
		        	},
		            mobile_number: {
		                required: "Please Enter Contact Number",
		                number: "You Can Enter Only Numbers",
		                minlength: "Your Contact Number Must Be At Least 10 Characters"
		            },
		            password: {
		                required: "Please Enter Password",
		                minlength: "Your Password Must Be At Least 3 Characters"
		            },
		            confirmpassword: {
		                required: "Please Enter Confirm Password",
		                minlength: "Your Confirm Password Must Be At Least 3 Characters",
		                equalTo: "Passwords Did Not Match"
		            }
		        },
		        errorPlacement: function (error, element) {
		            error.insertAfter( element );
		        },
		        submitHandler: function(form) {
		        	$("#overlay").show();
		            $.post(siteurl+'user/saveusersignupdate', $("#userSignUpform").serialize(), function(data) {
		                if (data === "true") {
		                	$('#signupErrorMsg').html('');
		                    $("#forgotPasswordDiv, #signUpDiv, #signInDiv").hide();
		                    $('#userSignUpform').each(function() {
		                        this.reset();
		                    });
		                    $("#overlay").hide();
		                } else if (data === "exists") {
		                    $("#overlay").hide();
		                    $('#signupErrorMsg').html('<div class="alert alert-danger">Email Already Exists.</div>');
			                return false;
		                } else if (data === "invalidemail") {
		                    $("#overlay").hide();
		                    $('#signupErrorMsg').html('<div class="alert alert-danger">Invalid Email Address.</div>');
			               return false;
		                } else {
		                    $("#overlay").hide();
		                }
		                return false;
		            });
		        },
		        invalidHandler: function(event, validator) {}
		    });
		});

		$("#signInUser").click(function(e) {
		    //Jquery Form Validations
		    $("#userSignInform").validate({
		        rules: {
		        	useremail: {
		                required: true,
		                email: true
		            },
		            password: {
		                required: true,
		                minlength: 3
		            }
		        },
		        messages: {
		        	useremail: {
		        		required: "Please Enter Email Address",
		        		email:  "Please Enter a Valid Email Address"
		        	},
		            password: {
		                required: "Please Enter Password",
		                minlength: "Your Password Must Be At Least 3 Characters"
		            }
		        },
		        errorPlacement: function (error, element) {
			    	error.insertAfter(element);
		        },
		        submitHandler: function(form) {
		            $("#overlay").show();
		            var email = $("#useremail").val();
		            var pwd = $("#userpassword").val();
		            $.post(siteurl+'user/login', {'email': email, 'password': pwd}, function(data) {
		            	if (data === "Admin") {
		                    $("#overlay").hide();
		                    window.location.href = siteurl + 'admin';
		                } else if (data === 'Success') {
		                	window.location.replace(siteurl);
		                } else {
		                	$('#signinErrorMsg').html('<div class="alert alert-danger">Invalid Login Credentials.</div>');
		                    $("#overlay").hide();
		                    return false;
		                }
		            });
		            return false;
		        },
		        invalidHandler: function(event, validator) {}
		    });
		});

		$("#forgotPassword").click(function(e) {
			//Jquery Form Validations
		    $("#forgotPasswordform").validate({
		        ignore: [],
		        rules: {
		            forgotemail: {
		                required: true,
		                email: true
		            }
		        },
		        messages: {
		        	forgotemail: {
		        		required: "Please Enter Email Address",
		        		email:  "Please Enter a Valid Email Address",
		        	   },
		        },
		        errorPlacement: function (error, element) {
			    	error.insertAfter(element);
		        },
		        submitHandler: function(form) {
		            var email = $("#forgotemail").val();
		            $("#overlay").show();
		            $.post(siteurl+'user/forgotPassword', {'email': email}, function(data) {
		            	var sp = data.split("_");

		                if (sp[0] === 'true') {
		                	$("#overlay").hide();
		                	$('#forgoterrormsg').html('<div class="alert alert-success">We have sent a reset password to your email account.</div>');
		                  	//window.location.replace(siteurl);                	
		                } else if (sp[0] === 'false') {
		                	$('#forgoterrormsg').html('<div class="alert alert-danger">'+sp[1]+'</div>');
		                    return false;
		                }
		            });
		        },
		        invalidHandler: function(event, validator) {}
		    });
		});

		$("#updateProfile").click(function(e) {
	    	//Jquery Form Validations
		    $("#profileform").validate({
		        ignore: [],
		        rules: {
		        	firstname: "required",
		            first_name: "required",
		            last_name: "required",
		            mobile_number: {
		                required: true,
		                number: true,
		                minlength: 10,
		                maxlength: 12
		            }
		        },
		        messages: {
		            first_name: "Please Enter First Name",
		            last_name: "Please Enter Last Name",
		            mobile_number: {
		                required: "Please Enter Contact Number",
		                number: "You Can Enter Only Numbers",
		                minlength: "Your Contact Number Must Be At Least 10 Characters"
		            }
		        },
		        errorPlacement: function (error, element) {
		            error.insertAfter( element );
		        },
		        submitHandler: function(form) {
		        	$("#overlay").show();
					var data;
				    data = new FormData();
				    data.append( 'customFile', $( '#customFile' )[0].files[0] );
				    data.append( 'id', $("#userid").val() );
				    data.append( 'first_name', $("#first_name").val() );
				    data.append( 'last_name', $("#last_name").val() );
				    data.append( 'mobile_number', $("#mobile_number").val() );
				    data.append( 'bio', $("#bio").val() );
				    data.append( 'address', $("#address").val() );

					e.preventDefault(); 
			        $.ajax({
						url:siteurl+'user/updateProfile',
						type:"post",
						data:data,
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						success: function(data){
						  	if (data === "true") {
			                    $("#overlay").hide();
			                    $('#profileErrorMsg').html('<div class="alert alert-success">Profile data updated successfully.</div>');
			                } else {
			                	$("#overlay").hide();
			                	$('#profileErrorMsg').html('<div class="alert alert-danger">Something wrong.Please Try Again..</div>');
			                    return false;
			                }
			            }
			        });
		        },
		        invalidHandler: function(event, validator) {}
		    });
		});
	});
</script>