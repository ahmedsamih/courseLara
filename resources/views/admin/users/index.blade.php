@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Users Management
        </h1>

    </div>

    <table class="table table-striped bg-white">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">email</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{route('admin.users.view',$user->id)}}" class="btn btn-info text-capitalize">View</a>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $data->links() }}
@endsection
