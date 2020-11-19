
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                @php
                if(Auth::check()){ // /*kiểm tra đã login chưa?*/
                    $user=Auth::user();
                    $username=$user->username;
                    $link = route('auth.logout');
                    $tt='Logout';
                    }
                    else{
                    $username='Khách';
                     $link = route('auth.login');
                     $tt='Login';
                    }
                @endphp
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/admin">Xin chào {{$username}}</a>
                    <a class="navbar-brand" href="{{$link}}">{{$tt}}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="http://vinenter.edu.vn">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
