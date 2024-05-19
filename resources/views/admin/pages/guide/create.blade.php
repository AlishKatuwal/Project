<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Guide/List') }}
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
                                    <a class="btn btn-block btn-primary" href="/admin/guide">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/guide" method="POST" enctype="multipart/form-data">
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
                                            <label>Select Destination:</label>
                                            <select class="form-control select2" name="destination_id" style="width: 100%;">
                                                <option selected="selected" disabled>Select Destination</option>
                                                @foreach ($destination as $item)
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
                                            <label>Email:</label>
                                            <input type="text" class="form-control" name="email"
                                                {{ old('email') }} id="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact:</label>
                                            <input type="number" class="form-control" name="contact"
                                                {{ old('contact') }} id="contact" placeholder="Enter Contact">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="6"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="price"
                                                {{ old('price') }} id="price" placeholder="Enter Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- checkbox --}}
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="form-check">
                                                <input type="checkbox" name="is_available" checked class="form-check-input"
                                                    id="status">
                                                <label class="form-check-label" for="status">Status</label>
                                            </div>
                                        </div>
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
