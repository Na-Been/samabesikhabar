<section class="chitwan-bises">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="block">
                    @if(getThirdCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getThirdCategoryData()->first()->category->title ?? ' '}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getThirdCategoryData()->first()->category->slug )??''}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getThirdCategoryData()->first())
                                @if(isset(getThirdCategoryData()->first()->news))
                                    <div class="col-md-7">
                                        <div class="news-block">
                                            @php
                                                $slug = explode('/',getThirdCategoryData()->first()->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image overlay-1 img-f-m">
                                                    <img
                                                        src="{{getThirdCategoryData()->first()->news->full_feature_image ?? ''}}"
                                                        alt=""/>
                                                    <div class="overlay-title py-5">
                                                        <h4 class="news-title">
                                                            {{getThirdCategoryData()->first()->news->title ??''}}
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="news-body mt-3">
                                                    <div class="news-description">
                                                        {!!  Str::limit(getThirdCategoryData()->first()->news->description,250)??'' !!}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="col-md-5" style="background:    #F5F3F3">
                                <br>
                                @forelse(getThirdCategoryData() as $key=>$value)
                                    @if(isset($value->news))
                                        @if($loop->iteration > 1 && $loop->iteration < 7)
                                            <div class="news-block">
                                                @php
                                                    $slug = explode('/',$value->news->slug);
                                                    $slug1 = $slug[0];
                                                    $slug2 = $slug[1];
                                                    $slug3 = $slug[2];
                                                    $slug4 = $slug[3];
                                                @endphp
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <div class="news-image img-f-s">
                                                                <img src="{{$value->news->full_feature_image ?? ''}}"
                                                                     alt=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 class="news-title-1 m-0">
                                                                {{$value->news->title ??''}}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </a>
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
            <div class="col-lg-3">
                <div class="block px-4">
                    @if(getFourthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFourthCategoryData()->first()->category->title ?? ' '}} </b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getFourthCategoryData()->first()->category->slug)??''}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @forelse(getFourthCategoryData() as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration > 0 && $loop->iteration < 5)
                                    @php
                                        $slug = explode('/',getFourthCategoryData()->first()->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <div class="news-block">
                                        <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4]) ?? ''}}">
                                            <div class="row mb-2">
                                                <div class="col-md-8">
                                                    <h4 class="news-title-1 m-0">
                                                        {{$value->news->title??''}}
                                                    </h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="news-image img-f-s">
                                                        <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <hr/>
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
