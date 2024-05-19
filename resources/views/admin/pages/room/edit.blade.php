<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Room/edit') }}
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
                                    <a class="btn btn-block btn-primary" href="/admin/room">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/room/{{ $room->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Hotel:</label>
                                            <select class="form-control select2" name="hotel_id" style="width: 100%;">
                                                <option selected="selected" disabled>Select Hotel</option>
                                                @foreach ($hotel as $item)
                                                    <option value="{{ $item->id }}" {{ $room->hotel_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Type:</label>
                                    <select class="form-control select2" name="type" style="width: 100%;">
                                        <option selected="selected" disabled>Select Type</option>
                                        <option value="single" {{ $room->type == 'single' ? 'selected' : '' }}>Single</option>
                                        <option value="double" {{ $room->type == 'double' ? 'selected' : '' }}>Double</option>
                                        <option value="quad" {{ $room->type == 'quad' ? 'selected' : '' }}>Quad</option>
                                        <option value="quad-double" {{ $room->type == 'quad-double' ? 'selected' : '' }}>Quad-double</option>
                                        <option value="king" {{ $room->type == 'king' ? 'selected' : '' }}>King</option>
                                        <option value="twin" {{ $room->type == 'twin' ? 'selected' : '' }}>Twin</option>
                                        <option value="twin-double" {{ $room->type == 'twin-double' ? 'selected' : '' }}>Twin-double</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="6">{{ $room->description }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Capacity:</label>
                                            <input type="text" class="form-control" name="capacity"
                                                {{ old('capacity') }}  value="{{ $room->capacity }}" id="capacity" placeholder="Enter Room Capacity">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="text" class="form-control" name="price"
                                                {{ old('price') }} value="{{ $room->price }}" id="price" placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset($room->image) }}" width="100px" alt="">
                                    </div>
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
</x-app-layout>
