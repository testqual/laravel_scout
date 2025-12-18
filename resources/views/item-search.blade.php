<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Scout Algolia Search Example</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h2>Laravel Full Text Search using Scout & Algolia</h2>
            {{-- Add New Item Form --}}
            <form method="POST" action="{{ route('create-item') }}">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success">Create New Item</button>
                    </div>
                </div>
            </form>
            <br>
            {{-- Search Form --}}
            <form method="GET" action="{{ route('items-lists') }}">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="titlesearch" class="form-control" placeholder="Search by Title">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <br>
            {{-- Item List --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $items->links() }}
        </div>
    </body>
</html>