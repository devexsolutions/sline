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
            Nuevo Trabajo  &#10148;  Seleccionar Tarifa &#10148; Datos Paciente &#10148; Documentos Legales
        </h2>
    </x-slot>
    <form action="{{ route('trabajos.adjuntar-imagenes.post') }}" method="POST" enctype="multipart/form-data">
                @csrf

     <div class="px-4 py-3 my-7 bg-gray-50 text-right sm:px-6">
          <div class="container px-5  mx-auto">
  
          @include('wizard.step4')

                <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 p-4 w-1/2">        
                    <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="oclusion" id="oclusion" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>                           
                         </div>
                   </div>       
                  <div class="mt-4">  
                      <h2 class="text-gray-900 title-font text-lg text-center font-medium">OCLUSIÓN</h2>
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                  <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="lateralIzquierdo" id="lateralIzquierdo" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg  text-center font-medium">LATERAL IZQUIERDO</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                    <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="lateralDerecho" id="lateralDerecho" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">LATERAL DERECHO</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="arcoSuperior" id="arcoSuperior" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">         
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">ARCO SUPERIOR</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2  my-6">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="arcoInferior" id="arcoInferior" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">ARCO INFERIOR</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2 my-6">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="sonrisa" id="sonrisa" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                    <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">SONRISA</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2 my-6">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="reposo" id="reposo" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-lg text-center font-medium">REPOSO</h2>          
                  </div>
                </div>
                <div class="lg:w-1/4 p-4 w-1/2 my-6">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="perfilReposo" id="perdilReposo" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
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
                  <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="rxPanoramica" id="rxPanoramica" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>       
                    <div class="mt-4">  
                        <h2 class="text-gray-900 title-font text-center text-lg font-medium">RX PANORÁMICA</h2>
                    </div>
                  </div>
                <div class="lg:w-1/2 p-4 w-1/2">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  required name="otro" id="otro" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
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
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"   name="superiorStl" id="superiorStl" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>    
                  <div class="mt-4">  
                      <h2 class="text-gray-900 title-font text-center text-lg font-medium">SUPERIOR STL</h2>
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"   name="inferiorStl" id="inferiorStl" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">INFERIOR STL</h2>          
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file"  name="oclusionStl" id="oclusionStl" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">OCLUSIÓN STL</h2>          
                  </div>
                </div>     
          </div>
      </div>  
</div>  <br /><br />
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
            <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Guardar</span>
                  </div>
                  <span>&nbsp;&nbsp; →</span>
            </button>
        </div>
        <br /><br />
    

</form>
   
    
</x-app-layout>