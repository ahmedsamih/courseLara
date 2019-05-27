@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Teacher Information
        </h1>
        <div class="form-row">
            <a href="{{ route("admin.students.edit", $student->id) }}" class="btn btn-warning text-capitalize">edit</a>
            <form onsubmit="return confirm('you are about to delete a record, Are u sure?')" class="d-inline-block" action="{{ route("admin.students.delete") }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}">
                <button type="submit" class="btn btn-danger text-capitalize">delete</button>
            </form>
            <a href="{{ route("admin.students.index") }}" class="btn btn-primary">
                Return Back
            </a>
        </div>
    </div>
    <div class="container">

        @if($student->id > 0)
            <input type="hidden" name="id" value="{{ $student->id }}">
        @endif

        <div class="row">
            <div class="col-md-4">
                @if($student->image_path)
                    <img src="{{ url($student->image_path) }}" alt="{{$student->name}}" class="mb-3 img-thumbnail">
                @endif
            </div>

            <div class="col-md-8">

                <table class="table table-striped bg-white">
                    <tbody>

                    <tr>
                        <th scope="row">Id</th>
                        <td>{{ $student->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date Of Birth</th>
                        <td>{{ $student->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mobile</th>
                        <td>{{ $student->mobile }}</td>
                    </tr>
                    <tr>
                        <th scope="row">National ID</th>
                        <td>{{ $student->national_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">email</th>
                        <td>{{ $student->user->email }}</td>
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

            <tbody>
            {{--        @foreach($students as $student)--}}
            {{--        <tr>--}}
            {{--            <th scope="row">{{$student->id}}</th>--}}
            {{--            <td>{{$student->national_id}}</td>--}}
            {{--             </tr>--}}
            {{--            @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection