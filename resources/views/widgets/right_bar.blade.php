<!--Phần bên phải -->

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                    
                    <div class="section-heading-1">
                        <h6>Tin mới nhất</h6>
                    </div>

                    
                    <!-- -------------------------------------------- -->
                    <div class="popular-news-widget mb-30">
                        @php
                            foreach($new as $item){
                                $slug = Str::slug($item->name);
                               
                                $urlDetail = route('cland.detail',[$slug,$item->news_id]) ;
                                
                                @endphp
                    <div class="single-blog-post style-2">
                            <div class="post-thumb">
                                <a href="{{$urlDetail}}"><img src="/storage/app/files/{{$item->picture}}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{$urlDetail}}" class="post-title">
                                    <h6>{{$item->name}}</h6>
                                </a>
                                <p>
                                    <span><i class="fa fa-home"></i> Địa chỉ: {{$item->dia_chi}}</span>
                                    <br><span><i class="fa fa-folder"></i> Diện tích: {{$item->dien_tich}} m<sup>2</sup></span>
                                    <br><span><i class="fa fa-calendar"></i> {{$item->created_at}}</span>
                                </p>
                            </div>
                        </div>
                        @php
                    }
                    @endphp
                    </div>
                     <!-- Xem nhiều -->
                    <br><br>
                    <br>
                    <div class="section-heading-1">
                        <h6>Xem nhiều</h6>
                    </div>
                        <!-- Popular News Widget -->
                    <div class="popular-news-widget mb-30">
                        <!-- Single Popular Blog -->
                        @php
                        foreach($hot as $item){
                         $slug = Str::slug($item->name);
                                
                               
                                $urlDetail = route('cland.detail',[$slug,$item->news_id]) ;
                                
                        @endphp
                        
                        <div class="single-blog-post style-2">
                            <div class="post-thumb">
                                <a href="{{$urlDetail}}"><img src="/storage/app/files/{{$item->picture}}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{$urlDetail}}" class="post-title">
                                    <h6>{{$item->name}}</h6>
                                </a>
                                <p>
                                    <span><i class="fa fa-home"></i> Địa chỉ: {{$item->dia_chi}}</span>
                                    <br><span><i class="fa fa-folder"></i> Diện tích: {{$item->dien_tich}} m<sup>2</sup></span>
                                    <br><span><i class="fa fa-calendar"></i> {{$item->created_at}}</span>
                                </p>
                            </div>
                        </div>
                        @php
                        }
                        @endphp
                        <!-- Single Popular Blog -->
                        
                    </div>
                </div>
                <!--Hết phần bên phải -->