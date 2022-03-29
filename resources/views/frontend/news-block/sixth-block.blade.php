<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 ">
                <div class="block">
                    @if(getEleventhCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getEleventhCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getEleventhCategory()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            <div class="col-md-4">
                                @forelse(getEleventhCategory() as $key=>$value)
                                    @if(isset($value->news))
                                        @if($loop->iteration > 0 && $loop->iteration < 3)
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
                                                        <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                    </div>
                                                    <h4 class="news-title-1">
                                                        {{$value->news->title??''}}
                                                    </h4>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                @empty
                                @endforelse
                            </div>
                            <div class="col-md-8">
                                @forelse(getEleventhCategory() as $key=>$value)
                                    @if(isset($value->news))
                                        @if($loop->iteration == 3)
                                            @php
                                                $slug = explode('/',$value->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="news-image img-f-m">
                                                        <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                    </div>
                                                    <div class="news-body">
                                                        <h4 class="news-title">
                                                            {{$value->news->title??''}}
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                @empty
                                @endforelse
                                <div class="row mt-3">
                                    @forelse(getEleventhCategory() as $key=>$value)
                                        @if(isset($value->news))
                                            @if($loop->iteration > 3 && $loop->iteration < 8)
                                                @php
                                                    $slug = explode('/',$value->news->slug);
                                                    $slug1 = $slug[0];
                                                    $slug2 = $slug[1];
                                                    $slug3 = $slug[2];
                                                    $slug4 = $slug[3];
                                                @endphp
                                                <div class="col-lg-6">
                                                    <div class="news-block">
                                                        <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-3">
                                                                    <div class="news-image img-f-s">
                                                                        <img
                                                                            src="{{$value->news->full_feature_image??''}}"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7 col-md-9">
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
                </div>
            </div>
            <div class="col-lg-3">
                <div class="block">
                    @if(getTwelfthCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getTwelfthCategory()->first()->category->title}} </b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getTwelfthCategory()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @if(getTwelfthCategory()->first())
                            @if(isset(getTwelfthCategory()->first()->news))
                                <div class="news-block">
                                    @php
                                        $slug = explode('/',getTwelfthCategory()->first()->news->slug);
                                        $slug1 = $slug[0];
                                        $slug2 = $slug[1];
                                        $slug3 = $slug[2];
                                        $slug4 = $slug[3];
                                    @endphp
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="news-image news-image-fixed1">
                                            <img src="{{getTwelfthCategory()->first()->news->full_feature_image??''}}"
                                                 alt=""/>
                                        </div>
                                    </a>
                                    <div class="news-body mb-3">
                                        <h1 class="news-title-1 m-0 mt-2">
                                            {{getTwelfthCategory()->first()->news->title??''}}
                                        </h1>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    <hr>
                    @forelse(getTwelfthCategory() as $key=>$value)
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
                                    <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-3">
                                                <div class="news-image im-f-1">
                                                    <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-9">
                                                <h4 class="news-title-1 m-0">
                                                    {{$value->news->title??''}}
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
</section>


