@extends ('templates.admin.master')
@section('title')
Sửa danh mục
@stop
@section('content')
@php
    
    $id = $item->cat_id;
    $name = $item->name;
    $parent_id =$item ->parent_id;
    $namecat='';

@endphp
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

</script>
@stop
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa danh mục</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="{{ $name }}">
                                            </div>
                                            @error('name')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Là con của danh mục</label>
                                                @php
                                                 if($cat5==null){
                                                    $namecat='';
                                                }
                                                else{
                                                    $namecat=$cat5->name;
                                                }
                                                @endphp
                                                <input type="text" name="namecat" class="form-control border-input" placeholder="Họ tên" value="{{$namecat}}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <label style="font-size: 18px; font-weight: bold;">Chọn danh mục</label>
                                    <br>
                                    <div class="row">
                                    
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="checkbox" id="check-cat" name="check" value="yes">
                                                <label>Không là con của danh mục nào</label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Là con của danh mục cấp 1</label>
                                                <select name="cat" id="selectCat1" class="form-control border-input">
                                                    <option value="0">Chọn danh mục cấp 1</option>
                                                    @foreach($cat1 as $cat)
                                                    @php
                                                    $select='';
                                                    if($cat->cat_id==$parent_id)
                                                    {
                                                         $select='selected';
                                                    }
                                                    @endphp
                                                    <option {{$select}} value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Là con của danh mục cấp 2</label>
                                                <select name="cat1" id="selectCat2" class="form-control border-input">
                                                    <option value="0">Chọn danh mục cấp 2</option>
                                                    
                                                    
                                                    
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