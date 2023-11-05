@extends('layouts.app')
@section('content')


<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable'). DataTable({
            ajax:'{{ url("getAllTransactions") }}',
            serverSide: false,
            processing: true,
            deferRender: true,
            type: 'GET',
            destroy:true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'peminjam', name: 'peminjam'},
                {data: 'kendaraan', name: 'kendaraan'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'price', name: 'price'},
                {data: 'status', name: 'status'},
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false}
            ]
        });
    });
</script>
<div class="container mt-4">
        <div class="card">
            <div class="card-header">Transaction List</div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Selesai</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

