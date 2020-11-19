@extends ('templates.admin.master')
@section('title')
Sửa comment
@stop
@section('content')
@php
   
    $content = $item->content;


@endphp

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa comment</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nội dung</label><br>
                                                <textarea  id="content" rows="10" cols="60" name="content">{{$content}}</textarea>
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