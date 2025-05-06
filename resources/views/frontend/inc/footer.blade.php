<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

              @php
                  $company_logo = \App\Models\CompanyDetail::select('company_logo')->first();
              @endphp

                <div class="col-lg-3 col-md-6 footer-links">
                    <a class="navbar-brand" href="{{ route('homepage')}}">
                        <img src="{{asset('images/company/'.$company_logo->company_logo)}}" class="p-1 img-fluid mx-auto" width="220px">
                    </a>
                    <div class="footer-contact" style="margin-left: 20px">
                        <div class="customer-support">
                            <div class="customer-support-icon">
                                <img src="{{ asset('frontend/images/support-icon.png') }}" alt="">
                            </div>
                            <div class="customer-support-text">
                                <span>Customer Support</span>
                                <a class="customer-support-text-phone" href="tel:{{ App\Models\CompanyDetail::select('phone1')->first()->phone1 }}">
                                    {{ App\Models\CompanyDetail::select('phone1')->first()->phone1 }}
                                </a>                   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('homepage')}}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about')}}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('terms')}}">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-contact ">
                    <h4>Contact Us</h4>
                    <p>{!!\App\Models\CompanyDetail::first()->address!!} <br> <strong>Phone:</strong>
                        {{\App\Models\CompanyDetail::first()->phone1}} <br> <strong>Email:</strong> {{\App\Models\CompanyDetail::first()->email1}}<br> </p>
                </div>
                <div class="col-lg-3 col-md-6 footer-info">
                    <h3 class="text-uppercase">About Homespecsolution</h3>
                    <p>{{\App\Models\CompanyDetail::first()->footer_link}}</p>
                    <div class="social-links mt-3">
                        <a href="{{\App\Models\CompanyDetail::first()->twiter}}" class="twitter">
                            <span class="iconify" data-icon="bxl:twitter"></span>
                        </a>
                        <a href="{{\App\Models\CompanyDetail::first()->facebook}}" class="facebook">
                            <span class="iconify" data-icon="bxl:facebook"></span>
                        </a>
                        <a href="{{\App\Models\CompanyDetail::first()->instagram}}" class="instagram">
                            <span class="iconify" data-icon="bxl:instagram-alt"></span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright text-white">Copyright © {{ date('Y') }} <strong>
                <span>Homespecsolution</span></strong>
                Design & Developed By: <a href="https://mentosoftware.co.uk" target="_blank"></a><br>
                <a href="https://mentosoftware.co.uk" target="_blank" class="text-white">Mento Software</a>
        </div>
    </div>
</footer>

<style>
  .customer-support {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: none
}

@media (min-width:992px) {
  .customer-support {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex
  }
}

.customer-support-icon {
  min-width: 32px;
  margin-right: 15px
}

.customer-support-text-phone {
  display: block;
  font-size: 17px;
  line-height: 27px;
  font-weight: 600;
  color: #666;
  font-family: Raleway, sans-serif
}

@media (min-width:1200px) {
  .customer-support-text-phone {
    font-size: 24px
  }
}

.customer-support-text-phone:hover {
  color: #ea1c26
}
</style>