@extends('frontLayout.master')

@section('content')

    <section class="s-content s-content--top-padding s-content--narrow">

        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep">Contact Us.</h1>
                <p class="lead">
                Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor 
                sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim 
                mollit amet anim veniam dolor dolor irure velit commodo.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-full s-content__main">
                <p>
                	<img src="{{asset('/front/images/contact.jpg')}} " alt="contact">
                </p>

                <h2>Say Hello</h2>

                <p>
                Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti 
                dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique 
                sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis 
                
                <p>
                Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor 
                sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim 
                mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco. Lorem 
                ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat aute.
                </p>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97177.36984050238!2d49.733570107903475!3d40.43558656611169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403085750a9f3d61%3A0x24e5c126412d760!2sBaku+Engineering+University!5e0!3m2!1sen!2s!4v1544556963618" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>

                <!-- div id="map-wrap">
                    <div id="map-container"></div>
                    <div id="map-zoom-in"></div>
                    <div id="map-zoom-out"></div>
                </div>  -->

                <div class="row">
                    <div class="col-six tab-full">
                        <h4>Where to Find Us</h4>
						@foreach($contacts as $c)
							<span> {{ $c->address }} </span>
							<br>
						@endforeach

                    </div>

                    <div class="col-six tab-full">
                        <h4>Contact Info</h4>
						@foreach($contacts as $c)
							<span> {{ $c->email }} <br> {{ $c->phone_number }} </span>
							<br>
						@endforeach

                    </div>
                </div>

                <h4>Get In Touch</h4>

                @if(Session::has('message_success'))
                    <div class="alert alert-primary">
                        {{ Session::get('message_success') }}
                    </div>
                @endif

                <form name="cForm" id="cForm" class="contact-form" method="post" action="{{route('send_message')}}">
                    <fieldset>
                        
                        {{ csrf_field() }}
                        <div class="form-field">
                            <input name="email" id="email" class="full-width" placeholder="Your Email*" type="text" required >
                        </div>

                        <div>
                            <input name="subject" id="subject" class="full-width" placeholder="Subject" type="text" >
                        </div>

                        <div class="message form-field">
                            <textarea name="message" id="message" class="full-width" placeholder="Your Message*" required></textarea>
                        </div>

                        <button type="submit" class="submit btn btn--primary btn--large full-width">Send Message</button>

                    </fieldset>
                </form>

            </div> <!-- s-content__main -->
        </div> <!-- end row -->

    </section>

@endsection

@section('js')
<script>

    $(document).ready(function(){
        var fields = ['email','subject','message'];

        function setCookie(fieldName){
            $("#"+fieldName).keyup(function(){
                Cookies.set(fieldName,$(this).val(), {
                    expires: 7
                });
            });

            $("#"+fieldName).val(Cookies.get(fieldName));
        }

        for(i = 0; i<fields.length;i++ ){
            setCookie(fields[i]);

        }


    });

</script>
@endsection