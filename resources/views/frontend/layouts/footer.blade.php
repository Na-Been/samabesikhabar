<!-- footer -->
<footer class="pt-5">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-top:25px ;border-right:1px solid #ccc">
                    @if(getSetting('logo'))
                        <img width="80%" src="{{getSetting('logo')}}" alt=""/>
                    @else
                        <img width="100%"
                             src="https://www.samabesikhabar.com/wp-content/uploads/2019/06/samabesi_logo.png"
                             alt=""/>
                    @endif
                    <br><br>
                    <ul class="ms-4 d-flex align-items-center t-social-media">
                        <li><a href="">
                                <i class="fab fa-facebook-f"></i>
                            </a></li>
                        <li><a href="">
                                <i class="fab fa-twitter"></i>
                            </a></li>
                        <li><a href="">
                                <i class="fab fa-youtube"></i>
                            </a></li>
                    </ul>


                    <ul class="team ps-lg-4 mt-4">
                        <li class="me-5">
                            <h6>
                                <b>{{getSetting('site_title')}} | </b>:
                                {{getSetting('address')}}
                            </h6>

                        </li>
                        <li class="me-5">
                            <h6>
                                <b>सूचना विभाग दर्ता नं</b>
                                :{{getSetting('registration_number')}}
                            </h6>
                        </li>

                        <li class="me-5">

                            <h6>
                                <b>सम्पर्क</b>
                                :{{getSetting('mobile_number').' | '.getSetting('phone_number')}}
                            </h6>
                        </li>
                        <li class="me-5">

                            <h6>
                                <b>इमेल</b> :{{getSetting('email')}}
                            </h6>
                        </li>
                    </ul>

                </div>
                <div class="col-md-2 mt-4 ps-md-5">
                    <h3 class="footer-title text-white">Quick Links</h3>
                    <ul class="quick-link">
                        <li><a class="" href="/">गृहपृष्ठ</a></li>
                        <li><a class="" href="/">भिडियो</a></li>
                        <li><a class="" href="/">भर्खरै</a></li>
                        <li><a class="" href="/">राजनीति</a></li>
                        <li><a class="" href="/">देश/समाज</a></li>
                    </ul>

                </div>
                <div class="col-md-2 mt-4">
                    <h3 class="footer-title text-white">Our Team</h3>
                    <ul class="team ">
                        <li class="me-5">
                            <b>अध्यक्ष तथा सम्पादक</b>
                            <h6>
                                {{getSetting('director')}}
                            </h6>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mt-4">
                    <h3 class="footer-title text-white">Download Our App</h3>
                    <div class="header_ads">
                        <img width="100%"
                             src="http://samabesi.namunacomputer.com/storage/photos/1/2-new-banner-hospitalized-rider-scaled.gif"
                             alt="">
                    </div>
                    <ul class="d-flex mt-md-4 footer-app">
                        <li style="width:150px">
                            <a class="/">
                                <img width="100%" height="100%" src="{{asset('frontend/app-store.png')}}"/>
                            </a>
                        </li>
                        <li style="width:150px">
                            <a class="/">
                                <img width="100%" src="{{asset('frontend/googleplay.png')}}"/>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom mt-5" style="background: #102747">
        <div class="container">
            <p class="text-center text-white py-3 m-0">
                © {{now()->year}} {{getSetting('site-title')??'samabesikhabar News'}} . All Rights Reserved | Developed
                by:
                Namuna Computer
            </p>
        </div>
    </div>
</footer>
<style>

    .fix_footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #c9d4d5;
        color: white;
        text-align: center;
        z-index: 9;
        margin-bottom: 0px;
    }

    span.close {
        animation: auto;
        background: red;
        padding: 8px;
        font-size: 13px;
        float: right;
        position: relative;
        border-radius: 20%;
        margin-bottom: -55px;
        margin-t0: -2px;

    }

</style>


<div class="fix_footer">

    <div class="nnews-container">
        <span class="close"> &times; </span>
        <div class="full-width-ads">
            <div class="container">
                <!-- <img width="100%" src="http://samabesi.namunacomputer.com/storage/photos/1/2-new-banner-hospitalized-rider-scaled.gif" alt="">
            -->
                Footer ads
            </div>
        </div>


    </div>

</div>

<script>
    var closebtns = document.getElementsByClassName("close");
    var i;

    for (i = 0; i < closebtns.length; i++) {
        closebtns[i].addEventListener("click", function () {
            this.parentElement.style.display = 'none';
        });
    }
</script>

<!--header popup-->


<button onclick="topFunction()" id="scroll-btn" title="Go to top"><i class="fas fa-chevron-up"></i></button>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('front/slick-1.8.1/slick/slick.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60814e434003525e"></script>
<script>
        $('.close-video').click(function(){
            $('.live-video').addClass('hide')
        })


    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 150) {
            $(".navbar").addClass('header-sticky');
        } else {
            $(".navbar").removeClass('header-sticky');
        }
    })
</script>
<script>
    $(document).ready(function () {
        $('.search-btn').click(function () {

            $('.search-form').toggleClass('show')

        })
    })
</script>
<script>
    var disqus_config = function () {
        this.page.url = window.location.href;
        this.page.identifier = window.location.href;
    };

    (function () {
        var d = document, s = d.createElement('script');
        s.src = 'https://samabesi-khabar.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<script>
    $(document).ready(function (e) {


        $("#sidebar-close").on("click", function () {
            $("#sidebar").removeClass("open-sidebar");
        });
    });
    $("#menu-bar").click(function () {
        $("#sidebar").toggleClass("open-sidebar");
    });


    var mybutton = document.getElementById("myBtn");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
@yield('script')




