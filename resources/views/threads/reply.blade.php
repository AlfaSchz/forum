<div class="card mb-3">
    <div class="card-header">
        {{ $reply->owner->name }} - {{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="card-body">
        <article>
            <div class="body">
                {{ $reply->body }}
            </div>
        </article>
    </div>
</div>
