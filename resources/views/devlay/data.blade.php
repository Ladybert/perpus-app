<!DOCTYPE html>
<html lang="en">
@include('devlay.partials.head')
<body>
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('devlay.partials.sidebar')
        <div class="page-wrapper bg-slate-800">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="flex flex-row g-2 align-items-center space-x-4">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle text-slate-300">
                                Selamat datang User perpustakaan :)
                            </div>
                            <h1 class="page-title text-slate-50">
                                Perpustakaan E-Book Skomda
                            </h1>
                        </div>
                        <div class="flex justify-end w-1/4 bg-slate-700 py-1 outline outline-offset-1 outline-slate-100 rounded-md">
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="query" placeholder="Cari Judul atau Penulis" class="bg-slate-700 text-white outline-0 focus:outline-none outline py-1 pr-4 w-3/4">
                                <input class="text-white" type="submit" value="Cari">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body mt-6 mx-3 text-white">
                @foreach ($input as $book)
                <div class="card w-48 bg-base-100 shadow-xl">
                    <figure><img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $book->title }}</h2>
                        <p>Di tulis oleh {{ $book->Authors->name }}</p>
                        <div class="card-actions justify-center">
                            <button class="btn btn-primary">Check Detail Here</button>
                        </div>
                    </div>
                </div>
                @endforeach
                @empty($books)
                <div class="flex justify-center font-medium text-white text-2xl">
                    <p>Data tidak ditemukan</p>
                </div>
                @endempty
                {{ $books->links() }}
            </div>
        </div>
    </div>
</body>
@include('devlay.partials.scripts')
</html>
