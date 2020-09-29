@include('admin.layouts.head')
<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{asset('admin-assets/img/profile-photos/1.png')}}"
                                     alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <p class="mnp-name">{{Auth::user()->name}}</p>
                                <span class="mnp-desc">{{Auth::user()->email}}</span>
                            </a>
                        </div>
                    </div>

                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul id="mainnav-menu" class="list-group">
                        <li class="list-header">Navigation</li>
                        <li class="{{Request::is('/') ? 'active-sub' : ''}}">
                            <a href="{{url('')}}">
                                <i class="fa fa-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{Request::is('organization') || Request::is('organization/*') ? 'active-sub' : ''}}">
                            <a href="{{url('organization')}}">
                                <i class="fa fa-flag"></i>
                                <span class="menu-title">Organization
                                    <span class="pull-right badge badge-info">{{Session::get('organization')}}
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('zones') || Request::is('zones/*') ? 'active-sub' : ''}}">
                            <a href="{{url('zones')}}">
                                <i class="fa fa-grip-horizontal"></i>
                                <span class="menu-title">Zones
                                    <span class="pull-right badge badge-info">{{Session::get('zones')}}
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('cities') || Request::is('cities/*') ? 'active-sub' : ''}}">
                            <a href="{{url('cities')}}">
                                <i class="fa fa-city"></i>
                                <span class="menu-title">Cities
                                    <span class="pull-right badge badge-info">{{Session::get('cities')}}
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('branches') || Request::is('branches/*') ? 'active-sub' : ''}}">
                            <a href="{{url('branches')}}">
                                <i class="fa fa-code-branch"></i>
                                <span class="menu-title">Branches
                                    <span class="pull-right badge badge-info">{{Session::get('branches')}}
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('device-group') || Request::is('device-group/*') ? 'active-sub' : ''}}">
                            <a href="{{url('device-group')}}">
                                <i class="fa fa-layer-group"></i>
                                <span class="menu-title">Device Groups
                                        <span class="pull-right badge badge-info">{{Session::get('device_groups')}}</span>
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('devices') || Request::is('devices/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/devices')}}">
                                <i class="fa fa-tablet-alt"></i>
                                <span class="menu-title">Device
                                    <span class="pull-right badge badge-info">{{Session::get('devices')}}</span>
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('device-templates') || Request::is('device-templates/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/device-templates')}}">
                                <i class="fa fa-tv"></i>
                                <span class="menu-title">Device Templates</span>
                            </a>
                        </li>
                        <li class="{{Request::is('schedule') || Request::is('schedule/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/schedule')}}">
                                <i class="fa fa-calendar-alt"></i>
                                <span class="menu-title">Schedule</span>
                            </a>
                        </li>
                        <li class="{{Request::is('device-logs') || Request::is('device-logs/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/device-logs')}}">
                                <i class="fa fa-laptop-medical"></i>
                                <span class="menu-title">Device Logs</span>
                            </a>
                        </li>
                        {{--                        <li class="{{Request::is('device-templates/template') || Request::is('device-templates/template*') ? 'active-sub' : ''}}">--}}
                        {{--                            <a href="{{url('/device-templates/template')}}">--}}
                        {{--                                <i class="fa fa-tablet-alt"></i>--}}
                        {{--                                <span class="menu-title">Create Templates</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="{{Request::is('questions') || Request::is('questions/*') ? 'active-sub' : ''}}">--}}
                        {{--                            <a href="{{url('/questions')}}">--}}
                        {{--                                <i class="fa fa-question"></i>--}}
                        {{--                                <span class="menu-title">Questions</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="{{Request::is('reports') || Request::is('reports/*') ? 'active-sub' : ''}}">--}}
                        {{--                            <a href="{{url('reports')}}">--}}
                        {{--                                <i class="fa fa-flag"></i>--}}
                        {{--                                <span class="menu-title">Reports</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
            </div>
            s
        </div>
    </div>
</nav>
