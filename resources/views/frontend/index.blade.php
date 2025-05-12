@extends('frontend.layouts.master')
@section('content')

<style>
    #cookiebarBox {
      position: fixed;
      bottom: 0;
      left: 5px;
      right: 5px;
      // display: none;
      z-index: 200;
    }

    #cookiebar {
      position: fixed;
      bottom: 0;
      left: 5px;
      right: 5px;
      display: none;
      z-index: 200;
    }

    #cookiebarBox {
      position: fixed;
      bottom: 0;
      left: 5px;
      right: 5px;
      // display: none;
      z-index: 200;
    }

    .containerrr {
      border-radius: 3px;
      background-color: white;
      color: #626262;
      margin-bottom: 10px;
      padding: 10px;
      overflow: hidden;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      position: fixed;
      padding: 20px;
      background-color: #fff;
      bottom: -10px;
      width: 100%;
      -webkit-box-shadow: 2px 2px 19px 6px #00000029;
      box-shadow: 2px 2px 19px 6px #00000029;
      border-top: 1px solid #356ffd1c;
    }
    
    .cookieok {
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      border-radius: 3px;
      background-color: #e8f0f3;
      color: #186782 !important;
      font-weight: 600;
      // float: right;
      line-height: 2.5em;
      height: 2.5em;
      display: block;
      padding-left: 30px;
      padding-right: 30px;
      border-bottom-width: 0 !important;
      cursor: pointer;
      max-width: 200px;
      margin: 0 auto;

    }

    .project-box {
    position: relative;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
    height: 100%;
  }
  
  .project-box:hover {
    transform: translateY(-5px);
  }
  
  .photo {
    position: relative;
    overflow: hidden;
  }
  
  .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.8;
    transition: opacity 0.3s ease;
  }
  
  .project-box:hover .play-icon {
    opacity: 1;
  }
  
  .category-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
  }
  
  .title {
    padding: 0 15px;
    color: #333;
    font-weight: 600;
  }

  #videoModal .modal-content {
    border: none;
    background: transparent;
  }
  
  #videoModal .modal-header {
    border: none;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 10;
  }
  
  #videoModal .btn-close {
    filter: invert(1);
    opacity: 0.8;
  }

  .home-about{
    font-size: 16px;
    line-height: 24px;
    margin-bottom: 0;
    /* font-family: sans-serif; */
  }

  .home-about .sectitle{
    color: #15363b;
    font-size: 30px;
    line-height: 1;
    letter-spacing: 0px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    line-height: 1.2;
  }

  #math-question {
      font-weight: bold;
      color: #2c3e50;
  }

</style>

@if($section_status->slider == 1)

{{-- <section class="banner">
    <img src="{{ asset('frontend/slider/' . (\App\Models\Slider::first()->photo ?? 'default.png')) }}" class="bannerPhoto">
    <div class="container h-100">
        <div class="row p-0 h-100 m-0">
            <div class="col-md-6 p-0 leftBlock"></div>
            <div class="col-md-6 p-0 position-relative d-flex align-items-center justify-content-center">
                <div class="w-100 p-4 slideText">
                    <h1 class="text-white sinking-bold display-5">{{\App\Models\Slider::first()->title ?? ''}}</h1>
                    <p class="text-white sinking-light para">{{\App\Models\Slider::first()->caption ?? ''}}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('getquote')}}" class="quote">
            Get a quote
        </a>
    </div>
</section> --}}

<section class="banner">
    <img src="{{ asset('frontend/slider/' . (\App\Models\Slider::first()->photo ?? 'default.png')) }}" class="bannerPhoto">
    <div class="container h-100 d-none d-md-flex">
        <div class="row p-0 h-100 m-0">
            <div class="col-md-6 p-0 leftBlock"></div>
            <div class="col-md-6 p-0 position-relative  d-flex align-items-center justify-content-center">
                <div class="w-100 p-4 slideText ">
                    <h1 class="text-white sinking-bold display-5">{{\App\Models\Slider::first()->title ?? ''}}</h1>
                    <p class=" text-white sinking-light para">{{\App\Models\Slider::first()->caption ?? ''}}</p>
                    </p>
                </div>
            </div>
        </div>
        <a href="{{ route('getquote')}}" class="quote">
            Get a quote
        </a>
    </div>
</section>

@endif

<section class="linkUp bg-secondary p-3 d-none">
    <div class="container">
        <div class="row text-center">
            <div class="links">
                <a href="{{ route('commercial')}}">Commercial</a>|
                <a href="{{ route('residential')}}">Residential</a>|
                <a href="{{ route('newbuild')}}">New Build</a>|
                <a href="{{ route('developing')}}">Developing</a>
            </div>
        </div>
    </div>
</section>

@if($section_status->about == 1)

<section class="py-5 steps" style="background-color: #eef4f7;">
  <div class="container px-4" id="featured-3">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="{{ asset('frontend/about/1.jpg') }}" alt="Home Improvement"
        class="img-fluid rounded" style="height: 300px; width: 100%; object-fit: cover;">
      </div>
      <div class="col-md-6">
        <div class="home-about p-4">
          <h2 class="sectitle text-uppercase sinking-bold fw-bold mb-3">
            {{\App\Models\Master::where('softcode','=','homeAbout')->first()->hardcode ?? ''}}</h2>
          <p style="text-align: justify;">
            {!! \App\Models\Master::where('softcode','=','homeAbout')->first()->details ?? ''!!}
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

@endif

@if($section_status->projects == 1)

@include('frontend.inc.projects')

@endif

@if($section_status->services == 1)

@include('frontend.inc.services')

@endif

@if($section_status->why_choose_us == 1)

<section class="border-top pt-3 projects">
  <div class="container px-4 mt-3">
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h1 class="sectitle pb-2 text-uppercase sinking-bold fw-bold">Why Choose Us</h1>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="accordion accordion-flush" id="whyChooseAccordion">
          @php
              $reasons = [
                  ['question' => 'Experienced Team', 'answer' => 'Our team brings years of experience in property management and client service.'],
                  ['question' => 'Trusted by Clients', 'answer' => 'We have built long-term trust with hundreds of satisfied clients.'],
                  ['question' => 'Affordable Prices', 'answer' => 'We offer competitive pricing without compromising quality.'],
                  ['question' => 'Quality Assurance', 'answer' => 'Each property is thoroughly vetted for quality and legal clarity.'],
                  ['question' => '24/7 Support', 'answer' => 'Our support team is available around the clock for your convenience.'],
              ];
          @endphp

          @foreach ($reasons as $index => $item)
            <div class="accordion-item mb-3 shadow-sm mb-3 rounded-3">
              <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                  <strong style="color: #15363b;">{{ $item['question'] }}</strong>
                </button>
              </h2>
              <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#whyChooseAccordion">
                <div class="accordion-body">
                  {{ $item['answer'] }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endif

@if($section_status->video_blog == 1)

@if($videoBlogCategories->count() > 0)
<section class="border-top pt-3 projects" style="background-color:rgba(224, 253, 255, 0.2);">
  <div class="container px-4 mt-3">
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h1 class="sectitle pb-2 text-uppercase sinking-bold fw-bold">Video Blogs</h1>
      </div>
    </div>
    
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      @foreach ($videoBlogCategories as $category)
        @foreach ($category->blogs as $videoBlog)
          <div class="feature col wow fadeInUp" data-wow-delay="0.6s">
            <div class="project-box shadow-sm">
              <a href="javascript:void(0);" onclick="showVideoModal('{{ asset($videoBlog->video) }}')" style="text-decoration:none;">
                <div class="photo">
                  <img src="{{ $videoBlog->thumbnail ? asset($videoBlog->thumbnail) : 'https://ionicframework.com/docs/img/demos/thumbnail.svg' }}" 
                       alt="{{ $videoBlog->title }}" 
                       class="img-fluid"
                       style="height: 200px; width: 100%; object-fit: cover;">
                  <div class="play-icon">
                    <span class="iconify" data-icon="ion:play-circle" style="font-size: 48px; color: white;"></span>
                  </div>
                </div>
                <h4 class="title mb-0 py-4">{{ $videoBlog->title }}</h4>
              </a>
              <div class="category-badge">
                {{ $category->name }}
              </div>
            </div>
          </div>
        @endforeach
      @endforeach
    </div>
  </div>
</section>
@endif

@endif

@if($section_status->get_in_touch == 1)

<section class="projects py-5 border-top">
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col-12">
        <h1 class="sectitle pb-2 text-uppercase sinking-bold fw-bold">Get In Touch</h1>
        <p class="text-muted">We’re here to assist you — reach out with your questions or needs.</p>
      </div>
    </div>

    <div class="row gy-4 align-items-stretch">
      <div class="col-lg-5">
        <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
          <iframe src="{{\App\Models\CompanyDetail::first()->google_appstore_link}}" width="100%" 
            height="100%" 
            style="border:0; min-height: 320px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>        
      </div>

      <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-body p-4">
            <h5 class="card-title fw-bold mb-4">Contact Form</h5>
            <form class="row g-3" id="contactForm" >
              @csrf
              <div class="ermsg2"></div>
              <div id='loader' style='display:none;'>
                  <img src="{{ asset('images/loader/small-loader.gif') }}" height="50px" id="loading-image" alt="Loading..." />
                  &nbsp; &nbsp; &nbsp;
                  <p style="margin-top: 10px">Sending your message ..... </p>
              </div>
              <div class="col-md-6">
                  <input type="text" name="fname" class="form-control rounded-3" placeholder="First Name" required id="fname">
              </div>
              <div class="col-md-6">
                  <input type="text" name="lname" class="form-control rounded-3" placeholder="Last Name" id="lname">
              </div>
              <div class="col-6">
                  <input type="email" name="email" class="form-control rounded-3" placeholder="Email Address" required id="email">
              </div>
              <div class="col-6">
                  <input type="number" name="phone" class="form-control rounded-3" placeholder="Phone" required id="phone">
              </div>
              <div class="col-12">
                  <textarea name="message" rows="5" class="form-control rounded-3" placeholder="Your Message" required id="message"></textarea>
              </div>
              <div class="col-12">
                  <div class="form-group mb-3">
                      <label for="math_captcha" class="form-label">Human Verification: What is <span id="math-question"></span>?</label>
                      <input type="text" class="form-control rounded-3" id="math_captcha" placeholder="Your answer" required>
                  </div>
              </div>
              <div class="col-12">
                  <input type="submit" id="submit" value="Send Message" class="btn bg-theme text-white mt-3" disabled>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

@endif

<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0">
      <div class="modal-header p-2 border-0">
        <h5 id="modalTitle" class="modal-title fw-bold text-dark m-0"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-3 pb-3 pt-2">
        <video id="videoBlogPlayer" class="img-fluid rounded mb-2"
               style="width: 100%; height: 300px; object-fit: cover;" controls></video>
        <div id="modalDesc" class="text-muted" style="max-height: 350px; overflow-y: auto; font-size: 14px;"></div>
      </div>
    </div>
  </div>
</div>

<div id="cookiebarBox" class="os-animation" data-os-animation="fadeIn" >
  <div class="containerrr risk-dismiss " style="display: flex;" >
        <div class="container">
          <div class="row">
              <div class="col-md-9">
              <p class="text-left">
             <h1 class="d-inline text-primary"><span class="iconify" data-icon="iconoir:half-cookie"></span> </h1>
             Like most websites, this site uses cookies to assist with navigation and your ability to provide feedback, analyse your use of products and services so that we can improve them, assist with our personal promotional and marketing efforts and provide consent from third parties.
          </p>

              </div>
              <div class="col-md-3 d-flex align-items-center justify-content-center">
                  <a id="cookieBoxok" class="btn btn-sm btn-primary my-3 px-4 text-center" data-cookie="risk" style="background-color: #ee9a40; color: #fff; border:none; font-weight: 600;">Accept</a>
              </div>
          </div>
        </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Generate random math question
      function generateMathQuestion() {
          const num1 = Math.floor(Math.random() * 10) + 1;
          const num2 = Math.floor(Math.random() * 10) + 1;
          const operators = ['+', '-'];
          const operator = operators[Math.floor(Math.random() * operators.length)];
          
          let question, answer;
          if (operator === '+') {
              question = `${num1} + ${num2}`;
              answer = num1 + num2;
          } else {
              // Ensure we don't get negative answers
              if (num1 >= num2) {
                  question = `${num1} - ${num2}`;
                  answer = num1 - num2;
              } else {
                  question = `${num2} - ${num1}`;
                  answer = num2 - num1;
              }
          }
          
          return { question, answer };
      }
  
      // Initialize math captcha
      let currentAnswer;
      function initCaptcha() {
          const { question, answer } = generateMathQuestion();
          document.getElementById('math-question').textContent = question;
          currentAnswer = answer;
      }
      initCaptcha();
  
      // Validate captcha and enable/disable submit button
      const mathInput = document.getElementById('math_captcha');
      const submitBtn = document.getElementById('submit');
      
      mathInput.addEventListener('input', function() {
          const userAnswer = parseInt(mathInput.value.trim());
          submitBtn.disabled = userAnswer !== currentAnswer;
      });
  });
</script>

<script>
  function showVideoModal(videoUrl) {
    const modal = new bootstrap.Modal(document.getElementById('videoModal'));
    const videoElement = document.getElementById('videoBlogPlayer');

    videoElement.src = videoUrl;
    modal.show();

    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
      videoElement.pause();
      videoElement.removeAttribute('src');
    }, { once: true });
  }
</script>

{{-- @include('frontend.inc.contact') --}}

@endsection

@section('script')

<script>
  // if you want to see a cookie, delete 'seen-cookiePopup' from cookies first.

  jQuery(document).ready(function($) {
  // Get CookieBox
  var cookieBox = document.getElementById('cookiebarBox');
      // Get the <span> element that closes the cookiebox
  var closeCookieBox = document.getElementById("cookieBoxok");
      closeCookieBox.onclick = function() {
          cookieBox.style.display = "none";
      };
  });

  (function () {

      /**
       * Set cookie
       *
       * @param string name
       * @param string value
       * @param int days
       * @param string path
       * @see http://www.quirksmode.org/js/cookies.html
       */
      function createCookie(name, value, days, path) {
          var expires = "";
          if (days) {
              var date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              expires = "; expires=" + date.toGMTString();
          }
          else expires = "";
          document.cookie = name + "=" + value + expires + "; path=" + path;
      }

      function readCookie(name) {
          var nameEQ = name + "=";
          var ca = document.cookie.split(';');
          for (var i = 0; i < ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0) == ' ') c = c.substring(1, c.length);
              if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
          }
          return null;
      }

      // Set/update cookie
      var cookieExpiry = 30;
      var cookiePath = "/";

      document.getElementById("cookieBoxok").addEventListener('click', function () {
          createCookie('seen-cookiePopup', 'yes', cookieExpiry, cookiePath);
      });

      var cookiePopup = readCookie('seen-cookiePopup');
      if (cookiePopup != null && cookiePopup == 'yes') {
          cookiebarBox.style.display = 'none';
      } else {
          cookiebarBox.style.display = 'block';
      }
  })();

</script>

<script>
  $(document).ready(function () {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    var url = "{{URL::to('/contact-submit')}}";
    $("#submit").click(function(){
        $("#submit").prop('disabled', true);
        $("#loader").show();
            var fname= $("#fname").val();
            var lname= $("#lname").val();
            var email= $("#email").val();
            var phone= $("#phone").val();
            var message= $("#message").val();
            $.ajax({
                url: url,
                method: "POST",
                data: {fname,lname,email,phone,message},
                success: function (d) {
                    if (d.status == 303) {
                        $(".ermsg2").html(d.message);
                        $("#submit").prop('disabled', false);
                        $("#submit").val('Send Message');
                    }else if(d.status == 300){
                        $(".ermsg2").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                    }
                },
                complete:function(d){
                    $("#loader").hide();
                    },
                error: function (d) {
                    console.log(d);
                }
            });

    });
  });
</script>
@endsection