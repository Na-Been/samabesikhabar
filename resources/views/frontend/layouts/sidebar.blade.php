<!-- sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header p-3">
        <i class="fas fa-times" id="sidebar-close"></i>
    </div>
    <div class="sidebar-logo" style="width: 245px">
        <img
            width="240px"
            src="https://www.samabesikhabar.com/wp-content/uploads/2019/06/samabesi_logo.png"
            alt=""
        />
    </div>

    <div class="sidebar-body">
        <ul>
            <li>
                <a href="{{url('/')}}">गृहपृष्ठ</a>
            </li>
            @forelse($newsCats as $newsCat)
                <li class="nav-item">
                    <a href="{{route('category-slug',$newsCat->slug)}}">{{$newsCat->title}}</a>
                </li>
            @empty
            @endforelse
        </ul>
    </div>
</div>
