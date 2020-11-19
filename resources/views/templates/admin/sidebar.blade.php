<div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://vinaenter.edu.vn" class="simple-text">AdminCP</a>
            </div>

            <ul class="nav">
                @php
                $uri = Request::fullUrl();
                $arr = array(
                    'cat' => array(
                        'title' => 'Danh sách danh mục',
                        'class' => 'ti-map'
                    ),
                    'news' => array(
                        'title' => 'Danh sách tin',
                        'class' => 'ti-view-list-alt'
                    ),
                    'users' => array(
                        'title' => 'Danh sách người dùng',
                        'class' => 'ti-user'
                    ),
                    'contact' => array(
                        'title' => 'Danh sách liên hệ',
                        'class' => 'ti-panel'
                    ),
                    'comment' => array(
                        'title' => 'Danh sách bình luận',
                        'class' => 'ti-user'
                    ),
                    'rate' => array(
                        'title' => 'Danh sách đánh giá',
                        'class' => 'ti-user'
                    ),
                );
                $active='';
                
                foreach ($arr as $key => $item){

                    if ( strpos($uri,$key) !== false ){
                   
                        $active = ' style="color:red"';
                    }
                    else{
                   
                        $active ='';
                    }
                 
                @endphp
                    

                    
               

                
            	<li>
                    <a href="{{route('admin.'.$key.'.index')}}">
                        <i class="{{$item['class']}}"></i>
                        <p  {!!$active!!}>{{$item['title']}}</p>
                    </a>
                </li>
                @php
                }
                 @endphp
            	 
                
            </ul>
    	</div>
    </div>