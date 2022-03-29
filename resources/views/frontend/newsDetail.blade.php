@extends('frontend.layouts.app')
@section('title',getSetting('site_title').' - '.$news->title)
@section('head')
    <?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    // Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];


    ?>
    <meta property="og:title" content="{!!$news->title!!}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{$url}}">
    <meta property="og:image"
          content="{{$news->full_feature_image}}">
    <meta property="og:image:width" content="1920"/>
    <meta property="og:image:height" content="1080"/>
    <meta property="og:site_name" content="{{getSetting('site_title')}}"/>
    <meta property="fb:app_id" content="872739953203863"/>
    <meta property="og:description"
          content="{!!$news->title!!}">
@endsection
@section('content')

    <section class="news-detail pt-2">
        <div class="container">
            @forelse($ads as $ad)
                @if($ad->rank == 1)
                    <section class="ads py-3">
                        <a href="{{route('ads.counts',$ad->id)}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{asset(url('/').Storage::url($ad->image))}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse
            <div class="row">
                <div class="col-md-9">
                    <div class="news-block">
                        <div class="">
                            <h6 class="post-title mb-4 ">
                                @if($news->highlight_text )<span
                                    class="highlight-text"><b>{{ $news->highlight_text }} </b>
                            </span>
                                @else
                                    <p></p>
                                @endif
                            </h6>
                            <h1 class="news-detaul-title  single-page-title">
                                {{$news->title}}
                            </h1>
                            @forelse($ads as $ad)
                                @if($ad->rank == 2)
                                    <section class="ads py-3">
                                        <a href="{{$ad->url}}" title="{{$ad->title}}">
                                            <div class="container">
                                                <img width="100%" src="{{asset(url('/').Storage::url($ad->image))}}"
                                                     alt=""/>
                                            </div>
                                        </a>
                                    </section>
                                @endif
                            @empty
                            @endforelse
                            <div class="details py-3 mb-3 mt-sm-5 px-3">
                                <div class="highlight-author-img">
                                    <img src="{{$news->full_author_image}}"
                                         alt="">
                                </div>
                                <div class="author" style="color: #ba2c2c">{{$news->posted_by}}</div>&nbsp;&nbsp;|
                                &nbsp;&nbsp;
                                <div class="news-date m-0">प्रकाशित मिति: {!! $news->getNepaliCreatedAt() !!}
                                </div>
                                <div class="news_share ms-auto" style="border-right: 2px solid #888;
    padding-right: 11px;
    margin-right: 10px;">
                                    <span style="font-size:20px">{{$news->share}}</span> <span>Shares</span>
                                </div>
                                <div class="social-share">
                                    <div class="addthis_inline_share_toolbox_4zf7"></div>
                                </div>
                            </div>
                        </div>
                        <div class="news-image">
                            <img src="{{$news->full_feature_image}}"
                                 alt=""/>
                        </div>
                        <div class="news-body pt-4">
                            <div class="news-description" id="newsPAds">
                                {!! $news->description !!}
                            </div>
                            <div class="author" style="color: #ba2c2c">{{$news->posted_by}}</div>
                        </div>
                        <div class="details py-3">
                            <div class="news-date">प्रकाशित मिति: {!! $news->getNepaliCreatedAt() !!}

                            </div>
                            <div class="news_share ms-auto" style="border-right: 1px solid;
    padding-right: 11px;
    margin-right: 10px;">
                                <span style="font-size:20px">{{$news->share}}</span> <span>Shares</span>
                            </div>
                            <div class="social-share">
                                <div class="addthis_inline_share_toolbox_4zf7"></div>
                            </div>
                        </div>
                        <div class="news-comments">
                            <!--<div id="disqus_thread"></div>-->
                        </div>
                        @forelse($ads as $ad)
                            @if($ad->rank == 4)
                                <section class="ads py-3">
                                    <a href="{{$ad->url}}" title="{{$ad->title}}">
                                        <div class="container">
                                            <img width="100%" src="{{asset(url('/').Storage::url($ad->image))}}"
                                                 alt=""/>
                                        </div>
                                    </a>
                                </section>
                            @endif
                        @empty
                        @endforelse
                    </div>
                    @forelse($ads as $ad)
                        @if($ad->rank == 5)
                            <section class="ads py-3">
                                <a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <img width="100%"
                                         src="{{asset(url('/').Storage::url($ad->image))}}"
                                         alt=""/>
                                </a>
                            </section>
                        @endif
                    @empty
                    @endforelse
                    <div class="block">
                        <div class="block-header">
                            <h3><b> सम्बन्धित समाचार </b></h3>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                @forelse(getLatestSixNews() as $news)
                                    @if($loop->iteration > 0 && $loop->iteration < 7)
                                        <div class="col-md-3">
                                            @php
                                                $slug = explode('/',$news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="news-image" style="height:200px">
                                                        <img
                                                            style="height:100%;width:100%;object-fit:cover;border-radius:5px "
                                                            src="{{$news->full_feature_image}}">
                                                    </div>
                                                    <div class="news-body">
                                                        <h4 class="news-title-1">
                                                            {{$news->title??''}}
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @forelse($ads as $ad)
                        @if($ad->rank == 6)
                            <section class="ads py-3">
                                <a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <img width="100%"
                                         src="{{asset(url('/').Storage::url($ad->image))}}"
                                         alt=""/>
                                </a>
                            </section>
                        @endif
                    @empty
                    @endforelse
                    <div class="block">
                        <div class="block-header">
                            <h3><b>समाबेसी ट्रेन्डिङ </b></h3>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                @forelse(getTrendingNews() as $news)
                                    <div class="col-lg-4 col-md-2 mb-4">
                                        <div class="news-block ps-5 py-4 pe-4"
                                             style="background:#F2F2F2;position:relative">
                                            @php
                                                $slug = explode('/',$news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="number-trend">
                                                    <h1><b>{{$loop->iteration}}.</b></h1>
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title-2">
                                                        {{$news->title}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @forelse($ads as $ad)
                        @if($ad->rank == 7)
                            <section class="ads py-3">
                                <a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <img width="100%"
                                         src="{{asset(url('/').Storage::url($ad->image))}}"
                                         alt=""/>
                                </a>
                            </section>
                        @endif
                    @empty
                    @endforelse

                </div>
                <div class="col-md-3">
                    <div class="block">
                        @forelse($ads as $ad)
                            @if($ad->rank == 8)
                                <section class="ads py-3">
                                    <a href="{{$ad->url}}" title="{{$ad->title}}">
                                        <img width="100%" src="{{asset(url('/').Storage::url($ad->image))}}" alt=""/>
                                    </a>
                                </section>
                            @endif
                        @empty
                        @endforelse
                        <div class="block-header">
                            <h3><b>ताजा अपडेट</b></h3>
                        </div>
                        <div class="block-body">
                            @forelse(getLatestSixNews() as $news)
                                @if($loop->iteration > 6 && $loop->iteration < 12)
                                    <div class="news-block mt-4">
                                        @php
                                            $slug = explode('/',$news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])}}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="news-image img-f-s">
                                                        <img
                                                            src="{{$news->full_feature_image}}"
                                                            alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="news-title-1 m-0">
                                                        {{$news->title}}
                                                    </h4>
                                                    <div class="news-date">{{$news->posted_by}}
                                                        | {!! $news->getNepaliCreatedAt() !!}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                            @endforelse

                            @forelse($ads as $ad)
                                @if($ad->rank == 9)
                                    <section class="ads py-3">
                                        <a href="{{$ad->url}}" title="{{$ad->title}}">
                                            <div class="container">
                                                <img width="100%" src="{{asset(url('/').Storage::url($ad->image))}}"
                                                     alt=""/>
                                            </div>
                                        </a>
                                    </section>
                                @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 k-c">
                    <div class="block">
                        <div class="block-header">
                            <h3><b>छुटाउनुभयो कि?</b></h3>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                @forelse(getLatestSixNews() as $news)
                                    @if($loop->iteration > 11 && $loop->iteration < 18)
                                        <div class="col-md-3">
                                            @php
                                                $slug = explode('/',$news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])}}">
                                                    <div class="news-image" style="height:200px">
                                                        <img
                                                            style="height:100%;width:100%;object-fit:cover;border-radius:5px "
                                                            src="{{$news->full_feature_image}}">
                                                    </div>
                                                    <div class="news-body">
                                                        <h4 class="news-title-1">
                                                            {{$news->title}}
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function () {
            $.ajax({
                url: '/only/ads',
                method: 'get',
            }).success(function (ads) {
                var text = '';
                var image = '{{url('/')}}' + '/storage/';
                $.each(ads, function (key, value) {
                    if (value.rank == '3') {
                        text += '<div class="col-md-4"><section class="ads py-3"><a href="' + value.url + '" title= "' + value.title + '">' +
                            '<img width="100%" src="' + image + value.image + '"/></a></section></div>';
                    }
                });
                var html = $.parseHTML('<div class="row">' + text + '</div>');
                $('#newsPAds').find('p:first').after(html);
            });
        });
    </script>
@endsection
