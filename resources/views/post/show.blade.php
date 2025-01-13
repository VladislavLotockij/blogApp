@extends('layouts.main')

@section('content')
<style>
    .white-pink-border {
            border-top: 5px solid white;   /* Белая верхняя граница */
            border-right: 5px solid pink;  /* Розовая правая граница */
            border-bottom: 5px solid white;/* Белая нижняя граница */
            border-left: 5px solid pink;   /* Розовая левая граница */
            padding: 20px;
            background-color: #f0f0f0;     /* Легкий фон для контраста */
        }
</style>
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->translatedFormat('F') }} {{ $date->day() }} {{ $date->year() }} {{ $date->format('H') }} {{ $post->comments->count() }} Коментария</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                {{!! $post->content !!}} 
            </div>
        </section>
        <section class="py-3">
            @auth
            <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                @csrf
                <span>{{ $post->liked_users_count }}</span>
                <button type="submit" class="border-0 bg-transparent">
                    @auth
                    @if (auth()->user()->likedPosts->contains($post->id))
                    <i class="fas fa-heart"></i>
                    @else
                    <i class="far fa-heart"></i>
                    @endif
                    @endauth
                </button>
            </form>
            @endauth
            @guest
                <div>
                        <span>{{ $post->liked_users_count }}</span>
                        <i class="far fa-heart"></i>
                </div>
            @endguest
        </section>
        
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if ($relatedPosts->count() > 0)
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('storage/' . $relatedPost->main_image) }}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <a href="{{ route('post.show', $relatedPost->id)}}"><h5 class="post-title">{{ $post->title }}</h5></a>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
                <section>
                    @auth();
                    <div>
                        <h3>Коментарии ({{$post->comments->count()}})</h3>
                    </div>
                    @foreach ($post->comments as $comment)
                    <div class="comment-text white-pink-border">
                        <span class="username">
                          <div>{{ $comment->user->name}}
                          </div>
                          <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                        </span><!-- /.username -->
                        {{$comment->message}}
                      </div>
                    @endforeach
                    @endauth
                </section>
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Добавить коментарий</h2>
                    <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                            <label for="comment" class="sr-only">Comment</label>
                            <textarea name="message" id="comment" class="form-control" placeholder="Напишите коментарий" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Добавить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
