@extends ('templates.admin.master')
@section('title')
Sửa tin
@stop
@section ('ckfinder')
<script type="text/javascript">
    /* editor1 laf id cuar textarea ma chung ta muon chen ckfinder */
    CKEDITOR.replace( 'editor1',

    {

    
    filebrowserBrowseUrl: '/public/libraries/ckfinder/ckfinder.html',

    filebrowserImageBrowseUrl: '/public/libraries/ckfinder/ckfinder.html?type=Images',

    filebrowserUploadUrl: '/public/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    filebrowserImageUploadUrl: '/public/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'

    });

</script>
@stop
@section('content')
@php
    $id      =  $item->news_id;
    $name    =  $item->name;
    $picture =  $item->picture;
    $author =  $item->author;
    $content  =  $item->content;
    $counter =  $item->counter;
    $cid     =  $item->cid;
    $cname   =  $item->cname;
    $created_at=$item->created_at;
    $pick =   $item->pick;
    $rate =  $item->rate;
    $dia_chi = $item->dia_chi;
    $dien_tich = $item->dien_tich;
@endphp

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa tin</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên truyện</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="{{ $name }}">
                                            </div>
                                            @error('name')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="picture" >
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">     
                                                    <label>Danh mục</label>
                                                    <select name="cat" class="form-control border-input">
                                                        @foreach($cats as $cat)

                                                        @php
                                                            $select='';
                                                            if( $cat->cat_id== $cid ){
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tác giả</label>
                                                <input type="text" name="author" class="form-control border-input" placeholder="" value="{{ $author }}">
                                            </div>
                                        </div>
                                    </div>
                                   
                                     <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea class="ckeditor" id="editor1" name="content">{{ $content }}</textarea> 
                                                
                                            </div>
                                        </div>
                                      
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lượt xem</label>
                                                <input type="text" name="counter" class="form-control border-input"  value="{{$counter}}">
                                            </div>
                                        </div>
     
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @php
                                                $check='';
                                                if($pick==1){
                                                $check='checked';

                                                }
                                                @endphp
                                                <label>Tiêu điểm</label>
                                                <input type="checkbox" name="pick" class="form-control border-input" placeholder="" value="1" {{$check}} >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Đánh giá</label>
                                                <input type="text" name="rate" class="form-control border-input" placeholder="" value="{{ $rate }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="dia_chi" class="form-control border-input" placeholder="" value="{{ $dia_chi }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Diện tích</label>
                                                <input type="text" name="dien_tich" class="form-control border-input" placeholder="" value="{{ $dien_tich }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ngày tạo</label>
                                                <input type="text" name="created_at" class="form-control border-input"  value="{{$created_at}}">
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