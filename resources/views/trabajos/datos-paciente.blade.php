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
            Nuevo Trabajo  &#10148;  Seleccionar Tarifa &#10148; Datos Paciente
        </h2>
    </x-slot>
 
    <form action="{{ route('trabajos.datos-paciente.post') }}" method="POST" enctype="multipart/form-data">
   
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
                @include('wizard.step2')
                <div class=" bg-yellow-500 flex items-center justify-between sm:rounded-t-lg  sm:overflow-hidden">
                  <p class="mr-0 text-gray-900 ay-800 text-lg pl-5"></p>
                </div>    
                    <div class="mt-12 md:mt-0 md:col-span-2"> 
                        
                        <div class="shadow ">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="container px-5 py-7 mx-auto">
                                <div class="flex flex-wrap -m-4"> 
                                          <div class="lg:w-1/2  w-1/2">                              
                                                  <label for="nombre_paciente" class="block text-sm font-medium text-gray-700 px-6">
                                                      Nombre
                                                  </label>
                                                  <div class="mt-1 flex rounded-md shadow-sm px-6">                  
                                                      <input type="text" required name="nombre_paciente" id="nombre_paciente" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                  </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                              <label for="apellidos_paciente" class="block text-sm font-medium text-gray-700 px-6">
                                              Apellidos
                                              </label>
                                              <div class="mt-1 flex rounded-md shadow-sm px-6">                  
                                                <input type="text" required name="apellidos_paciente" id="apellidos_paciente" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                              </div>
                                          </div> 
                                    </div>
                            </div>
                            <div class="container px-5 py-7 mx-auto">
                                <div class="flex flex-wrap -m-4"> 
                                          <div class="lg:w-1/2  w-1/2">                              
                                                  <label for="edad" class="block text-sm font-medium text-gray-700 px-6">
                                                      Edad
                                                  </label>
                                                  <div class="mt-1 flex rounded-md shadow-sm  px-6">                  
                                                      <input type="text" required name="edad" id="edad" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                  </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                              <label for="nombre_clinica" class="block text-sm font-medium text-gray-700 px-6">
                                                Cl&iacute;nica
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm  px-6">                  
                                                <input type="text" required name="nombre_clinica" id="nombre_clinica" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                </div>
                                          </div> 
                                    </div>
                            </div>
                            <div class="container px-5 py-7 mx-auto">
                                <div class="flex flex-wrap -m-4"> 
                                          <div class="lg:w-1/2  w-1/2">                              
                                          <label for="nombre_doctor" class="block text-sm font-medium text-gray-700 px-6">
                                            Doctor
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm  px-6">                  
                                            <input type="text" required name="nombre_doctor" id="nombre_doctor" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                            </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                          <label for="tipo" class="block text-sm font-medium text-gray-700 px-6">
                                            Tipo
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm  p-2  px-6">                  
                                            <select x-cloak id="tipo_cod" required name="tipo_cod">
                                                <option value="1">Generalista</option>
                                                <option value="2">Ortodoncista</option>                    
                                            </select>
                                            </div>
                                          </div> 
                                    </div>
                            </div>

                            <div class="container px-5 py-7 mx-auto">
                                <div class="flex flex-wrap -m-4"> 
                                          <div class="lg:w-1/2  w-1/2">                              
                                          <label for="numero_expediente" class="block text-sm font-medium text-gray-700 px-6">
                                            Número de Expediente
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm px-6">                  
                                            <input type="text" required name="numero_expediente" id="numero_expediente" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                            </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                            <label for="tipo" class="block text-sm font-medium text-gray-700 px-6">
                                                Número de Colegiado (Doctor)
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm px-6">                  
                                                <input type="text" required name="numero_colegiado" id="numero_colegiado" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                            </div>
                                          </div> 
                                    </div>
                            </div>
                                                      
                            <div>
                            <label for="about" class="block text-sm font-medium text-gray-700  px-6">
                                Objetivos
                            </label>
                            <div class="mt-1  px-6">
                                <textarea id="objetivos" required name="objetivos" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                            </div>
                              <p class="mt-2 text-sm text-gray-500">
                                  
                              </p>                            
                        </div>
                                            
                   
                </div>            
        </div>
        <br /><br />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
              <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Subir Documentación Obligatoria</span>
                  </div>
                  <span>&nbsp;&nbsp; →</span>
            </button>
        </div>
    </div>
</form>
   
    
</x-app-layout>