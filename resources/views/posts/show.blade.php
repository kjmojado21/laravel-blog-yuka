@extends('layouts.app')

@section('title','Show page')


@section('content')

<div class="mt-2 border border-2 rounded p-4">

        <h4 class="h4">
            {{$post->title}}
        </h4>

    <h6 class="text-muted">
        {{$post->user->name}}
    </h6>
    <p class="fw-light mb-0"> {{$post->description}} </p>

    <img src="{{asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-thumbnail w-100 mt-3">

</div>

<form action="{{route('comment.store',$post->id)}}" method="post" class="mt-3">
    @csrf

    <div class="input-group">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="text" name="body" id="" value class="form-control" placeholder="Comment">
        <button type="submit" class="btn btn-secondary">Post</button>
    </div>
</form>

 <ul class="list-group mt-3">
    @foreach ($post->comments as $comment)
        <li class="list-group-item border-0 py-3">
            <p class=" fw-bold my-0">{{ $comment->user->name }}
                &middot; <span class="small text-muted">{{$comment->created_at->diffForHumans()}}</span>
            </p>

            {{$comment->body}}

                @if ($comment->user_id == Auth::id())
                    <form action="{{route('comment.store')}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-outline-danger btn-sm float-end">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                @endif

        </li>
    @endforeach
 </ul>
@endsection
