@extends ('templates.admin.master')
@section('title')
Thêm danh mục
@stop
@section('catChange')
<script type="text/javascript">
	$('#selectCat1').change(function() {
	        	
	          //var name =$(this).attr('');
	          //console.log(id1);
	          // e.preventDefault();
	           var id1 =$(this).val();
	           //alert(id1);
		    		$.ajax({
		       			method: 'GET',
		        		url: 'http://cland.vn/admin/cat/catChange/'+id1,
		        		data: {

		           		 id1: id1,
		               
		      			},
		      			success:function(data){
		      				 $("#selectCat2").html(data);

              //alert(data.success);

           			}

		    		});

			       //return true;
					});

	 
       
            
        
    </script>
@stop

@section('content')
@php
	
	

@endphp

		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="header">
								<h4 class="title">Thêm danh mục</h4>
							</div>
							<div class="content">
								<form action="{{route('admin.cat.add')}}" method="post" enctype="mu" >
									@csrf 
									<!-- lấy dữ liệu của form -->
								   
									<div class="row">
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Tên danh mục</label>
												<input type="text" name="name" class="form-control border-input" placeholder="Tên danh mục" value="">
											</div>
											@error('name')
											<div class="alert">{{ $message }}</div>
											@enderror
										</div>
									</div>

									
									<div class="row">
										<div class="col-md-6">
												<div class="form-group">
													<label>Nếu là danh mục con</label>
													<select name="cat" id="selectCat1" class="form-control border-input">

														<option value="0">--Chọn danh mục cấp 1--</option>
														@foreach($cat1 as $cat)

														
														<option value="{{$cat->cat_id}}">{{$cat->name}}</option>
														
														@endforeach
													</select>
												</div>
												
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
												<div class="form-group">
													<select name="cat1" id="selectCat2" class="form-control border-input">
														<option value="0">--Chọn danh mục cấp 2--</option>
														<!-- @isset($cat2)
														
														
														@foreach($cat2 as $cat)
														
														
														<option value="{{$cat->cat_id}}">{{$cat->name}}</option>
														
														@endforeach
														@endisset -->
													</select>
												</div>

										</div>
									</div>
									<div class="text-center">
										<input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>


	   @stop