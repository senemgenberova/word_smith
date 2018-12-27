@if($posts->lastPage() > 1)
    <div class="row pagination-wrap">
        <div class="col-full">
            <nav class="pgn" data-aos="fade-up">
                <ul>
                    @if( !is_null($posts->previousPageUrl()) )
                        <li><a class="pgn__prev" href="{{ $posts->previousPageUrl() }}">Prev</a></li>
                    @endif

                    @if($posts->currentPage() > 3)
                        <li><span class="pgn__num dots">...</span></li>                   
                    @endif

                    @for($i=1; $i<= $posts->lastPage(); $i++)
                        <li>
                            @if($i >= $posts->currentPage()-2 && $i <= $posts->currentPage() + 2)
                                @if($i != $posts->currentPage())
                                    <a class="pgn__num" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                @else
                                    <span class="pgn__num current">{{ $i }}</span>
                                @endif
                            @endif
                            
                        </li>                  
                    @endfor

                    @if($posts->currentPage() < $posts->lastPage() - 2)
                        <li><span class="pgn__num dots">...</span></li>                   
                    @endif

                    @if( !is_null($posts->nextPageUrl()) )
                        <li><a class="pgn__next" href="{{ $posts->nextPageUrl() }}">Next</a></li>
                    @endif
                    
                </ul>
            </nav>
        </div>
    </div>
@endif