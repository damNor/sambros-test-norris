</div>
	 
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script> -->
	 <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	 <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var base_url = "<?php echo $base_url; ?>";
		
		$(document).ready(function()
		{
			$('.table').DataTable();

			$('#add-company').on('click',function(e){
				e.preventDefault();
				// alert('add-company');
				$('#myModal').modal('show');
			});
			
			$('#form-add-company').on('submit',function(e){
				e.preventDefault();
				// alert('submit');
				$.ajax({
					url:'company/create',
					method: 'post',
					data:$('#form-add-company').serialize(),
					beforeSend:function(){
						$('#insert-company').val("Insert to db...");
					},
					success:function(data)
					{
						var obj = JSON.parse(data);
						console.log('data',obj.message);

						alert(obj.message);	
						$('#form-add-company')[0].reset();
						$('#myModal').modal('hide');
						
						if(obj.result == 'success')
							window.location.reload();
						// $('#company').DataTable().ajax.reload();
					}
				});
			});

			$('#add-pic').on('click',function(e){
				e.preventDefault();
				// alert('add-pic');
				$('#myModal').modal('show');
			});

			$('#form-add-pic').on('submit',function(e){
				// alert('add-pic');
				e.preventDefault();
				// alert('submit');
				$.ajax({
					url:'pic/create',
					method: 'post',
					data:$('#form-add-pic').serialize(),
					beforeSend:function(){
						$('#insert-pic').val("Insert to db...");
					},
					success:function(data){
						console.log('data',data);
						$('#form-add-pic')[0].reset();
						$('#myModal').modal('hide');
						window.location.reload();
					}
				});
			});

			$('.delete-company').on('click',function(e){
				e.preventDefault();
				$.ajax({
					url:'company/delete',
					method: 'post',
					data: {'entry_id': $(this).data('id')} ,
					success:function(data){
						console.log('data',data);
						window.location.reload();
					}
				});
			});

			$('.delete-pic').on('click',function(e){
				e.preventDefault();
				$.ajax({
					url:'pic/delete',
					method: 'post',
					data: {'entry_id': $(this).data('id')} ,
					success:function(data){
						console.log('data',data);
						window.location.reload();
					}
				});
			});

			$('.restore-company').on('click',function(e){
				e.preventDefault();
				$.ajax({
					url: base_url+'/restore_data',
					method: 'post',
					data: {'entry_id': $(this).data('id')} ,
					success:function(data){
						console.log('data',data);
						window.location.reload();
					}
				});
			});

			$('.restore-pic').on('click',function(e){
				e.preventDefault();
				$.ajax({
					url: base_url+'/restore_data',
					method: 'post',
					data: {'entry_id': $(this).data('id')} ,
					success:function(data){
						console.log('data',data);
						window.location.reload();
					}
				});
			});

			$.getJSON('http://localhost/codeIgniter-3_1_10/home/get',function( data ) 
			{
				var items = [];
				$.each( data, function( key, value ) 
				{
					console.log(value);
					items.push("<li id='"+key+"' >" + value.title+ "&nbsp;|&nbsp;"+value.date_added+"" + value.file_name+" &nbsp;|&nbsp;"+value.date_added+"</li>");
				});
				$("<ul/>", {
					"class":"list-files",
					html: items.join( "" )
				}).appendTo("#uploaded-files")
			});

			$('#fileUploadForm').submit(function(event){
				event.preventDefault();

				var form = $('#fileUploadForm')[0];
				console.log(form);

				var data = new FormData(this);
				console.log(data);

				// data.append("CustomField", "This is some extra data, testing");

				$("#btnSubmit").prop("disabled", true);

				$.ajax({
					// enctype: 'multipart/form-data',
					url:  'http://localhost/codeIgniter-3_1_10/upload',
					type: "POST",
					data:new FormData(this),
		            processData:false,
		            contentType:false,
		            cache:false,
		            async:false,
					timeout: 600000,
					success: function(data)
					{
						$("#result").text(data.message);
						console.log("Success : ", data);
						$("#btnSubmit").prop("disabled", false);

						$.getJSON('http://localhost/codeIgniter-3_1_10/home/get_last',function( data ) 
						{
							var items = [];
							$.each( data, function( key, value ) 
							{
								console.log(value);
								items.push("<li id='"+key+"' >" + value.title+ "&nbsp;|&nbsp;"+value.file_name+" &nbsp;|&nbsp;"+value.date_added+"</li>");
							});
							$("<ul/>", {
								"class":"list-files",
								html: items.join( "" )
							}).appendTo("#uploaded-files")
						});
					},
					error: function(e)
					{
						$("#result").text(e.responseText);
						console.log("ERROR : ",e);
						// $("#btnSubmit").prop("disabled",true);
					}
				});
			});

		});
		
	
	</script>
</body>
</html>