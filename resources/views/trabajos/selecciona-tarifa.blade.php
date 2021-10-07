<style>

.radio input ~ label {
  background-color: rgb(233, 225, 225);
  color: rgb(158, 146, 146);
}
.radio input:checked ~ label {
  background-color: rgb(70, 230, 22);
  color: white;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Trabajo -> Seleccionar Tarifa') }}
        </h2>
    </x-slot>
    <form action="{{ route('trabajos.selecciona-tarifa.post') }}" method="POST">
                @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:col-span-12">
            <div class="mx-12 space-y-12 lg:space-y-0 lg:flex lg:gap-4 lg:items-center lg:justify-center">
            @foreach($tarifas as $tarifa)  
            <div class="max-w-sm p-8 border-t-4 border-indigo-600 bg-white rounded shadow-lg">
                <h3 class="text-2xl text-center"> {{$tarifa->tarifa}}</h3>
                <p class="text-center"><input required type="radio" class="form-radio" name="tarifa_cod" id="tarifa{{$tarifa->id}}" value="{{$tarifa->id}}" /></p>
                <div>
                    <ul class="space-y-4 list-disc">
                    </ul>
                    <div class="flex items-center justify-center mt-4">
                    <button class="w-full px-2 py-2 text-indigo-200 bg-indigo-600 rounded" id="modal{{$tarifa->id}}">+ Info</button>
                    </div>
                </div>
            </div>
            <div class="modal{{$tarifa->id} hidden h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
                <!-- modal -->
                <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
                <!-- modal header -->
                <div class="border-b px-4 py-2 flex justify-between items-center">
                    <h3 class="font-semibold text-lg">
                         {{$tarifa->tarifa}}
                    </h3>
                    <button class="text-black close-modal">&cross;</button>
                </div>
                <!-- modal body -->
                <div class="p-3">
                      {{$tarifa->descripcion}}
                </div>
                <div class="flex justify-end items-center w-100 border-t p-3">        
                    <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white" onclick>Cerrar</button>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
            <button type="submit" class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">Continuar &#10148;</button>
        </div>
    </div>
</form>

  
  <script>
    const modal = document.querySelector('.modal');

    const showModal = document.querySelector('.show-modal');
    const closeModal = document.querySelectorAll('.close-modal');

    showModal.addEventListener('click', function (){
      modal.classList.remove('hidden')
    });

    closeModal.forEach(close => {
      close.addEventListener('click', function (){
        modal.classList.add('hidden')
      });
    });
  </script>
   
    
</x-app-layout>