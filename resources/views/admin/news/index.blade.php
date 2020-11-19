@extends ('templates.admin.master')
@section('title')
Trang chủ News
@stop
@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách truyện</h4>
                                <p class="category success">
                                    @if(Session::has('msg'))
                                    {{Session::get('msg')}}
                                    @else
                                        @if(Session::has('error'))
                                        {{Session::get('error')}}}
                                        @endif
                                    @endif
                                </p>
                                <form action="{{route('admin.news.search')}}" method="post">
                                    @csrf
                                	<div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên truyện" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            @widget('select')
                                         </div>
                                        </div>
                                        <div class="col-md-4">
                                        	<div class="form-group">
		                                        <input type="submit" name="search" value="Tìm kiếm" class="is" />
		                                        <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
	                                        </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{route('admin.news.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên truyện</th>
                                        <th>Hình ảnh</th>
                                    	<th>Tác giả</th>
                                        <th>Pick</th>
                                        <th>Counter</th>
                                    	<th>Danh mục</th>
                                        <th>Ngày tạo</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        @php
                                            $id = $item->news_id;
                                            $name = $item->name;
                                            $author= $item->author;
                                            $picture='/storage/app/files/'.$item->picture;
                                            $counter=$item->counter;
                                            $cname=$item->cname;
                                            $pick=$item->pick;
                                            $created_at=$item->created_at;
                                            $curentPage = $items->currentPage();
                                            $urlEdit=route('admin.news.edit',[$curentPage,$author,$id]);
                                            $urlDel=route('admin.news.del',[$curentPage,$author,$id]);
                                        @endphp
                                        <tr>
                                        	<td>{{$id}}</td>
                                        	<td><a href="{{ $urlEdit }}">{{$name}}</a></td>
                                        	<td><img src="{{$picture}}" width="60px" height="60px"></td>
                                        	<td>{{$author}}</td>
                                            <td>{{$pick}}</td>
                                            <td>{{$counter}}</td>
                                            <td>{{$cname}}</td>
                                            <td>{{$created_at}}</td>
                                        	
                                        	<td>
                                        		<a href="{{ $urlEdit }}"><img src="/public/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a onclick="return confirm('Bạn có chắc chắn muốn xóa không?') " href="{{ $urlDel }}"><img src="/public/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
 
                                </table>

								<div class="text-center">
                                    <!--
                                        Hiển thị phân trang
                                    -->
								    {{ $items->links() }}

								</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop
        