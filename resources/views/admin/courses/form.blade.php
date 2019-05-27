@extends("layouts.admin")

@section("adminContent")
    <div class="d-flex mb-4 justify-content-between align-items-center">
        <h1>
            Create Course
        </h1>
        <a href="{{ route("admin.courses.index") }}" class="btn btn-primary">
            back to Courses
        </a>
    </div>


    <div class="card">

        <div class="card-body">

            <form method="POST" action="{{ route("admin.courses.save")}}">
                @csrf

                @if($course->id > 0)
                    <input type="hidden" name="id" value="{{ $course->id }}">

                @endif

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name"
                               type="text"
                               value="{{ $course->name }}"
                               class="form-control"
                               name="name" autofocus>

                        @if($errors->has("name"))
                            <div class="text-danger font-weight-bold">
                                {{ $errors->first("name") }}
                            </div>
                        @endif

                    </div>
                </div>


                <div class="form-group row">
                    <label for="description"
                           class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <input id="description"
                               type="text"
                               value="{{ $course->description }}"
                               class="form-control"
                               name="description">

                        @if($errors->has("description"))
                            <div class="text-danger font-weight-bold">
                                {{ $errors->first("description") }}
                            </div>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="hours_no"
                           class="col-md-4 col-form-label text-md-right">{{ __('Hours No') }}</label>

                    <div class="col-md-6">
                        <input id="hours_no"
                               type="number"
                               value="{{ $course->hours_no }}"
                               class="form-control"
                               name="hours_no">

                        @if($errors->has("hours_no"))
                            <div class="text-danger font-weight-bold">
                                {{ $errors->first("hours_no") }}
                            </div>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="skills"
                           class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>
                    <div class="col-md-6">
                        <input id="skills"
                               type="text"
                               value="{{ $course->skills }}"
                               class="form-control"
                               name="skills">

                        @if($errors->has("skills"))
                            <div class="text-danger font-weight-bold">
                                {{ $errors->first("skills") }}
                            </div>
                        @endif

                    </div></div>

                    <div class="form-group row">
                        <label for="language"
                               class="col-md-4 col-form-label text-md-right">{{ __('Language') }}</label>
                        <div class="col-md-6">
                            <input id="language"
                                   type="text"
                                   value="{{ $course->language }}"
                                   class="form-control"
                                   name="language">

                            @if($errors->has("language"))
                                <div class="text-danger font-weight-bold">
                                    {{ $errors->first("language") }}
                                </div>
                            @endif
                        </div>


                        </div>
                <div class="form-group row">
                    <label for="image_path"
                           class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                    <div class="col-md-6">

                        @if($course->image_path)
                            <img src="{{ url($course->image_path) }}" alt="..." class="mb-3 img-thumbnail">
                        @endif

                        <input id="image_path"
                               type="file"
                               class="form-control"
                               name="image">
                        @if($errors->has("image_path"))
                            <div class="text-danger font-weight-bold">
                                {{ $errors->first("image_path") }}
                            </div>
                            @endif

                <div class="form-group row">
                    <label for="teacher"
                           class="col-md-4 col-form-label text-md-right">{{ __('Teacher') }}</label>
                    <div class="col-md-6">

{{--                        {{$teachers}}--}}

                             <select name="teacher_id" class="custom-select">
                            <option selected>Choose a teacher for this course</option>
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                 @endforeach
                        </select>


                    </div>


                </div>



        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
        </form>
    </div>
    </div>


@endsection