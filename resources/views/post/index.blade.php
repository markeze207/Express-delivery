@extends('layouts.main')

@section('content')
    <!-- Blog-->
    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h2 class="h2-seti wow fadeIn">Новости</h2>
            <div class="row row-40 justify-content-center">
                @foreach($posts as $post)
                    <div class="col-md-6 wow fadeIn">
                        <!-- Post Classic-->
                        <article class="post-classic"><img class="post-classic-image" src="{{ $post->photo }}" alt="" style="width: 770px; height: 380px;" width="570" height="380"/>
                            <div class="post-classic-meta">
                                <div class="badge">Новость</div>
                                <time class="datetime-text" datetime="2019">{{ $post->created_at }} </time>
                            </div>
                            <h4 class="h2-seti font-weight-regular post-classic-title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                            <p class="datetime-text">{{ substr($post->content, 0, 50).'...' }}</p>
                            <a style="font-size: 15.5px;" class="h2-seti button button-link button-lg" href="{{ route('posts.show', $post->id) }}">Читать полностью...</a>
                        </article>
                    </div>
                @endforeach
                    <div>
                        {{ $posts->withQueryString()->links() }}
                    </div>
            </div>
        </div>
    </section>
@endsection
