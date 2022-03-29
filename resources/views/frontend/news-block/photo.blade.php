<section class="video py-5"  >
    <div class="container">
          <div class="block-header" style="border:none" >
        <div class="container">
           {{-- <div class="d-flex" style="align-items: center;justify-content: space-between;">
                <h3  class=""><b>Photofeature</b></h3>
                <h6 class="see-all"><a class="" href="{{route('display.all.videos')}}"> 
                  सबै हेर्नुहोस् <i class="fas fa-chevron-right"></i>
                </a></h6>
            </div>--}}
        </div>
    </div>
        <div class="row">
                     
         
                <div class="col-md-12">
               
                    <div class="news-block ">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                                   @forelse(getPhotoFeature() as $photo)
                             @if($loop->iteration ==1)
                            <div class="carousel-item active">
                                 <a class="row" href="{{$photo->url}}">
                                    <div class="news-image v-item col-md-6 col-lg-8 pe-md-0 p-image">
                                      <img src="{{$photo->image}}"/>
                                    </div>
                                    <div class="col-md-6 col-lg-4 ps-md-0" style=" background:#333333">
                                       <div class="photo-description" >
                                            <button style="background:gray" class="text-white px-3 py-2">Photos</button>
                                        <div class="news-title text-white" style="font-size: 18px;">
                                            {!! Str::limit($photo->description,250) !!}
                                        </div>
                                       </div>
                                    </div>
                                 </a>
                                </div>
                                         @endif
                                            @if($loop->iteration ==2)
                            <div class="carousel-item ">
                                 <a class="row" href="{{$photo->url}}">
                                    <div class="news-image v-item col-md-6 col-lg-8 pe-md-0 p-image">
                                      <img src="{{$photo->image}}"/>
                                    </div>
                                    <div class="col-md-6 col-lg-4 ps-md-0" style=" background:#333333">
                                       <div class="photo-description">
                                            <button style="background:gray" class="text-white px-3 py-2">Photos</button>
                                        <div class="news-title text-white" style="font-size: 18px;">
                                            {!! Str::limit($photo->description,250) !!}
                                        </div>
                                       </div>
                                    </div>
                                 </a>
                                </div>
                                         @endif
                @empty
                        @endforelse
                        </div>
                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            </div>
                        </div>
                

                    </div>
                </div>
          
        </div>

    </div>
</section>