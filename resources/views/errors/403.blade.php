@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center>
                    <div class="card-header">403</div>

                    <div class="error-container">
                        <div class="error-code-container">
                            <img src="{{ asset('assets/img/error-bg.png') }}" alt="" class="error-img">
                        </div>
                        <p class="error-message">Sorry, You are not authorized to do this action.</p>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back to previous page</a>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection

