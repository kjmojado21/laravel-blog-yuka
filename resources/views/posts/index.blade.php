@extends('layouts.app')

@section('content')
    @forelse ($all_posts as $post)
        <div class="mt-2 border border-2 rounded p-4">
            <a href="{{route('post.show',$post->id)}}">
                <h4 class="h4">
                    {{$post->title}}
                </h4>
            </a>
            <h6 class="text-muted">
                {{$post->user->name}}
            </h6>
            <p class="fw-light mb-0"> {{$post->description}} </p>

            @if ($post->user->id == Auth::user()->id)
               <div class="row">
                <div class="col text-end">
                    <a href="" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="#" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </div>
               </div>

            @endif
        </div>
    @empty
        <div style="margin-top: 100px">
            <h2 class="text-muted text-center">
                No posts yet
            </h2>
            <div class="text-center">
                <a href="{{ route('post.create') }}" class="text-decoration-none">Create new post</a>
            </div>
        </div>
    @endforelse
@endsection
