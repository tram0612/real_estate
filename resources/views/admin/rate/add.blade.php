@extends ('templates.admin.master')
@section('title')
Thêm đánh giá
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
                                <h4 class="title">Thêm đánh giá</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên người dùng</label>
                                                <input type="number" name="user_id" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Đánh giá</label><br>
                                                <input type="number" name="rate" class="form-control border-input" placeholder="" value="">
                                            </div>
                                            @error('rate')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên tin</label>
                                                <input type="number" name="news_id" class="form-control border-input" placeholder="" value="">
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