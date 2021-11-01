<div class="mt-12 md:mt-0 ">                                
    <div class="shadow ">
        @if (sizeof($trabajo->documentos) > 0)
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container px-5 py-7 mx-auto">
                        <div class="grid grid-cols-4 gap-4">
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
                                @endswitch                                                                                                                                                                     
                            @endforeach    
                        </div>
                    </div>
                </div>                         
                @endif    
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="container px-5 py-7 mx-auto">
                <form action="{{ route('admin.trabajos.guardar-planificacion.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="flex flex-wrap -m-4"> 
                        <div class="lg:w-1/2  w-full">                              
                                <label for="url_planificacion" class="block text-sm font-medium text-gray-700 text-bold px-6">
                                    URL Trabajo
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm px-6">                  
                                    <input type="text" required name="url_planificacion" id="url_planificacion" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                </div>   
                        </div>
                    </div>
                    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-5">
                    <h1>IPR </h1>
                    <div  x-data="items()" class="border  border-dashed border-gray-500 relative w-full	">
                            <input type="file" required @change="updatePreview()" name="ipr" id="ipr" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                            <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto justify-items-center">
                                <h4>
                                    Arrastre o haga clic para seleccionar el fichero
                                    <br/>
                                </h4>
                                <p class="">Seleccionar Fichero</p>
                                <img aria-hidden="true" class="h-14 m-auto dark:hidden" src="{{ asset('img/pdf.png') }}" alt="Office" />
                                <span class=" text-gray-800 font-bold py-2 px-4 rounded-full" x-text="nombreFicheroIPR"></span>
                            </div>
                    </div>
                </div>    
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right mb-6">
                    <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                            <span>Guardar Planificación</span>
                        </div>                                                            
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>