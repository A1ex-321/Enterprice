@extends('admin.layouts.app')


@section('content')

<!-- SweetAlert2 CSS -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<main id="main" class="main">
    <section class="section dashboard" style="margin-left: -260px;
">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-0">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Blog</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">
                                    @if(Auth::check() && Auth::user()->role === 'SuperAdmin')
                                    <button id="errorsco" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feedback-modal">Edit SEO</button>
                                    @endif

                                </li>




                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            @include('admin.layouts.message')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header" style="background-color:
#6e9ee6
;">
                                    <h3 class="card-title">Add Blog <small></small></h3>
                                </div>
                                <div class="container">
                                    <form action="{{ route('blog-update', ['id' => $getRecord->id])}}" method="post" enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Title:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="title" value="{{ $getRecord->title }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description<span style="color:red"></span></label>
                                                <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="Description" style="width: 100%; height: 100px;" required>{{ $getRecord->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Image<span style="color:red">*</span></label>
                                                <input type="file" name="singleimage" class="form-control" id="exampleInputEmail1" placeholder="Image" value="{{ $getRecord->singleimage }}">
                                                <img src="{{ asset('public/images/' . $getRecord->singleimage) }}" alt="Thumb Image" style="max-width: 100px; max-height: 100px;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputImages">Multi Images<span style="color:red">*</span></label>
                                                <input type="file" name="images[]" class="form-control" id="exampleInputImages" placeholder="Images" accept="image/*" multiple onchange="handleFiles(this.files)">
                                            </div>
                                            <div id="image-display">
                                                @if($getRecord && $getRecord->image_data)
                                                @php
                                                $imagePaths = explode(',', $getRecord->image_data);
                                                // Remove any empty elements from the array
                                                $imagePaths = array_filter($imagePaths);
                                                @endphp
                                                @foreach($imagePaths as $imagePath)
                                                <div class="image-container" style="display: inline-block; margin-right: 10px;">
                                                    <img src="{{ asset('public/images/' . $imagePath) }}" alt="Image" style="width: 100px; height: 100px; margin-bottom: 5px;">
                                                    <button type="button" class="btn btn-danger btn-sm remove-btn">✕</button>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>



                                            <input type="hidden" name="image-data" id="image-data" value="{{ $getRecord->image_data }}">
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </form>




                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Main content -->

            <!-- /.content -->
        </div>




        <!-- Your scripts -->
        <!-- ... (previous code) ... -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- ... (other scripts) ... -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>


    </section>
    <div id="feedback-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit SEO</h3>
                    <a href="#" class="btn" data-dismiss="modal">×</a>

                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <form action="{{ route('sco-update', ['id' => $getRecord->id])}}" method="post" enctype="multipart/form-data" id="sco">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Title<span style="color:red"></span></label>
                                    <input type="text" name="metatitle" class="form-control" id="exampleInputEmail1" placeholder="metatitle" value="{{$getRecord->metatitle}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OG Title<span style="color:red"></span></label>
                                    <input type="text" name="ogtitle" class="form-control" id="exampleInputEmail1" placeholder="ogtitle" value="{{$getRecord->ogtitle}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Description<span style="color:red"></span></label>
                                    <textarea name="metadescription" class="form-control" id="exampleInputEmail1" placeholder="Description" style="height: 100px;">{{$getRecord->metadescription}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OG Description<span style="color:red"></span></label>
                                    <textarea name="ogdescription" class="form-control" id="exampleInputEmail1" placeholder="Description" style="height: 100px;">{{$getRecord->ogdescription}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OG Image<span style="color:red"></span></label>
                                    <input type="file" name="ogimage" class="form-control" id="exampleInputEmail1" placeholder="ogimage" value="{{$getRecord->ogimage}}">
                                </div>
                                @if ($getRecord->ogimage)
                                <div class="form-group">
                                    <img src="{{ asset('public/images/' . $getRecord->ogimage) }}" alt="Uploaded Image" style="max-width: 100px; max-height: 70px;">
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OG URL<span style="color:red"></span></label>
                                    <input type="text" name="ogurl" class="form-control" id="exampleInputEmail1" placeholder="ogurl" value="{{$getRecord->ogurl}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug<span style="color:red"></span></label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="slug" value="{{$getRecord->slug}}">
                            <p id="slug-error" style="color: red;"></p>
                            @error('slug')
                            <p style="color: red;">{{ $message }}</p>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    console.log('Script executed');

                                    $('#feedback-modal').modal('show');

                                    // Scroll to the element with the ID 'slug' within the modal using animate
                                    var modalBody = $('#feedback-modal .modal-body');
                                    var slugElement = $('#slug');

                                    // Calculate the difference between the top of the slug element and the top of the modal body
                                    var scrollOffset = slugElement.offset().top - modalBody.offset().top;

                                    // Use animate for smooth scrolling
                                    modalBody.animate({
                                        scrollTop: scrollOffset
                                    }, 1000); // You can adjust the duration as needed
                                    $('.toast').toast({
                                        delay: 5000
                                    }); // Set the duration of the toast
                                    $('.toast-body').text('slug already exist'); // Set the error message
                                    $('.toast').toast('show');
                                });
                            </script>

                            <!-- Placeholder for the toast -->
                            <!-- Placeholder for the toast -->
                            <div aria-live="polite" aria-atomic="true" style="position: fixed; bottom: 0; right: 0; min-width: 320px; height: -50px;">
                                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="background-color: red;">
                                    <div class="toast-header" style="background-color: red;">
                                        <strong class="mr-auto text-white">Error</strong>
                                        <small class="text-muted">just now</small>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>
                                    <div class="toast-body text-white">
                                        slug already exists <!-- Update the error message here -->
                                    </div>
                                </div>
                            </div>




                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">OG Type<span style="color:red"></span></label>
                            <input type="text" name="ogtype" class="form-control" id="exampleInputEmail1" placeholder="ogtype" value="{{$getRecord->ogtype}}">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="submit">Update SEO</button>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                    </form>

                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
                <!-- Your existing HTML code -->


                <!-- Any other HTML code -->

            </div>
        </div>
    </div>
</main>
@endsection




<!-- Include jQuery -->

<!-- Initialize Select2 -->
<script>
    function handleFiles(files) {
        const imageDisplay = document.getElementById('image-display');
        const formData = new FormData();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Append CSRF token to FormData
        formData.append('_token', csrfToken);

        // Loop through each selected file
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const uniqueId = Date.now() + index; // Generate a unique ID for each image

                // Store the image data in local storage
                localStorage.setItem('image' + uniqueId, e.target.result);

                // Display the image in the div
                // const imgContainer = document.createElement('div');
                // imgContainer.setAttribute('id', 'container' + uniqueId);
                // imgContainer.style.display = 'inline-block';

                // const img = document.createElement('img');
                // img.src = e.target.result;
                // img.style.width = '100px';
                // img.style.height = '100px';
                // img.style.margin = '5px';

                // imgContainer.appendChild(img);
                // imageDisplay.appendChild(imgContainer);
            };
            reader.readAsDataURL(file);

            // Upload the image to Laravel assets here
            // Note: No need to redefine formData here
            formData.append('images[]', file);
        });

        // Send the FormData object with all selected files
        fetch('/upload-images', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle response from server
                console.log('Images uploaded:', data);
                // Get the reference to the image-display div
                const imageDisplay = document.getElementById('image-display');
                // Get the reference to the hidden input field
                const hiddenInput = document.getElementById('image-data');
                // Loop through the array of image paths and create img elements
                data.forEach(imagePath => {
                    // Create a container div for each image
                    const container = document.createElement('div');
                    container.style.display = 'inline-block';

                    // Create the image element
                    const img = document.createElement('img');
                    img.src = imagePath;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.margin = '5px';

                    // Create the remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.innerText = '×';
                    removeBtn.style.color = 'red';
                    removeBtn.style.border = 'none';
                    removeBtn.style.background = 'transparent';
                    removeBtn.style.cursor = 'pointer';
                    removeBtn.style.fontSize = '20px';
                    removeBtn.onclick = function() {
                        // Remove the image container from the DOM
                        container.remove();
                        // Remove the image path from the hidden input value
                        const imagePathToRemove = img.src.split('/').pop();
                        hiddenInput.value = hiddenInput.value.split(',').filter(path => path !== imagePathToRemove).join(',');
                    };

                    // Append the image and remove button to the container div
                    container.appendChild(img);
                    container.appendChild(removeBtn);

                    // Append the container div to the imageDisplay div
                    imageDisplay.appendChild(container);

                    // Store the image path in the hidden input value
                    hiddenInput.value += imagePath.split('/').pop() + ',';
                });
            })
            .catch(error => console.error('Error:', error));
    }

    document.addEventListener('DOMContentLoaded', function() {
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const imageContainer = this.closest('.image-container');
                const imagePath = imageContainer.querySelector('img').src.split('/').pop();
                // Remove the image container from the DOM
                imageContainer.remove();
                // Remove the image path from the hidden input value
                const hiddenInput = document.getElementById('image-data');
                hiddenInput.value = hiddenInput.value.split(',').filter(path => path !== imagePath).join(',');
            });
        });
    });
</script>






@section('style')



@endsection