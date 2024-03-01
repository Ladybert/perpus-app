<!DOCTYPE html>
<html lang="en">
@include('devlay.partials.head')
<body class="bg-slate-800">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-3">
                <form method="post" action="{{ route('publisher.update', $publisher->id) }}" class="flex flex-column justify-center p-4 mt-[25vh] card-body rounded-lg bg-slate-700 shadow-lg">
                    @csrf
                    @method('PUT')
                    <h1 class="flex text-slate-100 justify-center font-medium text-2xl">Edit Data Penerbit</h1>
                    <label class="form-label required text-slate-200"  for="nama">Required</label>
                    <input type="text" id="nama" class="form-control mb-4" @error('name')
                        is-invalid
                    @enderror name="name" placeholder="Publisher's Name" value="{{ $publisher->name }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label class="form-label required text-slate-200" for="upload">Required</label>
                    <input type="text" class="form-control" @error('address')
                        is-invalid
                    @enderror placeholder="Alamat penerbit" name="address" id="address" value="{{ $publisher->address }}">
                    @error('address')
                        <span class="invalid-feeback">{{ $message }}</span>
                    @enderror
                    <input class="bg-blue-700 rounded-md hover:bg-blue-900 focus:bg-blue-900 text-xl text-slate-100 font-normal mt-4 py-1 w-1/5" type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
</body>
@include('devlay.partials.scripts')
</html>
