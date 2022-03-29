<!-- navbar -->
<header>
    <style>
        .active {
            background-color: #882d2d;
        }
    </style>
    <div class="header_top p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        @if(getSetting('logo'))
                            <a href="/"> <img src="{{getSetting('logo')}}" alt=""/></a>
                        @else
                            <img src="https://www.samabesikhabar.com/wp-content/uploads/2019/06/samabesi_logo.png"
                                 alt=""/>
                        @endif
                        <div class="header-date">
                            <i class="far fa-calendar-alt" style="color: #1a427a"></i>
                            @php
                                $bsdate = new App\Http\Controllers\Backend\BsdateController();
                                $date = \Carbon\Carbon::now()->format('Y-m-d');
                                $a = get_nepali_date($date);
                                $year = \Carbon\Carbon::parse($a)->format('Y');
                                $month = \Carbon\Carbon::parse($a)->format('m');
                                $date = \Carbon\Carbon::parse($a)->format('d');
                                $day = \Carbon\Carbon::now()->addDay()->dayOfWeek;
                                $nepMonth = $bsdate->_get_nepali_month($month);
                                $nepDate = $bsdate->convert_to_nepali_number($date);
                                $nepYear = $bsdate->convert_to_nepali_number($year);
                                $nepDay = $bsdate->_get_day_of_week($day);
                            @endphp
                            {!! $nepYear.' - '.$nepMonth.' - '.$nepDate !!} | {!! $nepDay !!}
                        </div>

                    </div>
                </div>
                <div class="col-md-5" style="display: flex; align-items: center;justify-content:flex-end">
                    <div class="header_ads">
                        @forelse($ads as $ad)
                            @if($ad->rank == 1)
                                <img width="100%"
                                     src="{{$ad->ads_image}}"
                                     alt=""/>
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="d-flex m-0 mt-2" style="justify-content:center">
                        <a class="h-social-icon i-1" href=""><i class="fab fa-facebook-f "></i></a>
                        <a class="h-social-icon i-2" href=""><i class="fab fa-twitter "></i></a>
                        <a class="h-social-icon i-3 " href=""><i class="fab fa-youtube "></i></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <li class="" id="menu-bar" style="list-style:none">
                <a class="nav-link active" role="button" aria-current="page">
                    <i class="fas fa-bars" style="color:#fff"></i>
                </a>
            </li>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('home.index')?'active':''}}" href="{{url('/')}}"><i
                                class="fas fa-home"></i>&nbsp; गृहपृष्ठ</a>
                    </li>

                    @forelse($newsCats as $newsCat)
                        @if( $newsCat->order > 0 && $newsCat->order < 8)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('category/' . $newsCat->slug) ? 'active' : '' }}"
                                   href="{{route('category-slug',$newsCat->slug)}}">{{$newsCat->title}}</a>
                            </li
                        @endif
                    @empty
                    @endforelse
                    @if($liveLinks != null)
                        <li>
                            <a href="{{$liveLinks->url}}" target="_blank" class="btn btn_live "><b>Live</b><span
                                    class="live-icon"></span></a>
                        </li>
                    @endif
                </ul>
                <div class="d-flex ms-auto">
                    <ul class=" m-auto nav-social-icon" style="justify-content:flex-end">
                        <a class="h-social-icon i-1" href=""><i class="fab fa-facebook-f "></i></a>
                        <a class="h-social-icon i-2" href=""><i class="fab fa-twitter "></i></a>
                        <a class="h-social-icon i-3 " href=""><i class="fab fa-youtube "></i></a>
                    </ul>
                    <div class="h-search  "><i class="fas fa-search search-btn"></i>
                        <form class="search-form" method="POST" action="{{route('news.search')}}">
                            @csrf
                            <h4> खोज्नुहोस
                            </h4>                    <input class="form-control" name="search"
                                                            placeholder="Search News">
                        </form>
                    </div>
                </div>
            </div>
            <li class="ms-auto mobile-search-bar nav-item">
                <div class="h-search nav-link  "><i class="fas fa-search search-btn"></i>
                    <form class="search-form" method="POST" action="{{route('news.search')}}">
                        @csrf
                        <h4> खोज्नुहोस
                        </h4>                    <input class="form-control" name="search"
                                                        placeholder="Search News">
                    </form>
                </div>
            </li>
        </div>
    </nav>
</header>



@if($liveLinks != null)
    <div class="live-video">
        <div class="live-video-header text-right">
            <i class="fas fa-window-minimize close-video"></i>
        </div>
        {!! $liveLinks->live_link !!}
    </div>
@endif

