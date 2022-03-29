@section('style')
<style>
        .v-item{
             height:500px;
         }
             .v-item>iframe{
                 width:100%;
                 height:100%;
             }
             .m-item{
                  height:250px;
             }
               .m-item>iframe{
                 width:100%;
                 height:100%;
             }
</style>
@endsection
<section class="video py-5" style="background:#F5F3F3">
  
    <div class="container">
          <div class="block-header" >
        <div class="container">
            <div class="d-flex" style="align-items: center;justify-content: space-between;">
                <h3  class=""><b>भिडियो</b></h3>
                <h6 class="see-all"><a class="" href="{{route('display.all.videos')}}"> 
                  सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                </a></h6>
            </div>
        </div>
    </div>
        <div class="row">
            @if(getVideoSection()->first())
                <div class="col-md-12">
                    <div class="news-block ">
                        <a class="row" href="{{getVideoSection()->first()->url}}">
                            <div class="news-image v-item col-lg-8 col-md-12 pe-md-0">
                                {!! getVideoSection()->first()->video_html !!}
                            </div>
                            <div class="col-lg-4 col-md-12  ps-md-0" style=" background:#333333">
                               <div style="padding: 80px 50px; ">
                                    <button style="background:gray" class="text-white px-3 py-2">भिडियो</button>
                                <h1 class="news-title text-white" style="font-size: 50px;">
                                    {{getVideoSection()->first()->title}}
                                </h1>
                               </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            
           
                @forelse(getVideoSection() as $video)
                    @if($loop->iteration >1)
                
                     <div class="col-md-4 col-lg-3">
                        <div class="news-block overlay-1">
                            <a href="{{$video->url}}">
                                <div class="news-image m-item">
                                    {!! $video->video_html !!}
                                </div>
                                <div class="news-body" style="width: 100%; padding: 40px 50px;">
                                    
                                    <h1 class="news-title text-white" style="font-size: 22px;">
                                        {{$video->title}}
                                    </h1>
                                </div>
                            </a>
                        </div>
                          </div>
                    @endif
                @empty
                @endforelse
          
        </div>
    </div>
</section>
