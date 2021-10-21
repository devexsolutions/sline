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
    <form action="{{ route('trabajos.selecciona-tarifa.post') }}" name="frmtarifas" method="POST">
                @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('wizard.step1')
            <div class="md:col-span-12">
            <div class="mx-12 space-y-12 lg:space-y-0 lg:flex lg:gap-4 lg:items-center lg:justify-center">
            @foreach($tarifas as $tarifa)  
            <div class="max-w-sm p-8 border-t-4 border-gray-600 bg-white rounded shadow-lg">
                <h3 class="text-2xl text-center"> {{$tarifa->tarifa}}</h3>
                <p class="text-center"><input required type="radio" class="form-radio" name="tarifa_cod" id="tarifa{{$tarifa->id}}" value="{{$tarifa->id}}" /></p>
                <div>
                    <ul class="space-y-4 list-disc">
                    </ul>
                    <div class="flex items-center justify-center mt-4">
                    <a href="#" class=" show-modal{{$tarifa->id}} w-full px-2 py-2 text-indigo-200 border-purple-600 rounded" id="modal{{$tarifa->id}}">+ Info</a>
                    </div>
                </div>
            </div>
            <div class="modal{{$tarifa->id}} hidden h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
                <!-- modal -->
                <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
                <!-- modal header -->
                <div class="border-b px-4 py-2 flex justify-between items-center">
                    <h3 class="font-semibold text-lg">
                         
                    </h3>
                    
                </div>
                <!-- modal body -->
                <div class="p-3">
                      {!! $tarifa->descripcion !!}
                </div>
                <div class="flex justify-end items-center w-100 border-t p-3">  
                    <button class="text-black close-modal{{$tarifa->id}}">Cerrar</button>      
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <br /><br />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
            <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Rellenar Datos del Paciente</span>
                  </div>
                  <span>&nbsp;&nbsp; →</span>
            </button>
        </div>
    </div>
</form>

  
  <script>
    const modal1 = document.querySelector('.modal1');
    const showModal1 = document.querySelector('.show-modal1');
    const closeModal1 = document.querySelectorAll('.close-modal1');
    showModal1.addEventListener('click', function (){
      modal1.classList.remove('hidden')
    });
    closeModal1.forEach(close => {
      close.addEventListener('click', function (){
        modal1.classList.add('hidden')
      });
    });

    const modal2 = document.querySelector('.modal2');
    const showModal2 = document.querySelector('.show-modal2');
    const closeModal2 = document.querySelectorAll('.close-modal2');
    showModal2.addEventListener('click', function (){
      modal2.classList.remove('hidden')
    });
    closeModal2.forEach(close => {
      close.addEventListener('click', function (){
        modal2.classList.add('hidden')
      });
    });

    const modal3 = document.querySelector('.modal3');
    const showModal3 = document.querySelector('.show-modal3');
    const closeModal3 = document.querySelectorAll('.close-modal3');
    showModal3.addEventListener('click', function (){
      modal3.classList.remove('hidden')
    });
    closeModal3.forEach(close => {
      close.addEventListener('click', function (){
        modal3.classList.add('hidden')
      });
    });

    const modal4 = document.querySelector('.modal4');
    const showModal4 = document.querySelector('.show-modal4');
    const closeModal4 = document.querySelectorAll('.close-modal4');
    showModal4.addEventListener('click', function (){
      modal4.classList.remove('hidden')
    });
    closeModal4.forEach(close => {
      close.addEventListener('click', function (){
        modal4.classList.add('hidden')
      });
    });



  </script>
   
    
</x-app-layout>