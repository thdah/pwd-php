@extends("layouts.app")

@section("content")

    <div class="container" style="max-width: 600px;">
        <div class="card mb-2">
                <div class="card-body">
                    <h3 class="card-title">
                        {{$article->title}}
                    </h3>
                    <div class="text-muted">
                        <b>Category: {{$article->category->name}}, </b>
                        {{$article->created_at}}
                    </div>
                    <p>
                        {{$article->body}}
                    </p>
                    <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-sm btn-outline-danger">
                        Delete
                    </a>
                </div>
            </div>

            <ul class="list-group mt-4">
                <li class="list-group-item active">
                    Comments ({{ count($article->comments) }})
                </li>
                @foreach ($article->comments as $comment)
                    <li class="list-group-item">
                        <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>
                        {{ $comment->content }}
                    </li>
                @endforeach
            </ul>

            <form action="{{ url("/comments/create") }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content" class="form-control my-4" placeholder="Write something..."></textarea>
                <button class="btn btn-secondary">Add Comment</button>
            </form>
    </div>
@endsection