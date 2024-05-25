<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hotel Booking') }}
        </h2>
    </x-slot>
    {{-- display status message --}}
    @if (session('success'))
        @section('scripts')
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('success') }}'
                    });
                });
            </script>
        @endsection
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="card-title">Destination</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer phone</th>
                                        <th>Room Type</th>
                                        <th>Package Name</th>
                                        <th>payment method </th>
                                        <th>Arrival</th>
                                        <th>Leaving</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($booking))
                                        @foreach ($booking as $booking)
                                            <tr>
                                                <td>{{ $booking->hotel->name }}</td>
                                                <td>{{ $booking->user->name }}</td>
                                                <td>{{ $booking->user->email }}</td>
                                                <td>{{ $booking->user->phone }}</td>
                                                <td>{{ $booking->room->type ? $booking->room->type : 'Package is booked' }}</td>
                                                <td>{{ $booking->package->name ? $booking->package->name : 'No package' }}</td>
                                                <td>{{ $booking->payment_method }}</td>
                                                <td>{{ $booking->check_in_date }}</td>
                                                <td>{{ $booking->check_out_date }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer phone</th>
                                        <th>Room Type</th>
                                        <th>Package Name</th>
                                        <th>payment method </th>
                                        <th>Arrival</th>
                                        <th>Leaving</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-app-layout>
