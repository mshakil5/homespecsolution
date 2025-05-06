@extends('admin.layouts.admin')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-video-camera"></i> Video Blogs</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Video Blogs</a></li>
            </ul>
        </div>

        <div id="addThisFormContainer">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 id="header-title">Add New Video Blog</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="ermsg"></div>
                                <div class="container">
                                    <form id="createThisForm">
                                        @csrf
                                        <input type="hidden" class="form-control" id="codeid" name="codeid">
                                        
                                        <div class="form-group">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <select class="form-control" id="blog_category_id" name="blog_category_id">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Upload Thumbnail (max 5MB)</label>
                                            <input type="file" name="thumbnail" id="thumbnailUpload" accept="image/*" class="form-control-file">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Upload Video (max 40MB)</label>
                                            <input type="file" name="video" id="videoUpload" accept="video/*" class="form-control-file">
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
                            <h3>Video Blogs</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="container">
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Video</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $blog)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->category->name }}</td>
                                                <td>
                                                    <img 
                                                        src="{{ $blog->thumbnail ? asset($blog->thumbnail) : 'https://ionicframework.com/docs/img/demos/thumbnail.svg' }}" 
                                                        alt="Thumbnail"
                                                        style="max-width: 100px; width: 100%; height: auto; cursor: pointer;"
                                                        onclick="this.outerHTML='<video src=\'{{ asset($blog->video) }}\' controls autoplay style=\'max-width: 100px; width: 100%; height: auto;\'></video>'"
                                                    >
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input toggle-status" 
                                                               id="customSwitchStatus{{ $blog->id }}" 
                                                               data-id="{{ $blog->id }}" 
                                                               {{ $blog->status == 1 ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customSwitchStatus{{ $blog->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a id="EditBtn" rid="{{ $blog->id }}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                    <a id="deleteBtn" rid="{{ $blog->id }}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
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
<link href="https://unpkg.com/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet" />
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize FilePond
        FilePond.registerPlugin(
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
            FilePondPluginMediaPreview,
            FilePondPluginImagePreview
        );

        FilePond.create(document.querySelector('#videoUpload'), {
            acceptedFileTypes: ['video/*'],
            maxFileSize: '40MB',
            allowMultiple: false,
            allowReorder: false,
            allowProcess: true,
        });

        FilePond.create(document.querySelector('#thumbnailUpload'), {
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
        
        var url = "{{ URL::to('/admin/video-blogs') }}";
        var upurl = "{{ URL::to('/admin/video-blogs-update') }}";

        $("#addBtn").click(function() {
            if ($(this).val() == 'Create') {
                var requiredFields = ['#blog_category_id', '#title'];
                for (var i = 0; i < requiredFields.length; i++) {
                    if ($(requiredFields[i]).val() === '') {
                        showError('Please fill all required fields.');
                        return;
                    }
                }

                var form_data = new FormData();
                form_data.append("blog_category_id", $("#blog_category_id").val());
                form_data.append("title", $("#title").val());
                var pondFiles = FilePond.find(document.querySelector('#videoUpload')).getFiles();
                if (pondFiles.length === 0) {
                    showError('Please upload a video.');
                    return;
                }
                form_data.append('video', pondFiles[0].file);

                var thumbFiles = FilePond.find(document.querySelector('#thumbnailUpload')).getFiles();
                if (thumbFiles.length > 0) {
                    form_data.append('thumbnail', thumbFiles[0].file);
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
                            return;
                        }
                        $("#addBtn").prop('disabled', false).html('Create');
                        showSuccess('Blog created successfully.');
                        reloadPage(2000);
                    },
                    error: function(xhr, status, error) {
                        $("#addBtn").prop('disabled', false).html('Create');
                        console.error(xhr.responseText);
                        showError('An error occurred. Please try again.');
                    }
                });
            }

            if ($(this).val() == 'Update') {
                var requiredFields = ['#blog_category_id', '#title'];
                for (var i = 0; i < requiredFields.length; i++) {
                    if ($(requiredFields[i]).val() === '') {
                        showError('Please fill all required fields.');
                        return;
                    }
                }

                var form_data = new FormData();
                form_data.append("blog_category_id", $("#blog_category_id").val());
                form_data.append("title", $("#title").val());
                var pondFiles = FilePond.find(document.querySelector('#videoUpload')).getFiles();
                if (pondFiles.length === 0) {
                    showError('Please upload a video.');
                    return;
                }
                form_data.append('video', pondFiles[0].file);

                var thumbFiles = FilePond.find(document.querySelector('#thumbnailUpload')).getFiles();
                
                if (thumbFiles.length > 0) {
                    form_data.append('thumbnail', thumbFiles[0].file);
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
                        showSuccess('Blog updated successfully.');
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
                populateForm(d.data, d.categories);
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
                    showSuccess('Blog deleted successfully.');
                    reloadPage(2000);
                },
                error: function(xhr, status, error) {
                    showError('An error occurred. Please try again.');
                }
            });
        });

        function populateForm(data, categories) {
            $("#blog_category_id").val(data.blog_category_id);
            $("#title").val(data.title);
            $("#codeid").val(data.id);
            $("#addBtn").val('Update');
            $("#addBtn").html('Update');
            $("#header-title").html('Update blog');
            $("#addThisFormContainer").show(300);
            $("#newBtn").hide(100);

            const videoPond = FilePond.find(document.querySelector('#videoUpload'));
            const thumbPond = FilePond.find(document.querySelector('#thumbnailUpload'));

            if (videoPond) videoPond.removeFiles();
            if (thumbPond) thumbPond.removeFiles();

            if (data.video) {
                const videoUrl = data.video;
                const videoName = videoUrl.split('/').pop();

                fetch(videoUrl)
                    .then(res => res.blob())
                    .then(blob => {
                        const videoFile = new File([blob], videoName, { type: blob.type });
                        videoPond.addFile(videoFile);
                    });
            }

            if (data.thumbnail) {
                const thumbUrl = data.thumbnail;
                const thumbName = thumbUrl.split('/').pop();

                fetch(thumbUrl)
                    .then(res => res.blob())
                    .then(blob => {
                        const thumbFile = new File([blob], thumbName, { type: blob.type });
                        thumbPond.addFile(thumbFile);
                    });
            }
        }

        function clearform() {
            $('#createThisForm')[0].reset();
            $("#addBtn").val('Create');
            $("#addBtn").html('Create');
            $("#header-title").html('Add new blog');
            FilePond.find(document.querySelector('#videoUpload')).removeFiles();
            FilePond.find(document.querySelector('#thumbnailUpload')).removeFiles();
        }

        $(document).on('change', '.toggle-status', function() {
            var blogId = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '/admin/video-blogs/' + blogId + '/status',
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