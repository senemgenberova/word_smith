@extends('frontLayout.master')

@section('content')
	<section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep to-capital">Category: {{ $category->category_name }}</h1>
            </div>
        </div>
        
        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">
				
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
	                                <a href="{{ route('category',$category) }}">{{ $category->category_name }}</a> 
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

            </div> <!-- end entries -->

            {{ $posts->links('frontLayout.pagination',['posts' => $posts]) }}
        </div> <!-- end entries-wrap -->
    </section> <!-- end s-content -->
@endsection