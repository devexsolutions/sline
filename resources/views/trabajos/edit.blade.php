<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitar Trabajo') }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('trabajos.update', $trabajo->id) }}">
        @csrf
        @method('PUT')
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
                <div class="h-20 bg-red-400 flex items-center justify-between sm:rounded-t-lg  sm:overflow-hidden">
                  <p class="mr-0 text-white text-lg pl-5">ORDEN DE TRABAJO</p>
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
                                                      <input type="text" name="nombre_paciente" id="nombre_paciente" value="{{ old('nombre_paciente', $trabajo->nombre_paciente) }}"  class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                  </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                              <label for="apellidos_paciente" class="block text-sm font-medium text-gray-700">
                                              Apellidos
                                              </label>
                                              <div class="mt-1 flex rounded-md shadow-sm">                  
                                                <input type="text" name="apellidos_paciente" id="apellidos_paciente" value="{{ old('apellidos_paciente', $trabajo->apellidos_paciente) }}" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
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
                                                      <input type="text" name="edad" id="edad" value="{{ old('edad', $trabajo->edad) }}" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
                                                  </div>   
                                          </div>
                                          <div class="lg:w-1/2 w-1/2">
                                              <label for="nombre_clinica" class="block text-sm font-medium text-gray-700">
                                                Cl&iacute;nica
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">                  
                                                <input type="text" name="nombre_clinica" id="nombre_clinica" value="{{ old('nombre_clinica', $trabajo->nombre_clinica) }}" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
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
                                            <input type="text" name="nombre_doctor" id="nombre_doctor" value="{{ old('nombre_doctor', $trabajo->nombre_doctor) }}" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border border-gray-300" >
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
                                <textarea id="objetivos" name="objetivos" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" >{{ old('objetivos', $trabajo->objetivos) }}</textarea>
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
                    @if (sizeof($trabajo->fotos) > 0)
                        @foreach($trabajo->fotos as $foto)
                        <div class="lg:w-1/4 p-4 w-1/2"> 
                            @if (in_array($foto->nombre, $nombrefotos))                              
                                <img class="w-full rounded-lg" src="/fotos-trabajos/{{$trabajo->id}}/{{$foto->nombre_archivo}}" />
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
      <div class="px-4 py-3 my-7  bg-gray-50 text-right sm:px-6">
          <div class="container px-5 py-14 mx-auto">
                <div class="flex flex-wrap -m-4">
                  <div class="lg:w-1/2 p-4 w-1/2">        
                    <img src="" />             
                    <div class="mt-4">  
                        <h2 class="text-gray-900 title-font text-center text-lg font-medium">RX PANORÁMICA</h2>
                    </div>
                  </div>
                <div class="lg:w-1/2 p-4 w-1/2">
                    <img src="" />       
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
                   <img src="" />            
                  <div class="mt-4">  
                      <h2 class="text-gray-900 title-font text-center text-lg font-medium">SUPERIOR STL</h2>
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                    <img src="" />       
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">INFERIOR STL</h2>          
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                    <img src="" />       
                  <div class="mt-4">          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">OCLUSIÓN STL</h2>          
                  </div>
                </div>     
          </div>
      </div>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Solicitar
                </button>
            </div>
      </div>       
</div>   
<div class="px-4 py-3 my-7 bg-gray-50 text-right sm:px-6">
  <div class="container px-5 py-14 mx-auto">           
        <div class="flex flex-wrap -m-4">                 
                <div class="lg:w-1/4 p-4 w-1/2">
                    <div class="mt-4">  
                        <h2 class="text-gray-900 title-font text-lg text-center font-medium">Setup</h2>
                    </div>
                </div>                     
         </div>
</div> 
</form> 
    
</x-app-layout>