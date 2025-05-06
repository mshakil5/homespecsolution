@extends('admin.layouts.admin')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-cogs"></i> Services</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Services</a></li>
            </ul>
        </div>

        <div id="addThisFormContainer">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 id="header-title">Add New Service</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="ermsg"></div>
                                <div class="container">
                                    <form id="createThisForm">
                                        @csrf
                                        <input type="hidden" class="form-control" id="codeid" name="codeid">
                                        
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter service title">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter service description"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Upload Image (max 5MB)</label>
                                            <input type="file" name="image" id="imageUpload" accept="image/*" class="form-control-file">
                                        </div>
                                        
                                        <hr>
                                        <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                        <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <button id="newBtn" type="button" class="btn btn-info">Add New</button>
        <hr>

        <div id="contentContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Services List</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="container">
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $service)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>
                                                    @if($service->image)
                                                    <img src="{{ asset($service->image) }}" alt="Service Image" style="max-width: 100px; width: 100%; height: auto;">
                                                    @else
                                                    <img src="https://ionicframework.com/docs/img/demos/thumbnail.svg" alt="Default Image" style="max-width: 100px; width: 100%; height: auto;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input toggle-status" 
                                                               id="customSwitchStatus{{ $service->id }}" 
                                                               data-id="{{ $service->id }}" 
                                                               {{ $service->status == 1 ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customSwitchStatus{{ $service->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a id="EditBtn" rid="{{ $service->id }}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                    <a id="deleteBtn" rid="{{ $service->id }}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
<!-- FilePond scripts -->
<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet" />
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize FilePond
        FilePond.registerPlugin(
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
            FilePondPluginImagePreview
        );

        FilePond.create(document.querySelector('#imageUpload'), {
            acceptedFileTypes: ['image/*'],
            maxFileSize: '5MB',
            allowMultiple: false,
            allowReorder: false,
            allowProcess: true,
        });

        // Rest of your existing script
        $("#addThisFormContainer").hide();
        $("#newBtn").click(function() {
            clearform();
            $("#newBtn").hide(100);
            $("#addThisFormContainer").show(300);
        });
        $("#FormCloseBtn").click(function() {
            $("#addThisFormContainer").hide(200);
            $("#newBtn").show(100);
            clearform();
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var url = "{{ URL::to('/admin/services') }}";
        var upurl = "{{ URL::to('/admin/services-update') }}";

        $("#addBtn").click(function() {
            if ($(this).val() == 'Create') {
                var form_data = new FormData();
                form_data.append("title", $("#title").val());
                form_data.append("description", CKEDITOR.instances['description'].getData());
                
                var imageFiles = FilePond.find(document.querySelector('#imageUpload')).getFiles();
                if (imageFiles.length > 0) {
                    form_data.append('image', imageFiles[0].file);
                }

                $("#addBtn").prop('disabled', true).html('Uploading...');

                $.ajax({
                    url: url,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(d) {
                        if (d.status === 422) {
                            showError(d.message);
                            $("#addBtn").prop('disabled', false).html('Create');
                            return;
                        }
                        $("#addBtn").prop('disabled', false).html('Create');
                        showSuccess('Service created successfully.');
                        reloadPage(2000);
                    },
                    error: function(xhr, status, error) {
                        $("#addBtn").prop('disabled', false).html('Create');
                        console.error(xhr.responseText);
                        showError('An error occurred. Please try again.');
                    },
                });
            }

            if ($(this).val() == 'Update') {
                var form_data = new FormData();
                form_data.append("title", $("#title").val());
                form_data.append("description", CKEDITOR.instances['description'].getData());
                
                var imageFiles = FilePond.find(document.querySelector('#imageUpload')).getFiles();
                if (imageFiles.length > 0) {
                    form_data.append('image', imageFiles[0].file);
                }

                form_data.append("codeid", $("#codeid").val());

                $("#addBtn").prop('disabled', true).html('Uploading...');

                $.ajax({
                    url: upurl,
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(d) {
                        $("#addBtn").prop('disabled', false).html('Update');
                        showSuccess('Service updated successfully.');
                        reloadPage(2000);
                    },
                    error: function(xhr, status, error) {
                        $("#addBtn").prop('disabled', false).html('Update');
                        console.error(xhr.responseText);
                        showError('An error occurred. Please try again.');
                    }
                });
            }
        });

        $("#contentContainer").on('click', '#EditBtn', function() {
            var codeid = $(this).attr('rid');
            var info_url = url + '/' + codeid + '/edit';
            $.get(info_url, {}, function(d) {
                populateForm(d.data);
                pagetop();
            });
        });

        $("#contentContainer").on('click', '#deleteBtn', function() {
            if (!confirm('Sure?')) return;
            var codeid = $(this).attr('rid');
            var info_url = url + '/' + codeid;
            $.ajax({
                url: info_url,
                method: "GET",
                type: "DELETE",
                data: {},
                success: function(d) {
                    showSuccess('Service deleted successfully.');
                    reloadPage(2000);
                },
                error: function(xhr, status, error) {
                    showError('An error occurred. Please try again.');
                }
            });
        });

        function populateForm(data) {
            $("#title").val(data.title);
            CKEDITOR.instances['description'].setData(data.description);
            $("#codeid").val(data.id);
            $("#addBtn").val('Update');
            $("#addBtn").html('Update');
            $("#header-title").html('Update Service');
            $("#addThisFormContainer").show(300);
            $("#newBtn").hide(100);

            const imagePond = FilePond.find(document.querySelector('#imageUpload'));
            if (imagePond) imagePond.removeFiles();

            if (data.image) {
                const imageUrl = data.image;
                const imageName = imageUrl.split('/').pop();

                fetch(imageUrl)
                    .then(res => res.blob())
                    .then(blob => {
                        const imageFile = new File([blob], imageName, { type: blob.type });
                        imagePond.addFile(imageFile);
                    });
            }
        }

        function clearform() {
            $('#createThisForm')[0].reset();
            $("#addBtn").val('Create');
            $("#addBtn").html('Create');
            $("#header-title").html('Add New Service');
            FilePond.find(document.querySelector('#imageUpload')).removeFiles();
        }

        $(document).on('change', '.toggle-status', function() {
            var serviceId = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '/admin/services/' + serviceId + '/status',
                method: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 200) {
                        showSuccess(response.message);
                    } else {
                        showError('Failed to update status.');
                    }
                },
                error: function(xhr, status, error) {
                    showError('An error occurred. Please try again.');
                }
            });
        });

        function showError(message) {
            $('.ermsg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }

        function showSuccess(message) {
            $('.ermsg').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }

        function reloadPage(timeout) {
            setTimeout(function() {
                location.reload();
            }, timeout);
        }

        function pagetop() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });
</script>
@endsection