<?php
$this->load->view('header');
?>

<div class="row">
	<h1>Restore Data PIC</h1>
	<div class="col-md-12">
		<a href="#" class="btn btn-primary pull-right" id="add-pic" style="margin-bottom: 2%;">Add</a>
	</div>
	<div class="col-md-12">
		<!--  -->
		<table id="pic" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Phone</th>
	                <th>Address</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php 
	        	if(is_array($pic_data))
	        	{
	        		foreach ($pic_data as $pic) 
	        		{
	        			?>
	        			<tr>
	        				<td><?php echo $pic['name'] ?></td>
	        				<td><?php echo $pic['email'] ?></td>
	        				<td><?php echo $pic['phone'] ?></td>
	        				<td><?php echo $pic['address'] ?></td>
	        				<td>
	        					<a href="#" onclick="return confirm('Restore <?php echo $pic['name']  ?> Are you sure ? ')" class="restore-pic" data-id="<?php echo $pic['id'] ?>">
	        						<span class="glyphicon glyphicon-repeat"></span>	
	        					</a>
	        				</td>
	        			</tr>
	        			<?php
	        		}
	        	}
	        	?>
	        </tbody>
    	</table>
		<!--  -->
	</div>
</div>
<?php
$this->load->view('footer');
?>