<?php
$this->load->view('header');
?>
<div class="row">
	<h1>Restore Data Company</h1>
	<div class="col-md-12">
		<a href="#" class="btn btn-primary pull-right" id="add-company" style="margin-bottom: 2%;">Add</a>
	</div>
	<div class="col-md-12">
		<!--  -->
		<table id="company" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Phone</th>
	                <th>Address</th>
	                <th>Logo</th>
	                <th>PIC</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php 
	        	if(is_array($company_data))
	        	{
	        		foreach ($company_data as $company) 
	        		{
	        			?>
	        			<tr>
	        				<td><?php echo $company['name'] ?> </td>
	        				<td><?php echo $company['phone'] ?> </td>
	        				<td><?php echo $company['address'] ?> </td>
	        				<td><?php echo $company['logo'] ?> </td>
	        				<td><?php echo $company['pic_name'] ?> </td>
	        				<td>
	        					<a href="#" onclick="return confirm('Restore <?php echo $company['name']  ?> Are you sure ? ')" class="restore-company" data-id="<?php echo $company['id'] ?>">
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