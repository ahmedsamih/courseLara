@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Courses Management
        </h1>
        <a href="{{ route("admin.courses.create") }}" class="btn btn-primary">
            Create new Course
        </a>
    </div>

    <table class="table table-striped bg-white">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Hours_no</th>
            <th scope="col">Skill</th>
            <th scope="col">Language</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->hours_no }}</td>
                <td>{{ $course->skills }}</td>
                <td>{{$course->language}}</td>
                <td>
                    <div class="row">
                    <a href="{{ route("admin.courses.view", $course->id) }}" class="btn btn-info text-capitalize ">View</a>
                    <a href="{{ route("admin.courses.edit", $course->id) }}" class="btn btn-warning text-capitalize">edit</a>


                    <form onsubmit="return confirm('you are about to delete a record, Are u sure?')" class="d-inline-block" action="{{ route("admin.courses.delete") }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $course->id }}">
                        <button type="submit" class="btn btn-danger text-capitalize">delete</button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $data->links() }}
@endsection