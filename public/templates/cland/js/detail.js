$(function(){
       $.ajaxSetup({
                headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
       	/*biến dùng chung*/
         $(".hideReply").hide();
       	var user_id = $('#form-message').attr('data-id');
        var news_id = $('#form-message').attr('data-newsid');

        $('.post-reply').click(function(e){
           e.preventDefault();
           /*alert('post-reply đã nhận');*/
          var parent_id=$(this).attr('data-parentid');
          var route=$(this).attr('data-route');
         
          $('#contact-form-area-'+parent_id).show();

        });

        $('.form-reply1').submit(function(e){

             e.preventDefault();
            /*alert('helo');*/
           
            var route = $(this).attr('data-route');
            var parent_id = $(this).attr('data-parentid');
            
            var comment = $('#textreply-'+parent_id).val();

            /*alert(route);
            alert(user_id);
            alert(news_id);
            alert(comment);
            alert(parent_id);*/
           $.ajax({
                type:'POST',
                url:route,
                
                data:{
                   
                  'user_id':user_id,
                  'news_id':news_id,
                  'comment':comment,
                  'parent_id':parent_id,
                },
                success:function (data) {
                        if(data==''){
                            $('#error-'+parent_id).html('Bạn chưa viết bình luận');
                        }
                        else{
                            $('#error-'+parent_id).html('');
                            $('#comment-place').html(data.html);
                            $(".hideReply").hide();
                        }
                       
                    
                  
                }
            });
            //alert(route);
           
        });

        $('#form-message').submit(function(e){
             e.preventDefault();
              
            var route = $(this).attr('data-route');
           
            var comment = $("#message1").val();
            var parent_id = 0;
            /*alert(route);
            alert(user_id);
            alert(news_id);
            alert(comment);
            alert(parent_id);*/
           $.ajax({
                type:'POST',
                url:route,
                
                data:{
                   
                  'user_id':user_id,
                  'news_id':news_id,
                  'comment':comment,
                  'parent_id':parent_id,
                },
                success:function (data) {
                        if(data==''){
                            $('#error1').html('Bạn chưa viết bình luận');
                        }
                        else{
                            $('#error1').html('');
                            $('#comment-place').html(data.html);
                            $(".hideReply").hide();
                        }
                       
                    
                  
                }
            });
            //alert(route);
           
        });


        $(':radio').change(function() {
        		var route =$('#form-star').attr('data-route');
            var rate = $(this).val();
  					$.ajax({
                type:'POST',
                url:route,
                
                data:{
                   
                  'user_id':user_id,
                  'news_id':news_id,
                  'rate':rate,
                  
                },
                success:function (data) {
                        
                       $('#check-rate').html('Bạn đã đánh giá thành công!');
                    
                  
                }
            });
				});
    });