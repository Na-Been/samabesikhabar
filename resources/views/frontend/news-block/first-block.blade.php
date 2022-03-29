<section class="pramukh-samachar">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="block">
                    @if(getFirstCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFirstCategoryData()->first()->category->title??''}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFirstCategoryData()->first()->category->slug)??''}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getFirstCategoryData()->first())
                                @if(isset(getFirstCategoryData()->first()->news))
                                    <div class="news-block ">
                                        @php
                                            $slug = explode('/',getFirstCategoryData()->first()->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <a class="row"
                                           href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??null}}">
                                            <div class="col-md-8 col-lg-7">
                                                <div class="news-image overlay-1 im-f-t">
                                                    <img
                                                        src="{{getFirstCategoryData()->first()->news->full_feature_image}}"/>
                                                    <div class="overlay-title py-5">
                                                        <h4 class="news-title">
                                                            {{getFirstCategoryData()->first()->news->title}}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-5">
                                                <div class="news-body mt-md-3">
                                                    <div class="news-description">
                                                        {!! Str::limit(getFirstCategoryData()->first()->news->description, 600) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="row pt-3">
                            @forelse(getFirstCategoryData() as $key=>$value)
                                @if(isset($value->news))
                                    @if($loop->iteration > 1 && $loop->iteration < 8)
                                        @php
                                            $slug = explode('/',$value->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??null}}">
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <div class="news-image img-f-s">
                                                                <img src="{{$value->news->full_feature_image??null}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 class="news-title-1 m-0">
                                                                {{$value->news->title??null}}स्पताल
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
            <div class="col-lg-3">
                @forelse(getAdsForHomePage() as $ad)
                    @if($ad->rank == 4)
                        <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                                <div class="container">
                                    <img width="100%" src="{{$ad->ads_image}}" alt=""/>
                                </div>
                            </a>
                        </section>
                    @endif
                @empty
                @endforelse
                <div class="block px-4" style="background: #f5f3f3">
                    @if(getSecondCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getSecondCategoryData()->first()->category->title ?? ' '}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getSecondCategoryData()->first()->category->slug)?? ''}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @forelse(getSecondCategoryData() as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration > 0 && $loop->iteration < 10)
                                    <div class="news-block">
                                        <div class=" mb-2">
                                            @php
                                                $slug = explode('/',$value->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a class="row"
                                               href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="col-md-5">
                                                    <div class="news-image im-f-1">
                                                        <img src="{{$value->news->full_feature_image??''}}"
                                                             alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4 class="news-title-1 m-0">
                                                        {{$value->news->title??null}}
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
            </div>
        </div>
    </div>
</section>




