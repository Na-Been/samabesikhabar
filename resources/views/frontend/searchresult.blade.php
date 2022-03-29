@extends('frontend.layouts.app')
@section('title',getSetting('site_title').' - '.'Search Result')
@section('content')

    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 k-c">
                    <div class="block">
                        <div class="block-header">
                            <h3><b> सम्बन्धित समाचार </b></h3>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                @forelse($news as $new)
                                    @php
                                        $slug = explode('/',$new->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="news-block">
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])}}">
                                                <div class="news-image" style="height:200px">
                                                    <img
                                                        style="height:100%;width:100%;object-fit:cover;border-radius:5px "
                                                        src="{{$new->full_feature_image}}">
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title-1">
                                                        {{$new->title}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <h3>No Respective News Have Been Found. Please Try Again...</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
