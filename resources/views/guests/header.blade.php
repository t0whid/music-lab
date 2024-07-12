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
                    <a href="{{ route('login') }}" class="btn btn-outline-success">
                        <i class="mdi mdi-account"></i>
                        <span>Login</span>
                    </a>
                </li>
                <li class="icons dropdown">
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">
                        <i class="mdi mdi-account-plus"></i>
                        <span>Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>


    </div>
</div>
