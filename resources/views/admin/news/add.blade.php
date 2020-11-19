@extends ('templates.admin.master')
@section('title')
Thêm tin
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm tin</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('admin.news.add')}}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên tin</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên truyện" value="{{old('name')}}">
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
                                            @error('picture')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    @widget('select')
                                                </div>
                                                @error('cat')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                   
                                     <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea class="ckeditor" id="editor1" name="content">{{old('content')}}</textarea> 
                                                
                                            </div>
                                            @error('content')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                      
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tiêu điểm</label>
                                                <input type="checkbox" name="pick" class="form-control border-input" placeholder="" value="1">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Đánh giá</label>
                                                <input type="text" name="rate" class="form-control border-input" placeholder="" value="{{old('rate')}}">
                                            </div>
                                            @error('rate')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="dia_chi" class="form-control border-input" placeholder="" value="{{old('dia_chi')}}">
                                            </div>
                                            @error('dia_chi')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Diện tích</label>
                                                <input type="text" name="dien_tich" class="form-control border-input" placeholder="" value="{{old('dien_tich')}}">
                                            </div>
                                            @error('dien_tich')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ngày tạo</label>
                                                <input type="text" name="created_at" class="form-control border-input"  value="{{old('created_at')}}">
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