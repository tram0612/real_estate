 @include('templates.admin.header')
<body>

<div class="wrapper">
	 @include('templates.admin.sidebar')

    <div class="main-panel">
		 @include('templates.admin.navbar')

        @yield('content')

       @include('templates.admin.footer')