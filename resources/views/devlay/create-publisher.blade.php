<!DOCTYPE html>
<html lang="en">
@include('devlay.partials.head')
<body class="bg-slate-800">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-3">
                <form method="POST" action="{{ route('publisher.store') }}" class="flex flex-column justify-center p-4 mt-[25vh] card-body rounded-lg bg-slate-700 shadow-lg">
                    @csrf
                    <h1 class="flex text-slate-100 justify-center font-medium text-2xl">Tambah Data Penerbit</h1>
                    <label class="form-label required text-slate-200" for="nama">Required</label>
                    <input type="text" id="nama" class="form-control mb-4"
                    @error('name') 
                        is-invalid
                    @enderror name="name" placeholder="Publisher's Name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label class="form-label required text-slate-200" for="address">Required</label>
                    <input type="text" class="form-control" placeholder="Alamat penerbit" name="address" id="address">
                    <input class="bg-blue-700 rounded-md hover:bg-blue-900 focus:bg-blue-900 text-xl text-slate-100 font-normal mt-4 py-1 w-1/5" type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
</body>
@include('devlay.partials.scripts')
</html>
