@extends('frontend.layouts.master')
@section('content')



<section class="breadcrumb imageContent mb-0">
    <img src="{{ asset('images/banner/'.\App\Models\Banner::where('name','=', 'category')->first()->image) }}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
        <h2>Category</h2>
    </div>
</section>

<section class="border-top  py-0 projects">
    <div class="container px-4 mt-3">
        
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            @foreach (\App\Models\Category::orderby('id','DESC')->get() as $data)
            <div class="feature col">
                <div class="project-box shadow-sm">
                    <a href="{{ route('allcategory', $data->id)}}" style="text-decoration:none;">
                        <div class="photo">
                            <img src="{{ asset('images/category/'.$data->image) }}" class="img-fluid">
                            <div class="bottomInfo">
                            </div>
                        </div>
                        <h4 class="title">{{ $data->name}}</h4>
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