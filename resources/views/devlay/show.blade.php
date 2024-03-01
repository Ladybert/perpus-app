<!DOCTYPE html>
<html lang="en">
@include('devlay.partials.head')
<body class="bg-slate-800">
    <div class="container-xl mt-40">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 flex flex-row shadow-sm rounded-md bg-slate-700">
                    <img src="{{ asset('storage/'. $books->cover) }}" class="w-1/2 aspect-square object-cover rounded">
                    <div class="bg-slate-700 border-0 w-3/4">
                        <div class="m-4">
                            <label class="text-slate-200 text-md form-label" for="judul">Judul Buku</label>
                            <input class="text-white text-md form-control bg-slate-600 border-0" type="text" id="judul" readonly value="{{ $books->title }}">
                            <label class="text-slate-200 text-md form-label mt-4" for="penulis">Penulis</label>
                            <input class="text-white text-md form-control bg-slate-600 border-0" type="text" id="penulis" readonly value="{{ $books->Authors->name }}">
                            <label class="text-slate-200 text-md form-label mt-4" for="tahun">Tahun terbit</label>
                            <input class="text-white text-md form-control bg-slate-600 border-0" type="text" id="tahun" readonly value="{{ $books->year }}">
                            <a href="{{ route('dashboard.index') }}">
                                <div class="btn btn-info text-white w-full mt-6">kembali</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('devlay.partials.scripts')
</html>
