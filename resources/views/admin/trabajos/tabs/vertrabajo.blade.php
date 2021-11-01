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

    
</div>