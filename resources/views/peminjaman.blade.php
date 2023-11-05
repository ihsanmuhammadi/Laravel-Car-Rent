<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
        @extends('layouts.guest')
        @section('content')
            <form method="POST" action="{{ route('transaksiStore') }}">
                @csrf

                <!-- Nama Peminjam -->
                <div>
                    <x-input-label for="idPeminjam" :value="__('Peminjam')" />
                    <select id="idPeminjam" name="idPeminjam" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                        <option value="-1">--Pilih dahulu--</option>
                        @foreach ($users as $user)
                        @if ($user->id == old('userPeminjam'))
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
                </div>

                <!-- Kendaraan -->
                <div class="mt-4">
                    <x-input-label for="jenisKendaraan" :value="__('Kendaraan')" />
                    <select id="jenisKendaraan" name="jenisKendaraan" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                        <option value="-1">--Pilih dahulu--</option>
                        @foreach ($vehicles as $vehicle)
                        @if ($vehicle->id == old('jenisKendaraan'))
                        <option value="{{ $vehicle->id }}" selected>{{ $vehicle->name }}</option>
                        @else
                        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('jenisKendaraan')" class="mt-2" />
                </div>

                <!-- Start Date -->
                <div class="mt-4">
                    <x-input-label for="startDate" :value="__('Start Date')" />
                    <input type="date" id="startDate" name="startDate" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                    <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
                </div>

                <!-- End Date -->
                <div class="mt-4">
                    <x-input-label for="endDate" :value="__('End Date')" />
                    <input type="date" id="endDate" name="endDate" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                    <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4" type="reset">
                        Reset
                    </x-primary-button>
                    <x-primary-button class="ml-4">
                        {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>

            {{-- button back --}}
            <a href="{{ route('transaksi') }}" class="text-blue-500 hover:text-blue-700 underline" style="cursor: pointer; text-decoration: none;">
                Back &larr;
            </a>
        @endsection
