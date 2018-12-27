@extends('frontLayout.master')

@section('content')

<section class="s-content s-content--top-padding s-content--narrow">

    <div class="row narrow">
        <div class="col-full s-content__header">
            <h1 class="display-1 display-1--with-line-sep">About Wordsmith. </h1>
            <p class="lead">
            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor 
            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim 
            mollit amet anim veniam dolor dolor irure velit commodo.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-full s-content__main">
            <p>
            <img src=" {{asset('/front/images/about.jpg') }}" alt="">
            </p>

            @foreach($abouts as $a)
            	@if($a->onTop == 1)
					<div class="single_about">					
			            <h2>{{ $a->title }}</h2>

			            <p>{{ $a->content }} </p>
					</div>            
            	@endif
            @endforeach

            <hr>
            
            <div class="row block-1-2 block-tab-full">
                @foreach($abouts as $a)
                	@if($a->onTop == 0)

    	                <div class="col-block">
    	                    <h4 class="quarter-top-margin">{{ $a->title }}</h4>
    	                    <p>{{ $a->content }}</p>
    	                </div>
            
                	@endif
                @endforeach
            </div>  
        </div> 
    </div> 
    
</section>

@endsection