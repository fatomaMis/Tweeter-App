@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home Twitter</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="tweet_list">
                        @if(Auth::check())
                            @include('tweets.list-admin')
                        @else
                            @include('tweets.list')
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
