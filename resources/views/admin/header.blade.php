<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                            class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
               
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        @if (auth('admin')->check())
                            @if (auth('admin')->user()->image)
                                <img src="{{ asset('storage/' . auth('admin')->user()->image) }}" alt="user"
                                    height="40" width="40">
                            @else
                                <img src="{{ asset('assets/images/user/form-user.png') }}" height="40"
                                    width="40" alt="">
                            @endif

                        @endif

                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('admin.profile.edit') }}"><i class="icon-user"></i>
                                        <span>Profile</span></a>
                                </li>
                                
                                <li><a href="{{ route('admin.logout') }}"><i class="icon-key"></i>
                                        <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
