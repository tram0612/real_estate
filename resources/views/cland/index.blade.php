@extends ('templates.cland.master')
@section('rightbar')
@widget('rightbar')
@stop
@section('title')
Trang chủ
@stop
@section('content')
@php
    $slugname= Str::slug($pick->name);
    $slugCname=Str::slug($pick->cname);
@endphp
	<!--Phần bên trái -->
                <div class="col-12 col-md-6 col-lg-8">
             
                    <div class="single-blog-post featured-post">
                        <div class="post-thumb">
                            <a href="{{route('cland.detail',[$slugname,$pick->news_id])}}"><img width="700px" height="600px" src="/storage/app/files/{{$pick->picture}}" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="{{route('cland.cat',[$slugCname,$pick->cid])}}" class="post-catagory">{{$pick->cname}}</a>
                            <a href="{{route('cland.detail',[$slugname,$pick->news_id])}}" class="post-title">
                                <h6>{{$pick->name}}</h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">
                                    <span><i class="fa fa-home"></i> Địa chỉ: {{$pick->dia_chi}}</span>
                                    <br><span><i class="fa fa-folder"></i> Diện tích: {{$pick->dien_tich}} m<sup>2</sup></span>
                                </p>

                                

                                
                                <!-- Post Like & Post Comment -->
                                <div class="d-flex align-items-center">
                                    <a href="#" class="post-like"><img src="/public/templates/cland/img/core-img/rate.png" alt=""> <span>{{$pick->rate}}</span></a>
                                    <a href="#" class="post-comment"><img src="/public/templates/cland/img/core-img/chat.png" alt=""> <span>{{$pick->total_comment}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--Phần 2 cột -->
                    <!--<div class="col-12 col-lg-8">-->
                        <div class="section-heading">
                            <h6>Tin tức</h6>
                        </div>

                        <div class="row">

                            <!-- Single Post -->
                            @php
                            foreach($items as $item){
                                $slug = Str::slug($item->name);
                                $slugCname = Str::slug($item->cname);
                                $urlCat = route('cland.cat',[$slugCname,$item->cid]);
                                $urlDetail = route('cland.detail',[$slug,$item->news_id]);
                               
                          
                            
                            @endphp
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3">
                                    <div class="post-thumb">
                                        <a href="{{$urlDetail}}"><img src="/storage/app/files/{{$item->picture}}" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="{{$urlCat}}" class="post-catagory">{{$item->cname}}</a>
                                        <a href="$urlDetail" class="post-title">
                                            <h6>{{$item->name}}</h6>
                                        </a>
                                        <p class="post-author">
                                                <span><i class="fa fa-home"></i> Địa chỉ: {{$item->dia_chi}}</span>
                                                <br><span><i class="fa fa-folder"></i> Diện tích: {{$item->dien_tich}} m<sup>2</sup></span>
                                        </p>
                                        
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="/public/templates/cland/img/core-img/rate.png" alt=""> <span>{{$item->rate}}</span></a>
                                            <a href="#" class="post-comment"><img src="/public/templates/cland/img/core-img/chat.png" alt=""> <span>{{$item->total_comment}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                            }
							@endphp
                            <!-- Single Post -->
                            
                        </div>
                         <nav aria-label="Page navigation example">
                            <ul class="pagination mt-50">
                                {{$items->links()}}
                            </ul>
                        </nav>
                       
                    <!--</div>-->
                    <!--Hết phần 2 cột -->
                    
                       
                </div>
                <!--Hết phần bên trái -->
@stop