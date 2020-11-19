@extends ('templates.admin.master')
@section('title')
Trang chủ danh mục
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
            }

        });
    });
    $('#selectCat2').change(function() {
                
      //var name =$(this).attr('');
      //console.log(id1);
      // e.preventDefault();
       var id2 =$(this).val();
       //alert(id2);
        $.ajax({
            method: 'GET',
            url: 'http://cland.vn/admin/cat/catChange2/'+id2,
            data: {

             id2: id2,
           
            },
            success:function(data){
                $("#selectCat3").html(data);
            }

        });
    });

     
       
            
        
    </script>
@stop
@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách danh mục</h4>
                                <p class="category success">
                                    @if(Session::has('msg'))
                                    {{Session::get('msg')}}
                                    @else
                                        @if(Session::has('error'))
                                        {{Session::get('error')}}}
                                        @endif
                                    @endif
                                </p>
                                 <br>
                                  <form action="{{route('admin.cat.search')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
@php
function showCategories($cats, $parent_id = 0, $char = '')
{
    foreach ($cats as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->cat_id.'">';
                echo $char . $item->name;
            echo '</option>';
             
            // Xóa chuyên mục đã lặp
            unset($cats[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($cats, $item->cat_id, $char.'|-----');
        }
    }
}
@endphp 
                                                <select name="cat" id="selectCat1" class="form-control border-input">
                                                    <option value="0">Chọn danh mục cấp 1</option>
                                                    @foreach($cat1 as $cat)
                                                    @php
                                                    $select='';
                                                    if($cat->cat_id==$req->cat)
                                                    {
                                                         $select='selected';
                                                    }
                                                    @endphp
                                                    <option {{$select}} value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="cat1" id="selectCat2" class="form-control border-input">
                                                    <option value="0">Chọn danh mục cấp 2</option>
                                                     @foreach($cat5 as $cat)
                                                    @php
                                                    $select='';
                                                    if($cat->cat_id==$req->cat1)
                                                    {
                                                         $select='selected';
                                                    }
                                                    @endphp
                                                    <option {{$select}} value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="cat2" id="selectCat3" class="form-control border-input">
                                                    <option value="0">Chọn danh mục cấp 3</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                               

                                	<div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên danh mục" value="{{$req->name}}">
                                            </div>
                                            
                                        </div>
                                    
                                        <div class="col-md-4">
                                        	<div class="form-group">
		                                        <input type="submit" name="search" value="Tìm kiếm" class="is" />
		                                        <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
	                                        </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{route('admin.cat.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên danh mục</th>

                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        @php
                                            $id = $item->cat_id;
                                            $name = $item->name;
                                            
                                            $urlEdit=route('admin.cat.edit',$id);
                                            $urlDel=route('admin.cat.del',$id);
                                        @endphp
                                        <tr>
                                        	<td>{{$id}}</td>
                                        	<td><a href="{{ $urlEdit }}">{{$name}}</a></td>
                                        	
                                        	
                                        	
                                        	<td>
                                        		<a href="{{ $urlEdit }}"><img src="/public/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a href="{{ $urlDel }}"><img src="/public/templates/admin/assets/img/del.gif" alt="" onclick="return confirm('Bạn có chắc chắn muốn xóa không?') "/> Xóa</a>
                                        	</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
 
                                </table>

								<div class="text-center">
                                    <!--
                                        Hiển thị phân trang
                                    -->
								    

								</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop
        