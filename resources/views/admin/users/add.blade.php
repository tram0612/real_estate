@extends ('templates.admin.master')
@section('title')
Thêm User
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
                                <h4 class="title">Thêm user</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('admin.users.add')}}" method="post" enctype="mutipart/form-data" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="">
                                            </div>
                                            @error('username')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control border-input" placeholder="Email" value="">
                                            </div>
                                            @error('email')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input"  value="">
                                            </div>
                                            @error('password')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Xác nhận Password</label>
                                                <input type="password" name="passwordconfirm" class="form-control border-input"  value="">
                                            </div>
                                            @error('passwordconfirm')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Chức năng</label>
                                            <select name="role" class="form-control border-input">
                                                    <option disabled selected  value="">-- Chọn danh mục --</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="mod">Mod</option>
                                                    <option value="supermod">SuperMod</option>
                                                    <option value="user">User</option>
                                            </select>
                                        </div>
                                        @error('role')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
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