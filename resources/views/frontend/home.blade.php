@extends('frontend.layouts.app')
@section('title','Home')
@section('content')
    @forelse($ads as $ad)
        @if($ad->rank == 2)
            <section class="ads pt-5">
                <a href="{{$ad->url}}" title="{{$ad->title}}">
                    <div class="container">
                        <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                    </div>
                </a>
            </section>
        @endif
    @empty
    @endforelse
    <!-- flash-news -->
    <!-- design -->
    <section>
        <div>
            <section class="highlight-news ">
                <div class="container">
                    @forelse(getFlashNews() as $flashNews)
                        <div class="highlight-news-top">
                            <div class="row">
                                <div class="col-md-12">
                                    @php
                                        $slug = explode('/',$flashNews->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])}}">
                                        @if($flashNews->highlight_text) <h6 class="post-title text-center mb-4">
                                            <span class="highlight-text"><b>{{$flashNews->highlight_text}}</b></span>
                                        </h6>
                                        @else
                                            <p></p>
                                        @endif

                                        <div class="news-block">
                                            <h1 class="news-title text-center flash-title">
                                                <b>{{$flashNews->title}}</b>
                                            </h1>
                                            <div class="news-author text-center py-4">
                                                <div class="highlight-author-img">
                                                    <img src="{{$flashNews->full_author_image}}" alt="">
                                                </div>
                                                <span>{{$flashNews->posted_by}}</span>&nbsp;&nbsp; |&nbsp;&nbsp;
                                                <span>{!! $flashNews->getNepaliCreatedAt() !!}</span>
                                            </div>
                                            <div class="block_image m-auto" style="width:80%">
                                                <img width="100%"
                                                     src="{{$flashNews->full_feature_image}}"
                                                     alt=""/>

                                            </div>
                                            <div class="news-description mt-3 text-center">
                                                {!! Str::limit($flashNews->description, 205 ) !!}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </section>

            @forelse($ads as $ad)
                @if($ad->rank == 3)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
                <h1></h1>
            @endforelse

        <!-- first-block-news -->

            @if(getFirstCategoryData()->count() > 0 || getSecondCategoryData()->count() > 0)
                @include('frontend.news-block.first-block')
            @else
                <section class="ads pt-3">
                    <div class="container">
                        <p>
                            No Record Found in First Row
                        </p>
                    </div>
                </section>
            @endif
            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 5)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse

            {{--video section--}}

            @if(getVideoSection()->count() > 0)
                @include('frontend.news-block.video')
            @endif


        <!-- second-block-news -->

            @if( getThirdCategoryData()->count() > 0 || getFourthCategoryData()->count()>0)
                @include('frontend.news-block.second-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <p>
                            No Record Found in Second Row
                        </p>
                    </div>
                </section>
            @endif

            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 6)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse



        <!-- third-block-news -->

            @if(getFifthCategoryData()->count()>0)
                @include('frontend.news-block.third-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No Record Found in Third Row
                        </b>
                    </div>
                </section>
            @endif

            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 8)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse
        <!-- fourth-block-news -->

            @if(getSixthCategoryData()->count() > 0 || getSeventhCategoryData()->count() > 0 || getEighthCategoryData()->count() > 0)
                @include('frontend.news-block.fourth-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No Record Found in Fourth Row
                        </b>
                    </div>
                </section>
            @endif

            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 10)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse

        <!-- fifth-block-news -->

            @if(getNinthCategoryData()->count()>0 || getTenthCategoryData()->count() > 0)
                @include('frontend.news-block.fifth-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No Record Found in Fifth Row
                        </b>
                    </div>
                </section>
            @endif

            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 11)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse

        <!-- sixth-block-news -->

            @if(getEleventhCategory()->count() > 0 || getTwelfthCategory()->count() > 0)
                @include('frontend.news-block.sixth-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No sixth category
                        </b>
                    </div>
                </section>
            @endif

            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 12)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse

            {{--photo section--}}
            @if(getPhotoFeature()->count() > 0)
                @include('frontend.news-block.photo')
            @endif

        <!-- seventh-block-news -->
            @if(getSixteenCategory()->count()>0)
                @include('frontend.news-block.eighth-block')
            @endif

        <!-- eighth-block-news -->
            @if(getThirteenCategory()->count()>0 || getFourteenCategory()->count()>0 ||getFifteenCategory()->count()>0)
                @include('frontend.news-block.seventh-block')
            @endif

            @forelse(getAdsForHomePage() as $ad)
                @if($ad->rank == 20)
                    <section class="ads py-3 sticky-add"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ads->ads_image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse

        </div>


    </section>
@endsection
