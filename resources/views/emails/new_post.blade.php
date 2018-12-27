@component('mail::message')
# New Post Alert!

<a href="{{ route('single_post',$post) }}">
	{{ $post->title }}
</a>


@endcomponent
