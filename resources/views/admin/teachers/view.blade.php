@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Teacher Information
        </h1>
        <div class="form-row">
        <a href="{{ route("admin.teachers.edit", $teacher->id) }}" class="btn btn-warning text-capitalize">edit</a>
        <form onsubmit="return confirm('you are about to delete a record, Are u sure?')" class="d-inline-block" action="{{ route("admin.teachers.delete") }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <button type="submit" class="btn btn-danger text-capitalize">delete</button>
        </form>
        <a href="{{ route("admin.teachers.index") }}" class="btn btn-primary">
            Return Back
        </a>
        </div>
    </div>
    <div class="container">

        @if($teacher->id > 0)
            <input type="hidden" name="id" value="{{ $teacher->id }}">
        @endif

        <div class="row">
            <div class="col-md-4">
                @if($teacher->image_path)
                    <img src="{{ url($teacher->image_path) }}" alt="{{$teacher->name}}" class="mb-3 img-thumbnail">
                @endif
            </div>

            <div class="col-md-8">

            <table class="table table-striped bg-white">
        <tbody>

        <tr>
            <th scope="row">Id</th>
            <td>{{ $teacher->id }}</td>
        </tr>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $teacher->name }}</td>
        </tr>
        <tr>
            <th scope="row">Date Of Birth</th>
            <td>{{ $teacher->date_of_birth }}</td>
        </tr>
        <tr>
            <th scope="row">Mobile</th>
            <td>{{ $teacher->mobile }}</td>
        </tr>
        <tr>
            <th scope="row">National ID</th>
            <td>{{ $teacher->national_id }}</td>
        </tr>
        <tr>
            <th scope="row">email</th>
            <td>{{ $teacher->user->email }}</td>
        </tr>
                 </tbody>
    </table>
            </div>
            </div>
    </div>
<div>
    <h3>Teacher's Courses</h3>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Course ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Number of Students</th>
        </tr>
        </thead>
@foreach($teacher->courses as $data)
        <tr>
            <td scope="col">{{$data->id }}</td>
            <td scope="col">{{$data->name }}</td>
{{--            <td scope="col">{{$data->id }}</td>--}}
{{--            <td scope="col">{{$data->name }}</td>--}}
           <td scope="col">Number of Students</td>

        </tr>


         @endforeach
        <tbody>
{{--        @foreach($teachers as $teacher)--}}
{{--        <tr>--}}
{{--            <th scope="row">{{$teacher->id}}</th>--}}
{{--            <td>{{$teacher->national_id}}</td>--}}
{{--             </tr>--}}
{{--            @endforeach--}}
        </tbody>
    </table>
</div>
@endsection