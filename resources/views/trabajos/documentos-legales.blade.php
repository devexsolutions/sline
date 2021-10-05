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
    <form action="{{ route('trabajos.documentos-legales.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:col-span-12">
            <div class="mx-12 space-y-12 lg:space-y-0 lg:flex lg:gap-4 lg:items-center lg:justify-center">
            
            <div class="px-4 py-3 my-7  bg-gray-50 text-right sm:px-6">
          <div class="container px-5 py-14 mx-auto">
                <div class="flex flex-wrap -m-4">
                  <div class="lg:w-1/2 p-4 w-1/2">        
                    <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Selecionar fichero</span>
                        <input type='file' name="prescripcion" id="prescripcion" class="hidden" />
                    </label>       
                    <div class="mt-4">  
                        <h2 class="text-gray-900 title-font text-center text-lg font-medium">Prescripción Médica</h2>
                    </div>
                  </div>
                <div class="lg:w-1/2 p-4 w-1/2">        
                    <label class="w-100 flex flex-col items-center px-4 py-6 bg-yellow-500 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Selecionar fichero</span>
                        <input type='file' name="advertencias" id="advertencias" class="hidden" />
                    </label>       
                    <div class="mt-4">  
                        <h2 class="text-gray-900 title-font text-center text-lg font-medium">Advertencia Legal</h2>
                    </div>
                  </div>
                              
          </div>
      </div> 
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
            <button type="submit" class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">Continuar &#10148;</button>
        </div>
    </div>

</form>
   
    
</x-app-layout>