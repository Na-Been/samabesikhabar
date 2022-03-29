<section class="des-samaj">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="block">
                    @if(getFifthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFifthCategoryData()->first()->category->title ?? ' '}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFifthCategoryData()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i> </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getFifthCategoryData()->first())
                                @if(isset(getFifthCategoryData()->first()->news))
                                    <div class="col-lg-6">
                                        @php
                                            $slug = explode('/',getFifthCategoryData()->first()->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="news-block">
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image img-f-b">
                                                    <img
                                                        src="{{getFifthCategoryData()->first()->news->full_feature_image??''}}"
                                                        alt=""/>
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title text-center">
                                                        {{getFifthCategoryData()->first()->news->title??''}}
                                                    </h4>
                                                    <div class="news-description">
                                                        {!!Str::limit(getFifthCategoryData()->first()->news->description,100)??''!!}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="col-lg-6">
                                <div class="row">
                                    @forelse(getFifthCategoryData() as $key=>$value)
                                        @if(isset($value->news))
                                            @if($loop->iteration > 1 && $loop->iteration < 6)
                                                <div class="col-md-6">
                                                    @php
                                                        $slug = explode('/',$value->news->slug);
                                                        $slug1 = $slug[0];
                                                        $slug2 = $slug[1];
                                                        $slug3 = $slug[2];
                                                        $slug4 = $slug[3];
                                                    @endphp
                                                    <div class="news-block">
                                                        <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                            <div class="">
                                                                <div class="news-image img-f-2">
                                                                    <img src="{{$value->news->full_feature_image??''}}"
                                                                         alt=""/>
                                                                </div>
                                                                <div class="news-body">
                                                                    <h4 class="news-title-1 m-0">
                                                                        {{$value->news->title??''}}
                                                                    </h4>
                                                                </div>
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
                        </div>

                        <div class="row pt-md-5">
                            @forelse(getFifthCategoryData() as $key=>$value)
                                @if(isset($value->news))
                                    @if($loop->iteration > 5 && $loop->iteration < 9)
                                        @php
                                            $slug = explode('/',$value->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <div class="news-image img-f-s">
                                                                <img src="{{$value->news->full_feature_image??''}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 class="news-title-1 m-0">
                                                                {{$value->news->title??''}}
                                                            </h4>
                                                        </div>
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
                </div>
            </div>
            <div class="col-md-3">
                @forelse(getAdsForHomePage() as $ad)
                    @if($ad->rank == 7)
                        <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                                <div class="container">
                                    <img width="100%" src="{{$ad->ads_image}}" alt=""/>
                                </div>
                            </a>
                        </section>
                    @endif
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
