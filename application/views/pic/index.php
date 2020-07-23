<?php
$this->load->view('header');
?>

<div class="row">
	<h1>PIC</h1>
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
	        				<td></td>
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add PIC Data</h4>
      </div>
      <div class="modal-body" id="contentBody">
		<!-- <div class="container"> -->
			<!--  -->
			<form class="form-horizontal" id="form-add-pic">
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">Phone Number</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="address" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="address" rows="3" cols="1" id="address"></textarea>
			    </div>
			  </div> 
			   <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="email" id="email" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" id="insert-pic">Save</button>
			    </div>
			  </div>
			</form>
			<!--  -->
		<!-- </div>  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php
$this->load->view('footer');
?>