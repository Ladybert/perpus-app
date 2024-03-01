<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle text-slate-300">
                    Selamat datang Admin HeHe
                </div>
                <h1 class="page-title text-slate-100">
                    Manajemen Data E-Book Skomda
                </h1>
            </div>
            <!-- search bar -->
        </div>
    </div>
</div>
<div class="mx-3 my-2">
    <div class="col-md-12 my-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Book Data's</h3>
                <div class="card-actions flex justify-end gap-x-4">
                    <div class="flex flex-row justify-start w-3/4 py-1 pl-4 outline outline-1 outline-offset-0 outline-green-600 rounded-md">
                        <form action="{{ route('dashboard.index') }}" method="GET">
                            <input type="text" name="query" placeholder="Cari Judul atau Penulis" class="outline-0 focus:outline-none outline py-1 pr-4 w-3/4">
                            <input type="submit" value="Cari">
                        </form>
                    </div>
                    <a href="{{ route('dashboard.create') }}" class="btn btn-success card-link-pop duration-300">
                        Add New
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card">
                    <div class="table-responsive max-h-64 overflow-scroll">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th class="w-1">Id</th>
                                    <th class="w-1/5">Author</th>
                                    <th class="w-1/5">Title</th>
                                    <th class="w-2">Cover</th>
                                    <th>Year</th>
                                    <th class="flex justify-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($input as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td class="text-secondary">
                                        {{ $book->Authors->name }}
                                    </td>
                                    <td class="text-secondary">
                                        {{ $book->title }}
                                    </td>
                                    <td class="rounded-md overflow-hidden w-1/6">
                                        <img class="aspect-square object-cover" src="{{ asset('storage/' . $book->cover) }}">
                                    </td>
                                    <td class="text-secondary">
                                        {{ $book->year }}
                                    </td>
                                    <td class="flex justify-end">
                                        <div class="flex flex-col gap-y-2 my-6">
                                            <a class="btn btn-warning btn-sm mb-2" href="{{ route('dashboard.edit', $book->id) }}">Edit</a>
                                            <a class="btn btn-info btn-sm mb-2" href="{{ route('dashboard.show', $book->id) }}">Details</a>
                                            <form action="{{ route('dashboard.destroy', $book->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm bg-red-600">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Authors</h3>
                <div class="card-actions flex justify-end">
                    <a href="{{ route('author.create') }}" class="btn btn-success card-link-pop duration-300">
                        Add New
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card">
                    <div class="table-responsive max-h-64 overflow-scroll">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="w-1/5">Name</th>
                                    <th class="w-2">Photo</th>
                                    <th class="flex justify-end">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                <tr>
                                    <td class="w-1/6">{{ $author->id }}</td>
                                    <td class="text-secondary">
                                        {{ $author->name }}
                                    </td>
                                    <td class="rounded-md overflow-hidden w-1/6">
                                        <img class="aspect-square object-cover" src="{{ asset('storage/' . $author->photo) }}">
                                    </td>
                                    <td class="flex justify-end">
                                        <div class="flex flex-col gap-y-2 my-6">
                                            <a class="btn btn-warning btn-sm mb-2" href="{{ route('author.edit', $author->id) }}">Edit</a>
                                            <form action="{{ route('author.destroy', $author->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm bg-red-600">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Publishers</h3>
                <div class="card-actions flex justify-end">
                    <a href="{{ route('publisher.create') }}" class="btn btn-success card-link-pop duration-300">
                        Add New
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card">
                    <div class="table-responsive max-h-64 overflow-scroll">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th class="flex justify-end">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->id }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td class="text-secondary">
                                        {{ $publisher->address }}
                                    </td>
                                    <td class="flex justify-end">
                                        <div class="flex flex-col gap-y-2 my-4">
                                            <a class="btn btn-warning btn-sm mb-2" href="{{ route('publisher.edit', $publisher->id) }}">Edit</a>
                                            <form action="{{ route('publisher.destroy', $author->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm bg-red-600">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
