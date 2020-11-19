@extends ('templates.cland.master')
@section('title')
Chỉnh sửa thông tin
@stop
@section('content')
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <!--Phần bên trái -->
                  
                <div class="col-12">
                    <div class="contact-title">
                        <h2>Chỉnh sửa thông tin cá nhân</h2><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="contact-form-area">
                        <form action="{{route('cland.edit',[$user->username])}}" method="post" enctype="multipart/form-data" >
                                 @csrf  
                                    <!-- lấy dữ liệu của form -->
                                   
                                     

                                   <div class="col-12 ">
                                        <div class="contact-form-area">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <input type="text" name="username" class="form-control" id="name" placeholder="Username" value="{{$user->username}}">
                                                        @error('username')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                                    </div>
                                                    <div class="col-12 ">
                                                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
                                                        @error('email')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                                    </div>
                                                    <div class="col-12 ">
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                        @error('password')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                                    </div>
                                                    <div class="col-12 ">
                                                        <input type="password" name="passwordconfirm" class="form-control" id="passwordconfirm" placeholder="Password Confirm">
                                                        @error('passwordconfirm')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                                    </div>
                                                    
                                                    <div class="col-12 text-center">
                                                        <button class="btn newspaper-btn mt-30 w-100" type="submit">Đăng ký</button>
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
