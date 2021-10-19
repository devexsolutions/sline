<style>

.radio input ~ label {
  background-color: rgb(233, 225, 225);
  color: rgb(158, 146, 146);
}
.radio input:checked ~ label {
  background-color: rgb(70, 230, 22);
  color: white;
}

#uploadFile {
  opacity: 0;
  width: 0;
  float: left; /* Reposition so the validation message shows over the label */
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
          <div class="container px-5  mx-auto">
                @include('wizard.step3')
                <div class="flex flex-wrap -m-4">
                             
                    <h1>Prescipción Médica</h1>
                    <div class="border border-dashed border-gray-500 relative w-full	">
                          <input type="file"  required name="advertencias" id="advertencias" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                          <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                              <h4>
                                  Arrastre o haga clic para seleccionar el fichero
                                  <br/>
                              </h4>
                              <p class="">Seleccionar Fichero</p>
                              <img aria-hidden="true" class="h-14 m-auto dark:hidden" src="{{ asset('img/pdf.png') }}" alt="Office" />
                          </div>
                    </div>
                  
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                     
                     <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                           <h1>Aviso de Privacidad</h1>
                          <div class="border  border-dashed border-gray-500 relative w-full	">
                                <input type="file" required  name="advertencias" id="advertencias" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                                <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto justify-items-center">
                                    <h4>
                                        Arrastre o haga clic para seleccionar el fichero
                                        <br/>
                                    </h4>
                                    <p class="">Seleccionar Fichero</p>
                                    <img aria-hidden="true" class="h-14 m-auto dark:hidden" src="{{ asset('img/pdf.png') }}" alt="Office" />
                                </div>
                          </div>
                      </div>
                       <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                          <h1>Autorización del Doctor </h1>
                          <div class="border  border-dashed border-gray-500 relative w-full	">
                                <input type="file" required  name="advertencias" id="advertencias" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                                <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto justify-items-center">
                                    <h4>
                                        Arrastre o haga clic para seleccionar el fichero
                                        <br/>
                                    </h4>
                                    <p class="">Seleccionar Fichero</p>
                                    <img aria-hidden="true" class="h-14 m-auto dark:hidden" src="{{ asset('img/pdf.png') }}" alt="Office" />
                               </div>
                          </div>
                      </div>                 
                    </div>
       
        </div>        
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
    <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Subir Fotografías</span>
                  </div>
                  <span>&nbsp;&nbsp; →</span>
            </button>
        </div>

</form>
   
    
</x-app-layout>