@extends('admin.layouts.admin')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div id="addThisFormContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Contact mail Edit</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="tile">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form action="{{ route('contactmail.update', $mail->id) }}" method="POST" enctype="multipart/form-data" id="createThisForm">
                                                @csrf

                                                <div>
                                                    <label for="">Email</label>
                                                    <input type="text" name="name" id="name" placeholder="Title1" class="form-control" value="{{ $mail->name }}">
                                                </div>

                                        </div>
                    
                                        <div class="col-lg-6">
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="tile-footer">
                                        <button class="btn btn-theme mt-2 btn-success">Update</button>
                                    </form>
                    
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        


    </main>
   
@endsection
@section('script')

@endsection
