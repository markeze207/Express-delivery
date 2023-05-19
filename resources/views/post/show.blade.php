@extends('layouts.main')

@section('content')
    <!-- Blog-->
    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h2 class="h2-seti wow fadeIn">{{ $post->title }}</h2>
            <div class="row row-40 justify-content-center">
                <div class="col-md-6 wow fadeIn">
                    <!-- Post Classic-->
                    <article class="post-classic"><img class="post-classic-image" src="{{ $post->photo }}" alt="" style="width: 770px; height: 380px;"/>
                        <div class="post-classic-meta">
                            <time class="datetime-text" datetime="2019">{{ $post->created_at }} </time>
                        </div>
                        <div>
                            <p style="word-break: break-all;" class="datetime-text">{{ $post->content }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
