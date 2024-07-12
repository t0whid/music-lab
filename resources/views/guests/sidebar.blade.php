<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('guests.home') }}" aria-expanded="false">
                    <i class="fa-solid fa-house"></i><span class="nav-text">Home</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Category</span>
                </a>
                <ul aria-expanded="false">
                    @foreach (\App\Models\Category::all() as $category)
                        <li><a href="{{-- {{ route('admin.categories.show', $category->id) }} --}}" class="category-link">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>

        </ul>
    </div>
</div>
