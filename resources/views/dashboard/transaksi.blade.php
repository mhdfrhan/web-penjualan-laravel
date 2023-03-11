@extends('dashboard.layouts.master')



@section('container')

    @php

        function tanggal_indo($tanggal)

        {

            $bulan = [                1 => 'Januari',                'Februari',                'Maret',                'April',                'Mei',                'Juni',                'Juli',                'Agustus',                'September',                'Oktober',                'November',                'Desember',            ];

        

            $pecahkan = explode('-', $tanggal);

        

            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];

        }

    @endphp



    <div class="overflow-x-auto relative">

        <table class="table">

            <thead>

                <th>No</th>

                <th>Gambar</th>

                <th>Nama barang</th>
                <th>Pembeli</th>
                <th>username</th>

                <th>Tanggal</th>

                <th>Jumlah</th>

                <th>Total</th>

            </thead>

            <tbody>

							@foreach ($transaksi as $i => $t)
							<tr>
									<th>{{ $transaksi->firstItem() + $i }}</th>
									<td>
											@if ($t->barang_image)
													<a class="cursor-pointer" data-fancybox data-src="{{ asset('img/' . $t->barang_image) }}">
															<img src="{{ asset('img/' . $t->barang_image) }}" class="inline w-24 rounded-lg h-auto"
																	alt="gambar {{ $t->merk_brg }}">
													</a>
											@else
													<a class="cursor-pointer" data-fancybox data-src="/img/no-photo.png">
															<img src="/img/no-photo.png" class="w-24 rounded-lg h-auto"
																	alt="gambar {{ $t->merk_brg }}">
													</a>
											@endif
									</td>
									<td>{{ $t->merk_brg }}</td>
									<td>{{ $t->name }}</td>
									<td>{{ $t->username }}</td>
									<td>{{ tanggal_indo(date('Y-m-d', strtotime($t->tanggal))) }} {{ date('H:i', strtotime($t->tanggal)) }}</td>
									<td>{{ $t->jumlah }}</td>
									<td>Rp. {{ number_format($t->total) }}</td>
							</tr>
					@endforeach
					

            </tbody>

        </table>

    </div>



	@if (!count($transaksi))

        <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span

                class="font-medium">Belum ada transaksi!</span></div>

    @endif

@endsection

