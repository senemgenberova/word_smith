@extends('frontLayout.master')

@section('content')

<section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="{{ asset('/upload/post/' . $post->image) }}" alt="{{ $post->title }}">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    {{ $post->title }}
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"> {{ $post->updated_at->format('F d, Y') }} </li>
                    <li class="byline">
                        By <span class="black"> {{ $post->user->name }} </span>                        
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p> {{ $post->description }} </p>

                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list entry__tax-list--pill to-capital">
                            <a href="{{ route('category',$post->category) }}"> {{ $post->category->category_name }} </a>
                        </span>
                    </div> <!-- end entry__cat -->
                </div> <!-- end s-content__taxonomies -->

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->


        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                @if(isset($previousPost))
                    <div class="col-six s-content__prev">
                        <a href="{{ route('single_post', $previousPost) }}" rel="prev">
                            <span>Previous Post</span>
                            {{ $previousPost->title }} 
                        </a>
                    </div>
                @endif

                @if(isset($nextPost))
                    <div class="col-six s-content__next">
                        <a href="{{ route('single_post' , $nextPost) }}" rel="next">
                            <span>Next Post</span>
                            {{ $nextPost->title }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
</section>

@endsection