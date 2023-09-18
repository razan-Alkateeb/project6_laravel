@extends('dashlayouts.master')
@section('title')
    table
@endsection


@section('title-bage1')
    Dashboard
@endsection


@section('title-bage2')
    Donation
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->


    <!-- DataTables -->


    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
@endsection

@section('content')
    <div class="card" style="margin: 20px">
        <div class="card-header">
            Add new Financial Donation
        </div>
        <div class="card-body">
            <form action="{{ url('/donatione') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Name</label><br>
                <input type="text" name="DonationName" id="DonationName" class="form-control">
                <span class="text-danger">
                    @error('DonationName')
                        {{ $message }}
                    @enderror
                </span><br><br>
                <label>Description</label><br>
                <input type="text" name="description" id="description" class="form-control">
                <span class="text-danger">
                    @error('description')
                        {{ $message }}
                    @enderror
                </span><br><br>
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" width="100" height="100"><br>
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span><br><br>
                <label>amount_needed</label><br>
                <input type="text" name="amount_needed" id="amount_needed" class="form-control">
                <span class="text-danger">
                    @error('amount_needed')
                        {{ $message }}
                    @enderror
                </span><br><br>
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->


    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->


    <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>



    <script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>



    <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>


    <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>


    <!-- AdminLTE App -->

    <script src="{{ URL::asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->

    <script src="{{ URL::asset('assets/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
