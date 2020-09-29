@include('admin.layouts.head')

<body class="  pace-done">
<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay"></div>


    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <img src="{{asset('admin-assets/img/2D-HN.gif')}}" height="100" width="100">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">Account Login</h1>
                    <p>Sign In to your account</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has("success"))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                        <stong>{{session()->get("success")}}</stong>
                    </div>
                @endif
                <form method="POST" action="{{url('login')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="UserId Or Email" autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

@include('admin.layouts.scripts')
