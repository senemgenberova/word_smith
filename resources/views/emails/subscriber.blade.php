@component('mail::message')
# Thanks for subscription , {{ explode('@', $subscriber->email)[0]  }}

For looking at new posts, click the button below.

@component('mail::button', ['url' => route('home')])
Main Page
@endcomponent


@endcomponent
