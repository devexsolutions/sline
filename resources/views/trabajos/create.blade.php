<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitar Trabajo') }}
        </h2>
    </x-slot>
    <form action="{{ route('trabajos.store') }}" method="POST" enctype="multipart/form-data">
   
    @csrf
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:col-span-12">
                <div class="h-20 bg-yellow-500 flex items-center justify-between sm:rounded-t-lg  sm:overflow-hidden">
                  <p class="mr-0 text-gray-900 ay-800 text-lg pl-5">ORDEN DE TRABAJO</p>
                </div>    
                    <div class="mt-12 md:mt-0 md:col-span-2"> 
                        
                        <div class="shadow ">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="container px-5 py-7 mx-auto">
                                <div class="flex flex-wrap -m-4"> 
                                          <div class="lg:w-1/2  w-1/2">                              
                                                  <label for="nombre_paciente" class="block text-sm font-medium text-gray-700">
                                                      Nombre
                                                  </label>
                                                  <div class="mt-1 flex rounded-md shadow-sm">                  
                                                      <input type="text" name="nombre_paciente" id="nombre_paciente" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                  </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                              <label for="apellidos_paciente" class="block text-sm font-medium text-gray-700">
                                              Apellidos
                                              </label>
                                              <div class="mt-1 flex rounded-md shadow-sm">                  
                                                <input type="text" name="apellidos_paciente" id="apellidos_paciente" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
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
                                                      <input type="text" name="edad" id="edad" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                  </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                              <label for="nombre_clinica" class="block text-sm font-medium text-gray-700">
                                                Cl&iacute;nica
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">                  
                                                <input type="text" name="nombre_clinica" id="nombre_clinica" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
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
                                            <input type="text" name="nombre_doctor" id="nombre_doctor" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                            </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                          <label for="tipo" class="block text-sm font-medium text-gray-700">
                                            Tipo
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm border p-2">                  
                                            <select x-cloak id="tipo_cod" name="tipo_cod">
                                                <option value="1">Generalista</option>                    
                                            </select>
                                            </div>
                                          </div> 
                                    </div>
                            </div>
                                                      
                            <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Objetivos
                            </label>
                            <div class="mt-1">
                                <textarea id="objetivos" name="objetivos" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                            </div>
                              <p class="mt-2 text-sm text-gray-500">
                                  
                              </p>                            
                        </div>
                                            
                   
                </div>            
        </div>
    </div>
    
      <div class="px-4 py-3 my-7 bg-gray-50 text-right sm:px-6">
          <div class="container px-5 py-14 mx-auto">
                <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 p-4 w-1/2">        
                  <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="oclusion" id="oclusion" class="hidden" />
                  </label>       
                  <div class="mt-4">  
                      <h2 class="text-gray-900 title-font text-lg text-center font-medium">OCLUSIÓN</h2>
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="lateralIzquierdo" id="lateralIzquierdo"  class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg  text-center font-medium">LATERAL IZQUIERDO</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="lateralDerecho" id="lateralDerecho"  class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">LATERAL DERECHO</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="arcoSuperior" id="arcoSuperior" class="hidden" />
                  </label>
                  <div class="mt-4">         
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">ARCO SUPERIOR</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                  <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="arcoInferior" id="arcoInferior" class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">ARCO INFERIOR</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                  <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="sonrisa" id="sonrisa" class="hidden" />
                  </label>
                    <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">SONRISA</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="reposo" id="reposo" class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">REPOSO</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="perfilReposo" id="perfilReposo" class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">PERFIL REPOSO</h2>          
                  </div>
              </div>
          </div>
      </div>  
</div>  
      <div class="px-4 py-3 my-7  bg-gray-50 text-right sm:px-6">
          <div class="container px-5 py-14 mx-auto">
                <div class="flex flex-wrap -m-4">
                  <div class="lg:w-1/2 p-4 w-1/2">        
                    <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type='file' name="rxPanoramica" id="rxPanoramica" class="hidden" />
                    </label>       
                    <div class="mt-4">  
                        <h2 class="text-gray-900 title-font text-center text-lg font-medium">RX PANORÁMICA</h2>
                    </div>
                  </div>
                <div class="lg:w-1/2 p-4 w-1/2">
                    <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type='file' name="otro" id="otro"  class="hidden" />
                    </label>
                    <div class="mt-4">          
                      <h2 class="text-gray-900 title-font text-center text-lg font-medium">OTRO</h2>          
                    </div>
                </div>                
          </div>
      </div>
      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <div class="container px-5  mx-auto">
                <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/3 p-4 w-1/3">        
                  <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="superiorStl" id="superiorStl" class="hidden" />
                  </label>       
                  <div class="mt-4">  
                      <h2 class="text-gray-900 title-font text-center text-lg font-medium">SUPERIOR STL</h2>
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="inferiorStl" id="inferiorStl" class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">INFERIOR STL</h2>          
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Select a file</span>
                      <input type='file' name="oclusionStl" id="oclusionStl" class="hidden" />
                  </label>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">OCLUSIÓN STL</h2>          
                  </div>
                </div>     
          </div>
      </div>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-900 bg-yellow-500 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Solicitar
                </button>
            </div>
</div>
</div>   
</form> 
    
</x-app-layout>