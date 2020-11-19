 @php
    function showComments($data, $parent_id = 0 ,$stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($data as $key => $item)
    {

        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            $cate_child[] = $item;
            unset($data[$key]);
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
            showComments($data, $item->comment_id,++$stt);
            echo '</li>';
        }
        echo '</ol>';
    }

}
@endphp
        <!-- Comment Area Start -->
      
            <h5 class="title">Bình luận</h5>

            {{showComments($data)}}
        <script src="/public/templates/cland/js/detail.js"></script>