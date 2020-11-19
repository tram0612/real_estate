@extends ('templates.cland.master')
@section('rightbar')
@widget('rightbar')
@stop
@section('title')
Chi tiết
@stop

@section('content')
 @php

         if(Auth::check()){
           
            $user_id=Auth::id();
          }

 @endphp
 <div class="col-12 col-lg-8">
    <div class="blog-posts-area">

        <!-- Single Featured Post -->
        <div class="single-blog-post featured-post single-post">
            <div class="post-thumb">
                <a href="#"><img src="/storage/app/files/{{$item->picture}}" alt=""></a>
            </div>
            <div class="post-data">
                @php
                $slug = Str::slug($item->cname);
                $news_id=$item->news_id;
                @endphp
                <a href="{{route('cland.cat',[$slug,$item->cat_id])}}" class="post-catagory">{{$item->cname}}</a>
                <a href="#" class="post-title">
                    <h6>{{$item->name}}</h6>
                </a>
                <div class="post-meta">
                    
                    {!!$item->content!!}
                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                        <!-- Tags -->
                        <div class="newspaper-tags d-flex">
                            <span>Tags:</span>
                            <ul class="d-flex">
                                <li><a href="#">finacial,</a></li>
                                <li><a href="#">politics,</a></li>
                                <li><a href="#">stock market</a></li>
                            </ul>
                        </div>

                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center post-like--comments">
                            <a href="#" class="post-like"><img src="/public/templates/cland/img/core-img/rate.png" alt=""> <span>{{$item->rate}}</span></a>
                            <a href="#" class="post-comment"><img src="/public/templates/cland/img/core-img/chat.png" alt=""> <span>{{$item->total_comment}}</span></a>
                        </div>
                       
                          
                        
                    </div>
                        
                </div>
            </div>
        </div>

        <!-- Rate -->
         @if(Auth::check())
        <span>Đánh giá:</span>
        <div id="rating-star" >
        	
        	<form class="rating" id="form-star" data-route="{{route('cland.rate')}}">
        		@csrf
                    @php
                        $check='';
                        for($i=1;$i<=5;$i++){
                            if($rate==$i)
                            {
                                $check='checked';
                            }
                            else{
                                $check='';
                            }
                    @endphp
                    <label>
                        <input {{$check}} type="radio" name="stars" value="{{$i}}" />
                        @php
                            for($j=1;$j<=$i;$j++){
                            @endphp
                            <span class="icon">★</span>
                            @php
                        }
                        @endphp
                    </label>
                    @php
                    }
                    @endphp
					  
					</form>
					<div id="check-rate"></div>
        </div>
        
			  @endif  
        

        <div class="section-heading">
            <h6>Tin liên quan</h6>
        </div>

        <div class="row">
            <!-- Single Post -->
            @php
            foreach($relatedItems as $item){
                $slug = Str::slug($item->name);
                $slugCname = Str::slug($item->cname);
                $urlCat=route('cland.cat',[$slugCname,$item->cid]) ;
                $urlDetail = route('cland.detail',[$slug,$item->news_id]) ;
            @endphp
            <div class="col-12 col-md-3">
                <div class="single-blog-post style-3 mb-80">
                    <div class="post-thumb">
                        <a href="#"><img src="/storage/app/files/{{$item->picture}}" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="{{$urlCat}}" class="post-catagory">{{$item->cname}}</a>
                        <a href="{{$urlDetail}}" class="post-title">
                            <h6>{{$item->name}}</h6>
                        </a>
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
        @php
    function showComments($comments, $parent_id = 0 ,$stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($comments as $key => $item)
    {

        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            $cate_child[] = $item;
            unset($comments[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if($stt != 0)
        {
            echo '<ol class="children">';
        }
        else{
            echo '<ol>';
        }
        
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li class="single_comment_area">
                    <div class="comment-content d-flex">
                        <!-- Comment Author -->
                        <div class="comment-author">
                            <img src="/storage/app/files/user.png" alt="author">
                        </div>
                        <!-- Comment Meta -->
                        <div class="comment-meta">
                            <a href="#" class="post-author">'.$item->username.'</a>
                            <a href="#" class="post-date">'.$item->date.'</a>
                            <p>'.$item->content.'</p>';
                            if(Auth::check()){
                           
                            $comment_id=$item->comment_id;

                            $route=route('cland.postComment');
                            echo '
                            <button id="reply-'.$comment_id.'" class="post-reply" data-id="'.$comment_id.'" data-route="'.$route.'" data-parentid="'.$comment_id.'">Trả lời</button>
                            <!-- Trả lời area -->
                            <div class="hideReply" id="contact-form-area-'.$comment_id.'">
                              <form action="'.$route.'" class="form-reply1" id="reply-'.$comment_id.'" data-route="'.$route.'" data-id="'.$item->user_id.'"  data-parentid="'.$comment_id.'" method="POST">
  
                                <div class="row">
                                  <div class="col-12">
                                    <textarea name="reply" class="form-control" id="textreply-'.$comment_id.'" cols="20" rows="3" placeholder="Message"></textarea>
                                  </div>
                                  <div id="error-'.$comment_id.'" class="col-12" style="color: red">

                                  </div>
                                  <div class="col-12 text-center">
                                    <button name="submit" class="btn newspaper-btn mt-30 w-100" id="submit" type="submit">Gửi trả lời</button>
                                  </div>
                                </div>
                                </form>
                            </div>';
                          
                          }
                          
                          echo '</div>
                    </div>';
                         
               
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showComments($comments, $item->comment_id,++$stt);
            echo '</li>';
        }
        echo '</ol>';
    }

}
@endphp
        <!-- Comment Area Start -->
        <div id="comment-place" class="comment_area clearfix">
            <h5 class="title">Bình luận</h5>

            {{showComments($comments)}}
        </div>
        @php
         if(Auth::check()){
           
            

     
         @endphp
        <div class="post-a-comment-area section-padding-80-0">
            <h4>Viết bình luận</h4>
            
            <!-- Reply Form -->
            <div class="contact-form-area">
                <form action="{{route('cland.postComment')}}" id="form-message" data-route="{{route('cland.postComment')}}" data-newsid="{{$news_id}}" data-id="{{$user_id}}" method="POST">
                  
                    <div class="row">
                        
                        
                        <div class="col-12">
                            <textarea name="message" class="form-control" id="message1" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <div id="error1" class="col-12" style="color: red">
                            
                        </div>
                        <div class="col-12 text-center">
                            <button name="submit" class="btn newspaper-btn mt-30 w-100" id="submit" type="submit">Gửi bình luận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @php
        }
        @endphp
    </div>
</div>
    
       

<!--Hết phần bên trái -->
@stop
@section('message')
<script src="/public/templates/cland/js/detail.js"></script>
@stop