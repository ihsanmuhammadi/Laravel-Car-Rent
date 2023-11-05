{{-- Nama: Ihsan Muhammad Iqbal --}}
{{-- NIM: 6706220123 --}}

@extends('layouts.app')
@section('content')


<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable'). DataTable({
            ajax:'{{ url("getAllVehicles") }}',
            serverSide: false,
            processing: true,
            deferRender: true,
            type: 'GET',
            destroy:true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'license', name: 'license'},
                {data: 'dailyPrice', name: 'dailyPrice'},
            ]
        });
    });
</script>
<div class="container mt-4">
        <div class="card">
            <div class="card-header">Vehicle List</div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kendaraan</th>
                            <th>Tipe</th>
                            <th>License</th>
                            <th>Daily Price</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

