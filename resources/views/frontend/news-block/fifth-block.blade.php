<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pe-md-4">
                <div class="block">
                    @if(getNinthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getNinthCategoryData()->first()->category->title}}</b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getNinthCategoryData()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getNinthCategoryData()->first())
                                @if(isset(getNinthCategoryData()->first()->news))
                                    <div class="col-md-6">
                                        <div class="news-block">
                                            @php
                                                $slug = explode('/',getNinthCategoryData()->first()->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image overlay-1 img-f-m">
                                                    <img
                                                        src="{{getNinthCategoryData()->first()->news->full_feature_image??''}}"/>
                                                    <div class="overlay-title py-5">
                                                        <h4 class="news-title">
                                                            {{getNinthCategoryData()->first()->news->title??''}}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @forelse(getNinthCategoryData() as $key=>$value)
                                @if(isset($value->news))
                                    @if($loop->iteration == 2)
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
                                                    <div class="news-image overlay-1 img-f-m">
                                                        <img src="{{$value->news->full_feature_image??''}}"/>
                                                        <div class="overlay-title py-5">
                                                            <h4 class="news-title">
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
                        <div class="row">
                            @forelse(getNinthCategoryData() as $key=>$value)
                                @if(isset($value->news))
                                    @if($loop->iteration > 2 && $loop->iteration < 6)
                                        @php
                                            $slug = explode('/',$value->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="col-md-3">
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="news-image news-image-fixed1">
                                                        <img src="{{$value->news->full_feature_image??''}}"/>
                                                    </div>
                                                </a>
                                                <div class="news-body mb-3">
                                                    <h1 class="news-title-1 m-0 mt-2">
                                                        {{$value->news->title??''}}
                                                    </h1>
                                                </div>
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
                <div class="block">
                    @if(getTenthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getTenthCategoryData()->first()->category->title}} </b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getTenthCategoryData()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i> </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @if(getTenthCategoryData()->first())
                            @if(isset(getTenthCategoryData()->first()->news))
                                <div class="news-block">
                                    @php
                                        $slug = explode('/',getTenthCategoryData()->first()->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="news-image news-image-fixed1">
                                            <img
                                                src="{{getTenthCategoryData()->first()->news->full_feature_image??''}}"/>
                                        </div>
                                    </a>
                                    <div class="news-body mb-3">
                                        <h1 class="news-title-1 m-0 mt-2">
                                            {{getTenthCategoryData()->first()->news->title??''}}
                                        </h1>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    @forelse(getTenthCategoryData() as $key=>$value)
                        @if(isset($value->news))
                            @if($loop->iteration > 1 &&  $loop->iteration < 6)
                                @php
                                    $slug = explode('/',$value->news->slug);
                                    $slug1 = $slug[0];
                                    $slug2 = $slug[1];
                                    $slug3 = $slug[2];
                                    $slug4 = $slug[3];
                                @endphp
                                <div class="news-block">
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="news-title-1 m-0">
                                                    {{$value->news->title??''}}
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <hr>
                            @endif
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

