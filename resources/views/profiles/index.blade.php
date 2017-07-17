@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="GET" action="/profile/{{ Auth::user()->id }}/edit">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <div class="text-left" style="padding-top: 8px;">{{ Auth::user()->name }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <div class="text-left" style="padding-top: 6px;">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Icon Image</label>
                            <div class="col-md-6" style="padding-top: 12px;">
                                <div class="text-left" style="width: 100px; height: 100px;">
                                    <img src="{{ asset('storage/avatar/' . Auth::user()->picture) }}" alt="avatar" style="width: 100%; height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
