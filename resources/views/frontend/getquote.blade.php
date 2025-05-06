@extends('frontend.layouts.master')
@section('content')

<section class="breadcrumb imageContent mb-0">
    <img src="{{ asset('images/banner/'.\App\Models\Banner::where('name','=', 'quote')->first()->image) }}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
        <h2>Contact Your Builders Ltd</h2>
        <small><a href="" >Your Builders London</a>  /  Contact Your Builders London Ltd</small>
    </div>
</section>

<section class="infoBox py-5">
   <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="box text-center">
                        <h6><span class="iconify fs-2" data-icon="carbon:phone-voice-filled"></span> {{\App\Models\CompanyDetail::first()->phone1}}</h6>
                        <small>Get in touch with us</small>
                    </div>
                </div>
                <div class="col-md-6 ">
                   <div class="box text-center">
                    <h6> <span class="iconify fs-2" data-icon="ic:round-email"></span> {{\App\Models\CompanyDetail::first()->email1}}</h6>
                    <small>Send us an e-mail</small>
                   </div>
                </div>
            </div>
            <div class="ermsg"></div>
            <div id='loader' style='display:none;'>
                <br><br>
                <img src="{{ asset('images/loader/small-loader.gif') }}" height="50px" id="loading-image" alt="Loading..." />
                &nbsp; &nbsp; &nbsp;
                <p style="margin-top: 10px">Sending your message ..... </p>
           </div>
            <div class="row my-5">
                <div class="col-md-12" >
                    <div class="row p-4 m-0"style="background: #dddddd;">
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="qfname">First Name</label>
                                <input type="text" class="form-control" name="qfname" id="qfname" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="qlname">Last Name</label>
                                <input type="text" class="form-control" name="qlname" id="qlname" placeholder=" ">
                            </div>

                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="email">Email Address</label>
                                <input type="email" class="form-control" name="qemail" id="qemail" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="email">Phone</label>
                                <input type="text" class="form-control" name="qphone" id="qphone" placeholder=" ">
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="#">Property Located</label>
                                <input type="text" class="form-control" name="qplocated" id="qplocated" placeholder=" ">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="qmessage">Message</label>
                                <textarea name="qmessage" class="form-control" id="qmessage" cols="30" rows="4" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="#">Images/Plans</label>
                                <input type="file" id="qfiles" name="qfiles" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" id="getquote" onClick="this.disabled=true; this.value='Sending….';" value="Send Message" class="btn bg-theme  text-white mt-3">
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



@include('frontend.inc.contact')

@endsection

@section('script')

<script>
     var storedFiles = [];
    $(document).ready(function () {

     //header for csrf-token is must in laravel
     $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

                //  make mail start
                var url = "{{URL::to('/contact-getquote')}}";
                $("#getquote").click(function(){

                    $("#loader").show();

                    var file_data = $('#qfiles').prop('files')[0];
                    var form_data = new FormData();

                    // len_files = $("#qfiles").prop("files").length;
                    // for (var i = 0; i < len_files; i++) {
                    //     var file_data = $("#qfiles").prop("files")[i];
                    //     storedFiles.push(file_data);
                    // }

                    // for(var i=0, len=storedFiles.length; i<len; i++) {
                    //     form_data.append('qfiles[]', storedFiles[i]);
                    // }

                    form_data.append("fname", $("#qfname").val());
                    form_data.append("lname", $("#qlname").val());
                    form_data.append("email", $("#qemail").val());
                    form_data.append("phone", $("#qphone").val());
                    form_data.append("plocated", $("#qplocated").val());
                    form_data.append("message", $("#qmessage").val());
                    form_data.append('qfiles', file_data);


                        $.ajax({
                            url: url,
                            method: "POST",
                            contentType: false,
                            processData: false,
                            data:form_data,
                            success: function (d) {
                                if (d.status == 303) {
                                    $(".ermsg").html(d.message);
                                    $("#getquote").prop('disabled', false);
                                    $("#getquote").val('Send Message');
                                }else if(d.status == 300){
                                    $(".ermsg").html(d.message);
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
