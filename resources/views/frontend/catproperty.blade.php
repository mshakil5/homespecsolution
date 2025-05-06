@extends('frontend.layouts.master')
@section('content')


<section class="breadcrumb imageContent mb-0">
    <img src="{{ asset('images/category/'.\App\Models\Category::where('id','=', $id)->first()->image) }}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
        <h2>{{ \App\Models\Category::where('id','=', $id)->first()->name }}</h2>
    </div>
</section>

<section class="border-top  py-0 projects" style="padding-top: 140px">
    <div class="container px-4 mt-3">
        
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            @foreach ($property as $data)
            <div class="feature col">
                <div class="project-box shadow-sm">
                    <a href="{{ route('property-details', $data->id)}}" style="text-decoration:none;">
                        <div class="photo">
                            <div class="tag">{{ \App\Models\Category::where('id','=', $data->category_id)->first()->name }}</div>
                            <img src="{{ asset('images/property/'.$data->image) }}" class="img-fluid">
                            <div class="bottomInfo">
                                <div><span class="iconify" data-icon="clarity:map-marker-solid"></span> {{ $data->location}}</div>
                                <div><span class="iconify" data-icon="ant-design:camera-filled"></span> {{ $data->view}}</div>
                            </div>
                        </div>
                        <h4 class="title">{{ $data->title}}</h4>
                    </a>
                </div>

            </div>
        @endforeach
           
            
        </div>
    </div>

</section>



@include('frontend.inc.contact')


@endsection

@section('script')

@endsection