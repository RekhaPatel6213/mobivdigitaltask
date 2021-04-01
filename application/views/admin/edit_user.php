<center><h2> User Edit </h2></center>
<section class="col-md-6 col-md-offset-2 mx-auto border border-secondary rounded p-3 bg-light">
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open_multipart("admin/edituser/".$user['id'], array("class"=>"orizontal-form mt-3","id"=>"edituserform","name"=>"edituserform")); ?>
    <?php echo form_hidden("edituser",'edit'); ?>
    <?php echo form_hidden("id", $user['id']); ?>

  	<div class="row">
        <div class="col-sm-6 col-xs-12 mb-3">
          	<div class="input-field">
              	<label for="first_name" class="form-label">First Name *</label>
                <input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?= $user['first_name']; ?>" tabindex="1" class="form-control" minlength="3"  maxlength="20"/>
          	</div>
        </div>
        <div class="col-sm-6 col-xs-12 mb-3">
          	<div class="input-field">
          		<label for="last_name" class="form-label">Last Name *</label>
             	<input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?= $user['last_name']; ?>" tabindex="2" class="form-control"  minlength="1" maxlength="20"/>
          	</div>
        </div>
  	</div>
    <div class="row">
        <div class="col-sm-6 col-xs-12 mb-3">
            <div class="input-field">
            	<label for="email" class="form-label">Email Address *</label>
                <input type="email" id="email" name="email" placeholder="Email Address" value="<?= $user['email']; ?>" tabindex="3" class="form-control" maxlength="50" readonly disabled/>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12 mb-3">
        	<div class="input-field">
          		<label for="mobile_number" class="form-label">Mobile Number *</label>
             	<input type="Number" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?= $user['mobile_number']; ?>" tabindex="4" class="form-control" minlength="10" maxlength="12" />
          	</div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-sm-12 col-xs-12 mb-3">
            <div class="input-field">
	            <label class="form-label" for="customFile">Default file input example</label>
				<input type="file" class="form-control" id="customFile" accept="image/*"/>
			</div>
        </div> 
    </div> -->
    <div class="row">
        <div class="col-sm-12 col-xs-12 mb-3">
            <div class="input-field">
            	<label for="bio" class="form-label">Bio</label>
                <textarea id="bio" name="bio" placeholder="Bio" rows="2" class="form-control" tabindex="6" ><?= $user['bio']; ?></textarea>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12 mb-3">
            <div class="input-field">
            	<label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" placeholder="Address" rows="2" class="form-control" tabindex="7" ><?= $user['address']; ?></textarea>
            </div>
        </div> 
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
	  	<button type="submit" name="submit" tabindex="8" id="updateProfile" class="btn btn-primary">Update</button>
	  	<button type="button" name="cancle" tabindex="9" id="cancle" class="btn btn-danger" onclick="location.href='<?php echo base_url('admin');?>';">Cancle</button>
	</div>
    <?php echo form_close(); ?>
</section>