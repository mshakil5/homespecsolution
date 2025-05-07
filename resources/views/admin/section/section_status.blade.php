@extends('admin.layouts.admin')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-toggle-on"></i> Section Status</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Section Status</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Section Status</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('updateSectionStatus') }}" method="POST">
                            @csrf

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Section</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Slider</td>
                                            <td>
                                                <select name="slider" id="slider" class="form-control">
                                                    <option value="1" {{ $status->slider ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->slider ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>About</td>
                                            <td>
                                                <select name="about" id="about" class="form-control">
                                                    <option value="1" {{ $status->about ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->about ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Projects</td>
                                            <td>
                                                <select name="projects" id="projects" class="form-control">
                                                    <option value="1" {{ $status->projects ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->projects ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Services</td>
                                            <td>
                                                <select name="services" id="services" class="form-control">
                                                    <option value="1" {{ $status->services ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->services ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Why Choose Us</td>
                                            <td>
                                                <select name="why_choose_us" id="why_choose_us" class="form-control">
                                                    <option value="1" {{ $status->why_choose_us ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->why_choose_us ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Video Blog</td>
                                            <td>
                                                <select name="video_blog" id="video_blog" class="form-control">
                                                    <option value="1" {{ $status->video_blog ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->video_blog ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Get In Touch</td>
                                            <td>
                                                <select name="get_in_touch" id="get_in_touch" class="form-control">
                                                    <option value="1" {{ $status->get_in_touch ? 'selected' : '' }}>On</option>
                                                    <option value="0" {{ !$status->get_in_touch ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
