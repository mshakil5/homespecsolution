@extends('frontend.layouts.master')
@section('content')


<section class="breadcrumb imageContent mb-0">
    <img src="{{ asset('images/banner/'.\App\Models\Banner::where('name','=', 'contact')->first()->image) }}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
        <h2>Contact Us</h2>
    </div>
</section>



<section class="infoBox py-5">
   <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row mb-5">
                <div class="col-md-12" >
                    <div class="row p-4 m-0"style="background: #dddddd;">
                        <div class="ermsg2"></div>
                        <div id='loader' style='display:none;'>
                            <img src="{{ asset('images/loader/small-loader.gif') }}" height="50px" id="loading-image" alt="Loading..." />
                            &nbsp; &nbsp; &nbsp;
                            <p style="margin-top: 10px">Sending your message ..... </p>
                       </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="name">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="name">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder=" ">
                            </div>

                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="email">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder=" ">
                            </div>
                        </div>


                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="#">Message</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" id="submit" onClick="this.disabled=true; this.value='Sending….';" value="Send Message" class="btn bg-theme  text-white mt-3">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4" style="background-color: #ddd;">
             <h4 class="text-center bg-theme text-white p-2">Contact Address</h4>
             <div class="my-3">
                <b>{{\App\Models\CompanyDetail::first()->company_name}}</b> <br>
                <span class="sinking-light">
                    {!!\App\Models\CompanyDetail::first()->address!!}
                </span>

                <h5 class="mt-4 ">Opening Hours</h5>
                <small class="sinking-light">  {{\App\Models\CompanyDetail::first()->google_play_link}}</small>

             </div>
            </div>
         </div>
    </div>

   </div>
</section>

<section class=" ">
    <div class="container">
        <div class="row mb-4">
            <iframe src="{{\App\Models\CompanyDetail::first()->google_appstore_link}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
</section>





@endsection

@section('script')
<script>
     $(document).ready(function () {


 //header for csrf-token is must in laravel
 $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            //  make mail start
            var url = "{{URL::to('/contact-submit')}}";
            $("#submit").click(function(){
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
            // send mail end


});
</script>
@endsection
