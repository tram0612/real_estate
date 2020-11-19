@extends ('templates.cland.master')
@section('title')
Login
@stop
@section('content')
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <!--Phần bên trái -->
                  
                <div class="col-12">
                    <div class="contact-title">
                        <h2>Đăng nhập</h2><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="contact-form-area">
                        <form action="{{route('cland.login')}}" method="post" enctype="multipart/form-data" >
                                 @csrf  
                                    <!-- lấy dữ liệu của form -->
                                   
                                     

                                   <div class="col-12 ">
                                        <div class="contact-form-area">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <input type="text" name="username" class="form-control" id="name" placeholder="Username">
                                                    </div>
                                                    <div class="col-12 ">
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
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
            