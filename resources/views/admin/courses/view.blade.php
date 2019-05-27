@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Course Information
        </h1>
        <a href="{{ route("admin.courses.index") }}" class="btn btn-primary">
            Return Back
        </a>
    </div>

    <table class="table table-striped bg-white">
        <tbody>

        <tr>
            <th scope="row">Id</th>
            <td>{{ $course->id }}</td>
        </tr>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $course->name }}</td>
        </tr>
        <tr>
            <th scope="row">Description</th>
            <td>{{ $course->description }}</td>
        </tr>
        <tr>
            <th scope="row">Skills</th>
            <td>{{ $course->skills }}</td>
        </tr>
        <tr>
            <th scope="row">Language</th>
            <td>{{ $course->language }}</td>
        </tr>

          </tbody>
    </table>
<div>
    <a href="{{ route("admin.courses.edit", $course->id) }}" class="btn btn-warning text-capitalize">edit</a>
    <form onsubmit="return confirm('you are about to delete a record, Are u sure?')" class="d-inline-block" action="{{ route("admin.courses.delete") }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $course->id }}">
        <button type="submit" class="btn btn-danger text-capitalize">delete</button>
    </form>
</div>
@endsection