@extends ('templates.admin.master')
@section('title')
Login
@stop
@section('content')
@php
    
    

@endphp

        <div class="content">
            @if (Session::has('msg'))
            <p>{{Session::get('msg')}}</p>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Login</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('auth.login')}}" method="post" enctype="multipart/form-data" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input"  value="">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    
                                    
                                   
                                    
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Đăng nhập" />
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