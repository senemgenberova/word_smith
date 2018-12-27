@extends('frontLayout.master')

@section('content')
	    <!-- featured 
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">
	                @foreach($sliders as $slider)
						<div class="featured__slide">
	                        <div class="entry">

	                            <div class="entry__background" style="background-image:url('{{asset('/upload/slider/' . $slider->image)}}');"></div>
	                            
	                            <div class="entry__content">
	                                <h1>
	                                	<a href="{{$slider->link}}" > {{$slider->title}} </a>
	                                </h1>

	                                <div class="entry__info">
	                                    <ul class="entry__meta">
	                                        <li>{{ $slider->updated_at->format("F d, Y") }}</li>
	                                    </ul>
	                                </div>
	                            </div> <!-- end entry__content -->
	                            
	                        </div> <!-- end entry -->
	                    </div>
	                @endforeach
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row entries-wrap wide">
            <div class="entries">
				@if( $posts->count() != 0 )
	            	@foreach($posts as $post)
		                <article class="col-block">
		                    
		                    <div class="item-entry" data-aos="zoom-in">
		                        <div class="item-entry__thumb">
		                            <a href="{{ route('single_post',$post) }}" class="item-entry__thumb-link">
		                                <img src="{{ asset('upload/post/' . $post->image) }}" alt="{{ $post->title }}">
		                            </a>
		                        </div>
		        
		                        <div class="item-entry__text">    
		                            <div class="item-entry__cat">
		                                <a href="{{ route('category',$post->category) }}">{{ $post->category->category_name }}</a> 
		                            </div>
		    
		                            <h1 class="item-entry__title">
		                            	<a href="{{ route('single_post',$post) }}">
		                            		{{ substr($post->title,0,30)}} {{strlen($post->title) > 30 ? '..' : '' }}
		                            	</a>
		                            </h1>
		                                
		                            <div class="item-entry__date">
		                                {{ $post->updated_at->format("F d, Y") }}
		                            </div>
		                        </div>
		                    </div> <!-- item-entry -->

		                </article>
	            	@endforeach
				@endif

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->



        <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                {{ $posts->onEachSide(2)->links('frontLayout.pagination',['posts' => $posts])   }}

<!--                     <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul> -->
                </nav>
            </div>
        </div>

    </section> <!-- end s-content -->

@endsection