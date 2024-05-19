<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hotel/create') }}
        </h2>
    </x-slot>
    <section class="content">
        <div class="container-fluid">
            {{-- show error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="card-title">Create</h3>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-block btn-primary" href="/admin/hotel">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/hotel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select User:</label>
                                            <select class="form-control select2" name="user_id" style="width: 100%;">
                                                <option selected="selected" disabled>Select User</option>
                                                @foreach ($user as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->email }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select City:</label>
                                            <select class="form-control select2" name="city_id"
                                                style="width: 100%;">
                                                <option selected="selected" disabled>Select City</option>
                                                @foreach ($city as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name"
                                                {{ old('name') }} id="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type:</label>
                                            <select class="form-control select2" name="type">
                                                <option selected="selected" disabled>Select Type</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="resort">Resort</option>
                                                <option value="villa">Villa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" class="form-control" name="address"
                                                {{ old('address') }} id="address" placeholder="Enter Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="6"> </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact:</label>
                                            <input type="text" class="form-control" name="contact_phone"
                                                {{ old('contact_phone') }} id="contact_phone" placeholder="Enter Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>contact Email:</label>
                                            <input type="email" class="form-control" name="contact_email"
                                                {{ old('contact_email"') }} id="contact_email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="">Gallery</label>
                                    <input type="file" class="form-control" name="gallery[]" id="path"
                                        accept="image/*" onchange="displaySelectedImages()" multiple>
                                </div>
                                <div class="row" id="imageRow">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @section('scripts')
        <script>
            function displaySelectedImages() {
                const input = document.getElementById('path');
                const imageRow = document.getElementById('imageRow');

                // Clear previous images
                imageRow.innerHTML = '';

                // Make sure files are selected
                if (input.files && input.files.length > 0) {
                    for (let i = 0; i < input.files.length; i++) {
                        const reader = new FileReader();
                        const img = document.createElement('img');
                        const colDiv = document.createElement('div');

                        // Bootstrap class for column
                        colDiv.className = 'col-md-2';

                        reader.onload = function(e) {
                            // Set the source of the image element to the selected image
                            img.src = e.target.result;
                        };

                        // Read the selected file as a data URL
                        reader.readAsDataURL(input.files[i]);

                        // Set image properties (you can customize this based on your needs)
                        img.alt = "Selected Image";
                        img.style.maxHeight = '120px';
                        img.style.maxWidth = '100%';

                        // Append the image to the column div
                        colDiv.appendChild(img);

                        // Append the column div to the row
                        imageRow.appendChild(colDiv);
                    }
                }
            }
        </script>
    @endsection
</x-app-layout>
