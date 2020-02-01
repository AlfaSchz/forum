@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">Forum Threads</div>

                    @foreach ($threads as $thread)
                        <div class="card-body">
                            <article>
                                <h4>
                                    <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                                </h4>
                                <div class="body">
                                    {{ $thread->body }}
                                </div>
                                <hr>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
