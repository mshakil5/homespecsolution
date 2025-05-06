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

        <div class="app-title">
            @if(session()->has('message'))
                <section class="px-4">
                    <div class="row my-3">
                        <div class="alert alert-success" id="successMessage">{{ session()->get('message') }}</div>
                    </div>
                </section>
                @endif
                @if(session()->has('error'))
                <section class="px-4">
                    <div class="row my-3">
                        <div class="alert alert-danger" id="errMessage">{{ session()->get('error') }}</div>
                    </div>
                </section>
                @endif
        </div>
        


        <div id="contentContainer">


            <div class="row my-3">

                <div class="col-md-12 mt-2 text-center">
                    <div class="overflow">
                        <table class="table table-custom shadow-sm bg-white">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Email</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                ?>
                                @forelse ($contactmail as $data)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                        <a href="{{ route('contactmail.edit', $data->id)}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </main>
   
@endsection
@section('script')
<script>
    $(document).ready(function () {


        $("#addThisFormContainer").hide();
        $("#newBtn").click(function(){
            clearform();
            $("#newBtn").hide(100);
            $("#addThisFormContainer").show(300);

        });
        $("#FormCloseBtn").click(function(){
            $("#addThisFormContainer").hide(200);
            $("#newBtn").show(100);
            clearform();
        });

        function clearform(){
                $('#createThisForm')[0].reset();
            }

            setTimeout(function() {
                $('#successMessage').fadeOut('fast');
                $('#errMessage').fadeOut('fast');
            }, 3000);





    });





</script>
@endsection
