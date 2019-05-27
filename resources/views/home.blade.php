@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                        @if(\Illuminate\Support\Facades\Auth::user()->type=='student')
                            <div><a class='btn btn-primary' href="./admin/students">Go to Students Panel</a></div>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->type=='teacher')
                            <div><a class='btn btn-primary' href="./admin/teachers">Go to Teachers Panel</a></div>
                            @else
                            <div><a class='btn btn-primary' href="./admin/users">Go to Admin Panel</a></div>

                       @endif


                </div>

            </div>
        </div>
    </div>
</div>
@endsection
