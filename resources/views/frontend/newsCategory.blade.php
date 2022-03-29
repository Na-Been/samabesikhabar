@extends('frontend.layouts.app')
@section('title',getCategoryTitle($newsList->first()) )

@section('content')
    @forelse($ads as $ad)
        @if($ad->rank == 2)
            <section class="ads pt-4"><a href="{{$ad->url}}" title="{{$ad->title}}">
                    <div class="container">
                        <img
                            width="100%"
                            src="{{asset(url('/').Storage::url($ad->image))}}"
                            alt=""
                        />
                    </div>
                </a>
            </section>
        @endif
    @empty
    @endforelse
    @forelse($ads as $ad)
        @if($ad->rank == 3)
            <section class="ads pt-4"><a href="{{$ad->url}}" title="{{$ad->title}}">
                    <div class="container">
                        <img
                            width="100%"
                            src="{{asset(url('/').Storage::url($ad->image))}}"
                            alt=""
                        />
                    </div>
                </a>
            </section>
        @endif
    @empty
    @endforelse

    <section class="category pt-5">
        <div class="container">
            <div class="block-header">
                <h3><b> {{$newsList->first()->category->title??''}}</b></h3>
            </div>
            <div class="row mb-md-5">
                @if($newsList->first())
                    @if(isset($newsList->first()->news))
                        <div class="col-md-12">
                            <div class="news-block ">
                                @php
                                    $slug = explode('/',$newsList->first()->news->slug);
                                    $slug1 = $slug[0];
                                    $slug2 = $slug[1];
                                    $slug3 = $slug[2];
                                    $slug4 = $slug[3];
                                @endphp
                                <a class="row" href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                    <div class="news-image v-item col-md-7 pe-md-0">
                                        <img src="{!!$newsList->first()->news->full_feature_image ??''!!}"/>
                                    </div>
                                    <div class="col-md-5 ps-md-0">
                                        <div style="padding:10px 30px ">
                                            <h4 class="news-title text-center " style="font-size:45px">
                                                {{ $newsList->first()->news->title ??''}}
                                            </h4>
                                            <div class=news-description"" style="font-size: 22px;">
                                                {!!Str::limit( $newsList->first()->news->description, 250)??'' !!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            @forelse($ads as $ad)
                @if($ad->rank == 4)
                    <section class="ads pt-4"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img
                                    width="100%"
                                    src="{{asset(url('/').Storage::url($ad->image))}}"
                                    alt=""
                                />
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            @forelse($newsList as $key=>$value)
                                @if(isset($value->news))
                                    @if($loop->iteration > 2 && $loop->iteration < 5 )
                                        @php
                                            $slug = explode('/',$value->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="news-block">
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image news-image-fixed1">
                                                    <img
                                                        src="{{$value->news->full_feature_image??''}}"
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title-1">
                                                        {{$value->news->title??''}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @empty
                            @endforelse
                        </div>
                        <div class="col-md-9 px-md-4">
                            <div class="news-block">
                                @forelse($newsList as $key=>$value )
                                    @if(isset($value->news))
                                        @php
                                            $slug = explode('/',$value->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        @if($value->news->id == $value->category->highlight_news_id)
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image">
                                                    <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                </div>
                                                <div class="news-body pt-4">
                                                    <h4 class="news-title-1">
                                                        {{ $value->news->title??'' }}
                                                    </h4>
                                                    <div class="news-description">
                                                        {!! Str::limit($value->news->description, 400) !!}
                                                    </div>
                                                </div>
                                            </a>
                                        @elseif($loop->iteration==2)
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image">
                                                    <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                </div>
                                                <div class="news-body pt-4">
                                                    <div class="news-description">
                                                        {!! Str::limit($value->news->description, 400)??'' !!}
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse($newsList as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration>4 )
                                    @php
                                        $slug = explode('/',$value->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <div class="col-md-4">
                                        <div class="news-block">
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image news-image-fixed1">
                                                    <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title-1">
                                                        {{$value->news->title??''}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="col-md-3" style="position: relative;">
                    @forelse($ads as $ad)
                        @if($ad->rank == 5)
                            <section class="ads pt-4"><a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <div class="container">
                                        <img
                                            width="100%"
                                            src="{{asset(url('/').Storage::url($ad->image))}}"
                                            alt=""
                                        />
                                    </div>
                                </a>
                            </section>
                        @endif
                    @empty
                    @endforelse
                    <div class="block" style="position: sticky; top: 0px;">
                        <div class="block-header">
                            <h3><b>ताजा अपडेट</b></h3>
                        </div>
                        <div class="block-body">
                            @forelse(getLatestFiveNews() as $key=>$value)
                                @if(isset($value->news))
                                    @php
                                        $slug = explode('/',$value->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <div class="news-block mt-4">
                                        <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="news-image img-f-s">
                                                        <img src="{{$value->full_feature_image}}" alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="news-title-1 m-0">
                                                        {{$value->title}}
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
