<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Trabajo') }}
        </h2>
    </x-slot>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex mb-4"> 

            <div class="py-12 w-9/12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Columna Trabajo -->    
                        <div class="md:col-span-8">
                            <div class="mt-12 md:mt-0 ">
                                <div class="shadow ">

                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="flex flex-wrap -m-4"> 
                                                    <div class="lg:w-1/2  w-1/2">                              
                                                            <label for="nombre_paciente" class="block text-sm font-medium text-gray-700">
                                                                Nombre
                                                            </label>
                                                            <div class="mt-1 flex rounded-md shadow-sm"> 
                                                                <label>{{ $trabajo->nombre_paciente }}</label>                 
                                                            </div>   
                                                    </div>
                                                    <div class="lg:w-1/2 w-1/2">
                                                        <label for="apellidos_paciente" class="block text-sm font-medium text-gray-700">
                                                        Apellidos
                                                        </label>
                                                        <div class="mt-1 flex rounded-md shadow-sm">                  
                                                            <label>{{ $trabajo->apellidos_paciente }}</label>
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>
                                    
                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="flex flex-wrap -m-4"> 
                                                    <div class="lg:w-1/2  w-1/2">                              
                                                            <label for="edad" class="block text-sm font-medium text-gray-700">
                                                                Edad
                                                            </label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                            <label>{{ $trabajo->edad }}</label>                  
                                                            </div>   
                                                    </div>
                                                    <div class="lg:w-1/2 w-1/2">
                                                        <label for="nombre_clinica" class="block text-sm font-medium text-gray-700">
                                                            Cl&iacute;nica
                                                            </label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">                  
                                                            <label>{{ $trabajo->nombre_clinica }}</label>
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>

                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="flex flex-wrap -m-4"> 
                                                    <div class="lg:w-1/2  w-1/2">                              
                                                    <label for="nombre_doctor" class="block text-sm font-medium text-gray-700">
                                                        Doctor
                                                        </label>
                                                        <div class="mt-1 flex rounded-md shadow-sm">                  
                                                            <label>{{ $trabajo->nombre_doctor }}</label>
                                                        </div>   
                                                    </div>
                                                    <div class="lg:w-1/2 w-1/2">
                                                    <label for="tipo" class="block text-sm font-medium text-gray-700">
                                                        Tipo
                                                        </label>
                                                        <div class="mt-1 flex rounded-md shadow-sm">    
                                                            @if ( $trabajo->apellidos_paciente  == 1)
                                                                <label>Generalista</label>
                                                            @else
                                                            <label>Ortodoncista</label>
                                                            @endif  
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>
                                            
                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="flex flex-wrap -m-4"> 
                                                    <div class="lg:w-1/2  w-1/2">                              
                                                    <label for="nombre_doctor" class="block text-sm font-medium text-gray-700">
                                                        Número expediente
                                                        </label>
                                                        <div class="mt-1 flex rounded-md shadow-sm">                  
                                                            <label>{{ $trabajo->numero_expediente }}</label>
                                                        </div>   
                                                    </div>
                                                    <div class="lg:w-1/2 w-1/2">
                                                    <label for="tipo" class="block text-sm font-medium text-gray-700">
                                                        Número colegiado Doctor
                                                        </label>
                                                        <div class="mt-1 flex rounded-md shadow-sm"> 
                                                            <label>{{ $trabajo->numero_colegiado }}</label>                                                 
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>
                                
                                        <label for="about" class="block text-sm font-medium text-gray-700">
                                            Objetivos
                                        </label>
                                        <div class="mt-1">
                                            <pre>
                                            {{  $trabajo->objetivos }}
                                            </pre>
                                        </div>                                                               
                                    </div>                            
                                </div>

                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6 mt-6">
                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="grid grid-cols-4 gap-4">
                                                    @if (sizeof($trabajo->documentos) > 0)
                                                        @foreach($trabajo->documentos as $documento) 
                                                            @switch($documento->nombre)
                                                                @case('prescripcion')
                                                                    <div id="whoobe-pqyb1" class="w-full md:w-56 justify-center items-center shadow px-6 py-4 flex flex-col" style="font-family: Montserrat;">
                                                                        <h5>Prescripción</h5>                                          
                                                                        <a target="_blank" href="/documentos-legales/{{$trabajo->id}}/{{$documento->nombre_archivo}}" class="cursor-pointer">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                            </svg>
                                                                        </a>                                                                        
                                                                    </div>
                                                                
                                                                    @break
                                                                @case('advertencias')
                                                                        <div id="whoobe-pqyb1" class="w-full md:w-56 justify-center items-center shadow px-6 py-4 flex flex-col" style="font-family: Montserrat;">
                                                                            <h5>
                                                                                Advertencias Legales
                                                                            </h5>
                                                                            <a target="_blank" href="/documentos-legales/{{$trabajo->id}}/{{$documento->nombre_archivo}}" class="cursor-pointer">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                     @break  
                                                                @case('autorizacion')
                                                                <div id="whoobe-pqyb1" class="w-full md:w-56 justify-center items-center shadow px-6 py-4 flex flex-col" style="font-family: Montserrat;">
                                                                        <h5>Autorización</h5>                                          
                                                                        <a target="_blank" href="/documentos-legales/{{$trabajo->id}}/{{$documento->nombre_archivo}}" class="cursor-pointer">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                    @break                                                                                                                         
                                                            @endswitch                                                                                                                                                                     
                                                        @endforeach                             
                                                    @endif                                           
                                            </div>
                                        </div>
                                </div>



                                <div class="px-4 py-3 my-7 bg-gray-50 text-right sm:px-6">
                                    <div class="container px-5 py-14 mx-auto">           
                                            <div class="flex flex-wrap -m-4">
                                                @if (sizeof($trabajo->fotos) > 0)
                                                    @foreach($trabajo->fotos as $foto)
                                                    <div class="lg:w-1/4 p-4 w-1/2"> 
                                                        @if (in_array($foto->nombre, $nombrefotos)) 
                                                            <a @click="$dispatch('img-modal', {  imgModalSrc: '/fotos-trabajos/{{$trabajo->id}}/{{$foto->nombre_archivo}}', imgModalDesc: '' })" class="cursor-pointer">
                                                                <img alt="Placeholder" class="object-fit w-full" src="/fotos-trabajos/{{$trabajo->id}}/{{$foto->nombre_archivo}}">
                                                            </a>    
                                                        @else 
                                                            <img class="w-full rounded-lg" src="/fotos-trabajos/no-image.png" />
                                                        @endif
                                                        <div class="mt-4">  
                                                            <h2 class="text-gray-900 title-font text-lg text-center font-medium">{{$foto->nombre}}</h2>
                                                        </div>
                                                    </div>
                                                    @endforeach                             
                                                @else
                                                    @foreach($nombrefotos as $nombrefoto)
                                                        <div class="lg:w-1/4 p-4 w-1/2">
                                                            <img class="w-full rounded-lg" src="/fotos-trabajos/no-image.png" />
                                                            <div class="mt-4">  
                                                                <h2 class="text-gray-900 title-font text-lg text-center font-medium">{{$nombrefoto}}</h2>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif 
                                            </div>
                                    </div>
                                </div>
                                
                               
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="grid grid-cols-4 gap-4">
                                                    @if (sizeof($trabajo->documentos) > 0)
                                                        @foreach($trabajo->documentos as $documento) 
                                                            @switch($documento->nombre)
                                                                @case('url_planificacion')
                                                                    <div id="whoobe-pqyb1" class="w-full md:w-56 justify-center items-center shadow px-6 py-4 flex flex-col" style="font-family: Montserrat;">
                                                                        <h3 class="text-gray-700 text-3xl" id="whoobe-d4an2">
                                                                            Setup
                                                                        </h3>                                                                   
                                                                        <a  @click="$dispatch('setup-modal', {  setupModalSrc: '{{$documento->nombre_archivo}}', imgModalDesc: '' })" class="cursor-pointer">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                                        </svg>
                                                                        </a>                                                                        
                                                                    </div>
                                                                
                                                                    @break
                                                                @case('IPR')
                                                                        <div id="whoobe-pqyb1" class="w-full md:w-56 justify-center items-center shadow px-6 py-4 flex flex-col" style="font-family: Montserrat;">
                                                                            <h3 class="text-gray-700 text-3xl" id="whoobe-d4an2">
                                                                                {{$documento->nombre}}
                                                                            </h3>
                                                                            <a target="_blank" href="/documentos-gestion/{{$trabajo->id}}/{{$documento->nombre_archivo}}" class="cursor-pointer">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                     @break  
                                                                @case('factura')
                                                                    <div>
                                                                        <h5>Factura Planificación</h5>                                          
                                                                        <a href="{{$documento->nombre_archivo}}" class="cursor-pointer">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                    @break
                                                                @case('presupuesto')
                                                                    <div>
                                                                        <h5>Presupuesto Fabricación</h5>                                          
                                                                        <a href="{{$documento->nombre_archivo}}" class="cursor-pointer">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                    @break                                                          
                                                            @endswitch                                                                                                                                                                     
                                                        @endforeach                             
                                                    @endif                                           
                                            </div>
                                        </div>
                                </div>

                                @if ($trabajo->estado_cod == 3) 
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6 mt-6">
                                        <div class="container px-5 py-7 mx-auto">
                                            <div class="grid grid-cols-4 gap-4 w-full ">
                                                                                                                                            
                                                        <div class=" mr-70">
                                                            <form action="{{ route('trabajos.aceptar-planificacion.post') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                                <button type="submit" class="flex mx-20 p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="">
                                                                    <div class="flex items-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                    </svg>
                                                                        <span>Aceptar</span>
                                                                    </div>                                                            
                                                                </button>                                                            
                                                            </form>  
                                                        </div>
                                                        <div class=" mx-170">  
                                                            <form action="{{ route('trabajos.rechazar-planificacion.post') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                                <button type="submit" class="flex p-4 mb-8 text-sm font-semibold  bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="">
                                                                    <div class="flex items-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                                        </svg>
                                                                        <span>Rechazar</span>
                                                                    </div>                                                            
                                                                </button>
                                                            </form>
                                                        </div>                                                                              
                                            </div>
                                        </div>
                                </div>
                                @endif    



                             </div>
                        </div> 
                        
                </div>       
           
            </div>
                                                               
            <div class="w-3/12 py-12">
                @livewire('comentarios')
            </div>   
</div>
<div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
        <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
          <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
            <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
              <div class="z-50">
                <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                  <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                  </svg>
                </button>
              </div>
                <div class="p-2">
                    <img :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">
                    <p x-text="imgModalDesc" class="text-center text-white"></p>
                </div>
            </div>
          </div>
        </template>
 </div>

 <div x-data="{ setupModal : false, setupModalSrc : '', setupModalDesc : '' }">
        <template @setup-modal.window="setupModal = true; setupModalSrc = $event.detail.setupModalSrc; setupModalDesc = $event.detail.setupModalDesc;" x-if="setupModal">
          <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="setupModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
            <div @click.away="setupModal = ''" class="flex flex-col w-full h-5/6 overflow-auto">
              <div class="z-50">
                <button @click="setupModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                  <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                  </svg>
                </button>
              </div>
              <div class="p-2 h-5/6">
                     <iframe class="w-full min-h-full" width="100%" height="100%" :src="setupModalSrc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </template>
 </div>
    
</x-app-layout>