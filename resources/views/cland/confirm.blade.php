@extends ('templates.cland.master')
@section('title')
Xác thực
@stop
@section('content')
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <!--Phần bên trái -->
                  
                <div class="col-12">
                    <div class="contact-title">
                        <h2>Xác thực</h2><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="contact-form-area">
                        <form action="" method="post" enctype="multipart/form-data" >
                                 @csrf  
                                    <!-- lấy dữ liệu của form -->
                                   
                                     

                                   <div class="col-12 ">
                                        <div class="contact-form-area">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <input type="text" name="username" class="form-control" id="name" placeholder="Username"
                                                        value="{{old('username')}}">
                                                        @error('username')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                                    </div>
                                                    <div class="col-12 ">
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{old('password')}}">
                                                        @error('password')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                                    </div>
                                                    
                                                    <div class="col-12 text-center">
                                                        <button class="btn newspaper-btn mt-30 w-100" type="submit">Đăng nhập</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                    </div>
                </div>
                
                
            </div>
                <!--Hết phần bên trái -->

                <!--Phần bên phải -->

@stop                
            