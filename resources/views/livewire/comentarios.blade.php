<div>
    Comentarios

    <form wire:submit.prevent="comentario()">
        
        <div class="block max-w-3xl px-1 py-2 mx-auto">            
            <div class="my-5">              
                <textarea wire:model="mensaje"  class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Escriba su texto"></textarea>
            </div>
        </div>
        <div class="block">
            <button type="submit" class="w-full px-3 py-4 font-medium text-yellow-300 bg-gray-700 rounded-lg">Enviar</button>
           
        </div>
    </form>

<section>

@foreach ($comentarios as $comentario)
    <div class="">
        @if ( $comentario->is_admin == 1)
        <div class="h-auto py-5 px-3 mt-5 bg-color: bg-yellow-200  flex flex-col space-y-5 mx-auto rounded-3xl shadow-xl hover:rotate-1 transition-transform">
        @else
        <div class="h-auto py-5 px-3 mt-5   flex flex-col space-y-5 mx-auto rounded-3xl shadow-xl hover:rotate-1 transition-transform">
        @endif
        <p>{{ $comentario->texto }}</p>
        </div>
    </div>
@endforeach


</section>

</div>