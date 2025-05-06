@if(\App\Models\Property::count() > 0)
<section class="border-top  pt-3 projects">
    <div class="container px-4 mt-2">  

      <div class="row mb-2">
          <div class="col-12 text-center">
              <h1 class="sectitle pb-2 text-uppercase sinking-bold fw-bold">Our Latest Projects</h1>
          </div>
      </div>

        <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
            @foreach (\App\Models\Property::limit(9)->orderBy('id','DESC')->get() as $data)
                <div class="feature col">
                    <div class="project-box shadow-sm">
                        <a href="{{ route('property-details', $data->id)}}" style="text-decoration:none;">
                            <div class="photo">
                                <img src="{{ asset('images/property/'.$data->image) }}" class="img-fluid" style="height: 250px; object-fit: cover;">
                                <div class="bottomInfo">
                                    <div><span class="iconify" data-icon="clarity:map-marker-solid"></span> {{ $data->location}}</div>
                                    <div><span class="iconify" data-icon="ant-design:camera-filled"></span> {{ $data->view}}</div>
                                </div>
                            </div>
                            <h4 class="title mb-0 py-4">{{ $data->title}}</h4>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif