<?php
$this->load->view('header');
?>
<div class="row">
	<h1>Company</h1>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
            </tr>
           
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
            </tr>
        </tfoot>
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
        <h4 class="modal-title">Add Company Data</h4>
      </div>
      <div class="modal-body" id="contentBody">
		<!-- <div class="container"> -->
			<!--  -->
			<form class="form-horizontal" id="form-add-company">
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
			    <label for="logo" class="col-sm-2 control-label">Logo</label>
			    <div class="col-sm-10">
			      <input type="file" class="form-control" name="logo" id="logo">
			    </div>
			  </div> 
			  <div class="form-group">
			    <label for="pic" class="col-sm-2 control-label">PIC</label>
			    <div class="col-sm-10">
			      <select name="pic" id="pic" class="form-control">
			      	<option value="">Choose</option>
			      	<?php
			      	if(is_array($pic_data) && count($pic_data) > 0)
			      	{
				      	foreach ($pic_data as $pic) {
				      		?>
				      		<option value="<?php echo $pic['id'] ?>"><?php echo $pic['name'] ?></option>
				      		<?php
				      	}
			      	}
			      	?>
			      </select>
			    </div>
			  </div> 
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" id="insert-company">Save</button>
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