<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="block">
                    @if(getSixteenCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getSixteenCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href={{route('category-slug',getSixteenCategory()->first()->category->slug)}}>
                                    सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                                </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getSixteenCategory()->first())
                                @if(isset(getSixteenCategory()->first()->news))
                                    <div class="col-lg-6 col-md-6">
                                        @php
                                            $slug = explode('/',getSixteenCategory()->first()->news->slug);
                                            $slug1 = $slug[0];
                                            $slug2 = $slug[1];
                                            $slug3 = $slug[2];
                                            $slug4 = $slug[3];
                                        @endphp
                                        <div class="news-block">
                                            <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                <div class="news-image img-f-m">
                                                    <img
                                                        src="{{getSixteenCategory()->first()->news->full_feature_image??''}}"/>
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title"> {{getSixteenCategory()->first()->news->title??''}}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="col-lg-3 col-md-6">
                                @forelse(getSixteenCategory() as $key=>$value)
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
                                                    <div class="news-image">
                                                        <img src="{{$value->news->full_feature_image??''}}"/>
                                                    </div>
                                                    <div class="news-body">
                                                        <p class="news-title-1">
                                                            {{$value->news->title??''}}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                @empty
                                @endforelse
                            </div>
                            <div class="col-lg-3 col-md-12">
                                @forelse(getSixteenCategory() as $key=>$value)
                                    @if(isset($value->news))
                                        @if($loop->iteration > 3 && $loop->iteration < 8)
                                            @php
                                                $slug = explode('/',$value->news->slug);
                                                $slug1 = $slug[0];
                                                $slug2 = $slug[1];
                                                $slug3 = $slug[2];
                                                $slug4 = $slug[3];
                                            @endphp
                                            <div class="news-block">
                                                <a href="{{route('news-detail',[$slug1,$slug2,$slug3,$slug4])??''}}">
                                                    <div class="row mb-2">
                                                        <div class="col-md-5">
                                                            <div class="news-image im-f-1">
                                                                <img src="{{$value->news->full_feature_image??''}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
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
            </div>
        </div>
    </div>
</section>
