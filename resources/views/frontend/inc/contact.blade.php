
<footer id="footer">
    <div class="footer-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-5">
                    <h1 class="text-theme sinking-bold mb-2">Contact Us</h1>
                    <h4 class="sinking">{{\App\Models\Master::where('softcode','=','contact')->first()->hardcode ?? ''}} </h4>
                    <p class="sinking">{!!\App\Models\Master::where('softcode','=','contact')->first()->details ?? ''!!}</p>
                </div>
                <div class="col-lg-6">
                    <div class="ermsg"></div>
                    <div id='loader' style='display:none;'>
                        <img src="{{ asset('images/loader/small-loader.gif') }}" height="50px" id="loading-image" alt="Loading..." />
                        &nbsp; &nbsp; &nbsp;
                        <p style="margin-top: 10px">Sending your message ..... </p>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label mb-1" for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label mb-1" for="femail">Email Address</label>
                                <input type="email" class="form-control" name="femail" id="femail"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="label mb-1" for="#">Message</label>
                                <textarea name="fmessage" class="form-control" id="fmessage" cols="30" rows="4"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit"  id="fcontact" onClick="this.disabled=true; this.value='Sending….';"  value="Send Message" class="btn btn-danger mt-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>