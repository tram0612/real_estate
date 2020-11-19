<!-- Navbar Area -->
@php
    function showCategories($menu, $parent_id = 0 ,$stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($menu as $key => $item)
    {

        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            $cate_child[] = $item;
            unset($menu[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        
        echo '<ul class="dropdown">';
        foreach ($cate_child as $key => $item)
        {
            $slug=Str::slug($item->name);
            // dd($slug);
            $urlCat=route('cland.cat',[$slug,$item->cat_id]);
            if($item->name==='Liên hệ')
            {
                $urlCat=route('cland.contact');
            }
            if($item->name==='Home')
            {
                $urlCat=route('cland.index');
            }
            
            // Hiển thị tiêu đề chuyên mục
            echo '<li><a href="'.$urlCat.'">'.$item->name;
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($menu, $item->cat_id,++$stt);
            echo '</a></li>';
        }
        echo '</ul>';
    }

}
@endphp
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="/public/templates/cland/img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                {{showCategories($menu)}}
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
         @if (Session::has('msg'))
            <p style="color: blue;font-weight: bold">{{Session::get('msg')}}</p>
            @endif  
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
    
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">