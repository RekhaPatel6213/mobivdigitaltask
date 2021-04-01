<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<section class="row mt-4">
	<div class="col-md-8 col-md-offset-2 mx-auto">
		<h2>User List</h2>

		<?php if($this->session->userdata('success') !== '') { ?>
			<div class="alert alert-success" role="alert">
			  <?php echo $this->session->userdata('success'); $this->session->set_userdata(['success' =>'']); ?>
			</div>
		<?php } ?>
		<?php if($this->session->userdata('error') !== '') { ?>
			<div class="alert alert-danger" role="alert">
			  <?php echo $this->session->userdata('error'); $this->session->set_userdata(['error' =>'']); ?>
			</div>
		<?php } ?>

		<section class="border border-secondary rounded p-3 bg-light" id="profileDiv">
			<table class="table table-striped table-hover" id="UserTable">
			  	<thead>
				    <tr>
						<th>Sr. No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile Number</th>
						<th>Dolor</th>
				    </tr>
			  	</thead>
			  	<tbody>

			  	<?php
	                if(!empty($users)){
	                    foreach($users as $key => $user){
	            ?>  
			    <tr>
			      <th><?php echo $key+1; ?></th>
			      <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
			      <td><?php echo $user['email']; ?></td>
			      <td><?php echo $user['mobile_number']; ?></td>
			      <td>
			        <a href="<?php echo base_url(); ?>admin/edituser/<?php echo $user['id']; ?>">Edit</a> | 
	                <a href="javascript:void(0);" onclick="deleteUser('<?php echo $user['id']; ?>');">Delete</a>
			      </td>
			    </tr>
			    <?php } } else { ?>
	                <tr>
	                    <td colspan="5" align="center">No Users Found</td>
	                </tr>  
	            <?php } ?>
			  </tbody>
			</table>
		</section>
	</div>
</section>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<script type="text/javascript">
	$('#UserTable').DataTable();

	function deleteUser(id){
        // For deleting 
        var r = confirm('Are you sure? You want to Delete this User','Confirmation Dialog')
        if (r == true) {
            document.location = "<?php echo base_url(); ?>admin/deleteuser/"+id;
        }    
    }
</script>