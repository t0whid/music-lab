<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
          

            <li class="mt-3">
                <a href="{{ route('admin.users') }}" aria-expanded="false">
                    <i class="fa-regular fa-user"></i></i><span class="nav-text">User</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" aria-expanded="false">
                    <i class="fa-solid fa-list"></i><span class="nav-text">Category</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-music"></i><span class="nav-text">Songs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.songs.index') }}">All Songs</a></li>
                    @foreach (\App\Models\Category::all() as $category)
                        <li><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
        </ul>
    </div>
</div>
