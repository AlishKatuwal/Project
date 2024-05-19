<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Destination/Edit') }}
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
                                    <h3 class="card-title">Edit</h3>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-block btn-primary" href="/admin/destination">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/destination/{{ $destination->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ $destination->name }}"
                                                {{ old('name') }} id="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" class="form-control" name="address" value="{{ $destination->address }}"
                                                {{ old('address') }} id="address" placeholder="Enter Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select City:</label>
                                            <select class="form-control select2" name="city_id" style="width: 100%;">
                                                <option selected="selected" disabled>Select City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" {{ $destination->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>location(googlemap link):</label>
                                            <input type="text" class="form-control" name="location"
                                                {{ old('location') }} value="{{ $destination->location }}" id="location" placeholder="Enter location">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Description:</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="6">
                                        {{ $destination->description }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Video</label>
                                    <input type="file" class="form-control" name="video">
                                </div>
                                <div class="form-group">
                                    <label for="">Images</label>
                                    <input type="file" class="form-control" name="images[]" id="path"
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
    <!-- /.content -->
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
