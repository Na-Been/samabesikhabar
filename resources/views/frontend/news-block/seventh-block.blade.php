<section class="खेलकुद">
    <div class="container">
        <div class="row ">
            <div class="col-lg-4">
                <div class="block">
                    @if(getThirteenCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getThirteenCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getThirteenCategory()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body sh-1 p-3">
                        @if(getThirteenCategory()->first())
                            @if(isset(getThirteenCategory()->first()->news))
                                @php
                                    $slug = explode('/',getThirteenCategory()->first()->news->slug);
                                    $slug1 = $slug[0];
                                    $slug2 = $slug[1];
                                    $slug3 = $slug[2];
                                    $slug4 = $slug[3];
                                @endphp
                                <div class="news-block">
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="news-image im-f">
                                            <img
                                                src="{{getThirteenCategory()->first()->news->full_feature_image??''}}"
                                                alt=""/>
                                        </div>
                                        <h4 class="news-title-1">
                                            {{getThirteenCategory()->first()->news->title??''}}
                                        </h4>
                                    </a>
                                    <hr>
                                </div>
                            @endif
                        @endif
                        @forelse(getThirteenCategory() as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration > 1 && $loop->iteration < 4)
                                    <div class="news-block">
                                        <div class="row">
                                            @php
                                                $slug = explode('/',$value->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a class="row"
                                               href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="news-image img-f-s">
                                                        <img
                                                            src="{{$value->news->full_feature_image??''}}"
                                                            alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-9">
                                                    <h4 class="news-title-1 m-0">
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
            </div>

            <div class="col-lg-4">
                <div class="block">
                    @if(getFourteenCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFourteenCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFourteenCategory()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body sh-1 p-3">
                        @if(getFourteenCategory()->first())
                            @if(isset(getFourteenCategory()->first()->news))
                                <div class="news-block">
                                    @php
                                        $slug = explode('/',getFourteenCategory()->first()->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="news-image im-f">
                                            <img
                                                src="{{getFourteenCategory()->first()->news->full_feature_image??''}}"
                                                alt=""/>
                                        </div>
                                        <h4 class="news-title-1">
                                            {{getFourteenCategory()->first()->news->title??''}}
                                        </h4>
                                    </a>
                                    <hr>
                                </div>
                            @endif
                        @endif
                        @forelse(getFourteenCategory() as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration > 1 && $loop->iteration < 4)
                                    <div class="news-block">
                                        @php
                                            $slug = explode('/',$value->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="row">
                                            <a class="row"
                                               href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="news-image img-f-s">
                                                        <img
                                                            src="{{$value->news->full_feature_image??''}}"
                                                            alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-9">
                                                    <h4 class="news-title-1 m-0">
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
            </div>

            <!-- स्वास्थ्य -->
            <div class="col-lg-4">
                <div class="block">
                    @if(getFifteenCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFifteenCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFifteenCategory()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i> </a></h6>
                        </div>
                    @endif
                    <div class="block-body sh-1 p-3">
                        @if(getFifteenCategory()->first())
                            @if(isset(getFifteenCategory()->first()->news))
                                <div class="news-block">
                                    @php
                                        $slug = explode('/',getFifteenCategory()->first()->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="news-image im-f">
                                            <img
                                                src="{{getFifteenCategory()->first()->news->full_feature_image??''}}"
                                                alt=""/>
                                        </div>
                                        <h4 class="news-title-1">
                                            {{getFifteenCategory()->first()->news->title??''}}
                                        </h4>
                                    </a>
                                    <hr>
                                </div>
                            @endif
                        @endif
                        @forelse(getFifteenCategory() as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration > 1 && $loop->iteration < 4)
                                    @php
                                        $slug = explode('/',$value->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <div class="news-block">
                                        <div class="row">
                                            <a class="row"
                                               href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="news-image img-f-s">
                                                        <img
                                                            src="{{$value->news->full_feature_image??''}}"
                                                            alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-9">
                                                    <h4 class="news-title-1 m-0">
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
            </div>
        </div>
    </div>
</section>
