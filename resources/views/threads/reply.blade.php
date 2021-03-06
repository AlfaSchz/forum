<div class="card mb-3">
    <div class="card-header">
        <div class="level">
            <div class="flex">
                <a href="">{{ $reply->owner->name }}</a> - {{ $reply->created_at->diffForHumans() }}
            </div>

            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-outline-primary" {{ $reply->isFavorited() ? 'disabled' : ''}}>
                        {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count )}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="body">
            {{ $reply->body }}
        </div>
    </div>
</div>
