@extends ('templates.admin.master')
@section('title')
Thêm danh mục
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
                                <form action="" method="post" enctype="multipart/form-data" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên người dùng</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                        @error('name')
                                        <div class="alert">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control border-input" placeholder="" value="">
                                            </div>
                                            @error('email')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <input type="text" name="content" class="form-control border-input" placeholder="" value="">
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