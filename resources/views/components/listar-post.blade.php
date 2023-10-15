<div>
    @if ($post->count())
        
    <div class="grid md:grdi-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ( $post as $post )
        <div>
            <a href="{{ route('posts.show', ['post'=>$post,'user'=>$post->user])}}"><img src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}"></a>
        </div>
    @endforeach
    </div>
    <div class="mt-6">
        {{-- {{$post->links() }} --}}
    </div>  
@else
    <p class="text-center">No hay post, sigue a alguien para verlos</p>
@endif

</div>