<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
        @extends('layouts.app')
        @section('content')
        <div class="container">
            <h1 class="my-4" style="font-weight: bold;">Edit Koleksi</h1>
            <form method="POST" action="{{ url('transaksiUpdate') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $transaction->id }}">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-start">ID Transaksi*</th>
                                <td>
                                    <input type="text" name="id" value="{{ $transaction->id }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Peminjam*</th>
                                <td>
                                    <input type="text" name="name" value="{{ $transaction->name }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Kendaraan*</th>
                                <td>
                                    <input type="text" name="kendaraan" value="{{ $transaction->kendaraan }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Start*</th>
                                <td>
                                    <input type="text" name="start" value="{{ $transaction->start }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">End*</th>
                                <td>
                                    <input type="text" name="end" value="{{ $transaction->end }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <tr>
                                    <th class="text-start">Price*</th>
                                    <td>
                                        <input type="text" name="price" value="{{ $transaction->price }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                <th class="text-start">Status*</th>
                                <td>
                                    <select name="status" id="status">
                                        <option value="1" {{ $transaction->status === 1 ? 'selected' : '' }}>Pinjam</option>
                                        <option value="2" {{ $transaction->status === 2 ? 'selected' : '' }}>Kembali</option>
                                        <option value="3" {{ $transaction->status === 3 ? 'selected' : '' }}>Hilang</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <a href="{{ route('transaksi') }}" class="btn btn-secondary">Back</a>
                        <button class="btn btn-success">Update</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="reset">
                            Reset
                        <button>
                    </div>
                </div>
            </form>
        </div>
        @endsection
