<!DOCTYPE html>
<html lang="en">
@include('devlay.partials.head')
<body class="bg-slate-800">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-3">
                <form method="post" action="{{ route('dashboard.store') }}" enctype="multipart/form-data" class="flex flex-column justify-center p-4 mt-[15vh] card-body rounded-lg bg-slate-700 shadow-lg">
                    @csrf
                    <h1 class="flex text-slate-100 justify-center font-medium text-2xl mb-2">Tambah Data Buku</h1>
                    <label class="form-label required text-slate-200" for="select">Pilih Penulis</label>
                    <select class="form-control py-2 mb-3 rounded-md" name="author_id" id="select">
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label required text-slate-200" for="title">Masukkan judul Buku</label>
                    <input type="text" class="form-control mb-3" placeholder="Judul buku" name="title" id="title">
                    <label class="form-label required text-slate-200" for="upload">Masukkan file cover buku anda</label>
                    <input type="file" class="form-control mb-3" name="cover" id="upload" accept="image/png, image/jpg, image/jpeg">
                    <label class="form-label required text-slate-200" for="date">Masukkan tahun rilis</label>
                    <input type="number" min="1500" step="1" class="form-control mb-3" name="year" id="date">
                    <input class=" bg-blue-700 rounded-md hover:bg-blue-900 focus:bg-blue-900 text-xl text-slate-100 font-normal mt-2 py-1 w-1/5" type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
</body>
@include('devlay.partials.scripts')
</html>
