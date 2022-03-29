<section class="artha">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 ">
                <div class="block">
                    @if(getSeventhCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getSeventhCategoryData()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getSeventhCategoryData()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if(getSeventhCategoryData()->first())
                                    @if(isset(getSeventhCategoryData()->first()->news))
                                        @php
                                            $slug = explode('/',getSeventhCategoryData()->first()->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="news-block">
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image img-f-b">
                                                    <img
                                                        src="{{getSeventhCategoryData()->first()->news->full_feature_image??''}}"
                                                        alt=""/>
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title text-center">
                                                        {{getSeventhCategoryData()->first()->news->title??''}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-6">
                                @forelse(getSeventhCategoryData() as $key=>$value)
                                    @if(isset($value->news))
                                        @if($loop->iteration ==2)
                                            @php
                                                $slug = explode('/',$value->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="news-image img-f-b">
                                                        <img src="{{$value->news->full_feature_image??''}}"
                                                             alt=""/>
                                                    </div>
                                                    <div class="news-body">
                                                        <h4 class="news-title text-center">
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
                        </div>
                        <div class="row">
                            @forelse(getSeventhCategoryData() as $key=>$value)
                                @if(isset($value->news))
                                    @if($loop->iteration > 2 && $loop->iteration < 7)
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
                                                <div class="news-body">
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
            <div class="col-lg-3" style="position:relative">
                @forelse(getAdsForHomePage() as $ad)
                    @if($ad->rank == 9)
                        <section class="ads py-3" style="position:sticky;top:50px"><a href="{{$ad->url}}"
                                                                                      title="{{$ad->title}}">
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
        <div class="row">
            <div class="col-lg-9">
                <div class="block ">
                    @if(getSixthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getSixthCategoryData()->first()->category->title ?? ' '}} </b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getSixthCategoryData()->first()->category->slug??'')}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body ">
                        <div class="row">
                            <div class="col-md-6">
                                @if(getSixthCategoryData()->first())
                                    @if(isset(getSixthCategoryData()->first()->news))
                                        <div class="news-block px-3">
                                            @php
                                                $slug = explode('/',getSixthCategoryData()->first()->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a class="row"
                                               href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image  img-f-b"
                                                     style="position:relative;clip-path: polygon(0% 0%, 100% 0%, 100% 93%, 74% 93%, 75% 100%, 65% 93%, 0 93%);">
                                                    <img
                                                        src="{{getSixthCategoryData()->first()->news->full_feature_image??''}}"/>
                                                </div>
                                                <div class="news-body mt-3">
                                                    <h4 class="news-title" style="font-style:italic">
                                                        {{getSixthCategoryData()->first()->news->title??''}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @forelse(getSixthCategoryData() as $key=>$value)
                                        @if(isset($value->news))
                                            @if($loop->iteration > 1 && $loop->iteration < 6)
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
                                                            <div class="news-image news-image-fixed1">
                                                                <img src="{{$value->news->full_feature_image??''}}">
                                                            </div>
                                                        </a>
                                                        <div class="news-body">
                                                            <h1 class="news-title-1 m-0 mt-2 text-center"
                                                                style="font-style:italic">
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
                </div>
            </div>
            <div class="col-lg-3" style="background:#F5F3F3">
                <div class="block px-4">
                    @if(getEighthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b> {{getEighthCategoryData()->first()->category->title}} </b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getEighthCategoryData()->first()->category->slug)}}">
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @forelse(getEighthCategoryData() as $key=>$value)
                            @if(isset($value->news))
                                @if($loop->iteration > 0 && $loop->iteration < 5)
                                    <div class="news-block">
                                        <div class="row mb-2">
                                            @php
                                                $slug = explode('/',$value->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <a class="row"
                                               href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="col-md-4">
                                                    <div class="news-image rounded">
                                                        <img src="{{$value->news->full_feature_image??''}}" alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="news-title-1 m-0">
                                                        {{$value->news->title??''}}
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($loop->iteration > 0 && $loop->iteration < 4)
                                    <hr/>
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









