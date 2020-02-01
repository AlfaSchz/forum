@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{ $thread->creator->name }} - {{ $thread->title }}
                </div>

                <div class="card-body">
                    <article>
                        <div class="body">
                            {{ $thread->body }}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>

    @if (auth()->check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    @else
        <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate</p>
    @endif
</div>
@endsection
