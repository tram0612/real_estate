@extends('templates.cland.master')
@section('title')
Danh mục
@stop
@section('rightbar')
@widget('rightbar')
@stop
@section('content')
<div class="col-12 col-lg-8">
	<div class="section-heading">
        <h6>{{$nameCat}}</h6>
    </div>

    <div class="row">

        <!-- Single Post -->
       @php
        foreach($items as $item){
            $slug = Str::slug($item->name);
            $slugCname = Str::slug($item->cname);
            $urlCat=route('cland.cat',[$slugCname,$item->cid]) ;
             $urlDetail = route('cland.detail',[$slug,$item->news_id]) ;
        
       
        
        @endphp
        <div class="col-12 col-md-6">
            <div class="single-blog-post style-3">
                <div class="post-thumb">
                    <a href="{{$urlDetail}}"><img src="/storage/app/files/{{$item->picture}}" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="{{$urlCat}}" class="post-catagory">{{$item->cname}}</a>
                    <a href="{{$urlDetail}}" class="post-title">
                        <h6>{{$item->name}}</h6>
                    </a>
                    
                    <p class="post-author">
                        <span><i class="fa fa-home"></i> Địa chỉ: {{$item->dia_chi}}</span>
                        <br><span><i class="fa fa-folder"></i> Diện tích: {{$item->dien_tich}} m<sup>2</sup></span>
                        <br><span><i class="fa fa-calendar"></i> {{$item->created_at}}</span>
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
    </div>
     <nav aria-label="Page navigation example">
        <ul class="pagination mt-50">
            {{$items->links()}}
        </ul>
    </nav>
   
</div>

@stop