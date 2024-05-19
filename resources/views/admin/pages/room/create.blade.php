<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Room/create') }}
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
                                    <a class="btn btn-block btn-primary" href="/admin/room">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/room" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Hotel:</label>
                                            <select class="form-control select2" name="hotel_id" style="width: 100%;">
                                                <option selected="selected" disabled>Select Hotel</option>
                                                @foreach ($hotel as $item)
                                                    <option value="{{ $item->id }}">
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
                                        <option value="single">Single</option>
                                        <option value="double">Double</option>
                                        <option value="quad">Quad</option>
                                        <option value="quad-double">Quad-double</option>
                                        <option value="king">King</option>
                                        <option value="twin">Twin</option>
                                        <option value="twin-double">Twin-double</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="6"> </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Capacity:</label>
                                            <input type="text" class="form-control" name="capacity"
                                                {{ old('capacity') }} id="capacity" placeholder="Enter Room Capacity">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="text" class="form-control" name="price"
                                                {{ old('price') }} id="price" placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
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
