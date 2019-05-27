@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Teacher Information
        </h1>
        <div class="form-row">

        <a href="{{ route("admin.users.index") }}" class="btn btn-primary">
            Return Back
        </a>
        </div>
    </div>
    <div class="container">

        @if($user->id > 0)
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif

        <div class="row">


            <div class="col-md-8">

            <table class="table table-striped bg-white">
        <tbody>

        <tr>
            <th scope="row">Id</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $user->name }}</td>
        </tr>

        <tr>
            <th scope="row">Type</th>
            <td>{{ $user->type }}</td>
        </tr>

        <tr>
            <th scope="row">email</th>
            <td>{{ $user->email }}</td>
        </tr>
                 </tbody>
    </table>
            </div>
            </div>
    </div>
</div>
@endsection