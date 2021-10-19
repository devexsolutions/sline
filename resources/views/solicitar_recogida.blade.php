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
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
        <div class="grid gap-6 mb-8 md:grid-cols-2">
                     
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <p>DATOS DE RECOGIDA</p>
                <div class="p-8">
                <label for="tipo_cod" class="block text-sm font-medium text-gray-700 ">
                      Seleccionar Trabajo:
                 </label>
                <select x-cloak id="tipo_cod" required name="tipo_cod">                                             
                    @foreach($trabajos as $trabajo)
                        <option value="{{$trabajo->id}}">{{$trabajo->numero_expediente}}&nbsp;-&nbsp;{{$trabajo->nombre_paciente}}&nbsp;{{$trabajo->apellidos_paciente}}</option>
                    @endforeach  
                </select> 
                <div class="mt-8">
                <label for="tipo_cod" class="block text-sm font-medium text-gray-700 ">
                      Servicios:
                 </label>
                <label class="flex justify-start items-start">
                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                        <input type="checkbox" class="opacity-0 absolute">
                        <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                    </div>
                    <div class="select-none">Vaciado de Modelos</div>
                </label>
                <label class="flex justify-start items-start">
                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                        <input type="checkbox" class="opacity-0 absolute">
                        <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                    </div>
                    <div class="select-none">Arcada Inferior</div>
                </label>
                <label class="flex justify-start items-start">
                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                        <input type="checkbox" class="opacity-0 absolute">
                        <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                    </div>
                    <div class="select-none">Arcada Superior</div>
                </label>
                </div>
            </div>
            <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Enviar solicitud</span>
                  </div>
                  <span>&nbsp;&nbsp; →</span>
            </button>
            </div>
            
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <p>INSTRUCCIONES</p>
                <ol class="mt-4 p-8">
                    <li>1.- Utilie nuestras cajas de recogida o en su defecto una caja rígida.</li>
                    <li>2.- Envuelva las impresiones en papel burbuja y asegurese que no se mueven en el interior (cada aracada por separado).</li>
                    <li>3.- Complete los datos de la etiqueta.</li>
                </ol>
            </div>
    
        </div>

<style>
  input:checked + svg {
  	display: block;
  }
</style>
    
</x-app-layout>