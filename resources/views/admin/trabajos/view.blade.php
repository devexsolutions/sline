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
        
            <div class="py-12 w-9/12" id="tabs-id">
            
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-yellow-300 bg-gray-700" onclick="changeAtiveTab(event,'tab-trabajo')">
                            <i class="fas fa-space-shuttle text-base mr-1"></i>  Ver Trabajo
                            </a>
                        </li>
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-gray-700 bg-white" onclick="changeAtiveTab(event,'tab-operaciones')">
                            <i class="fas fa-cog text-base mr-1"></i>  Operaciones Trabajo
                            </a>
                        </li>
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-gray-700 bg-white" onclick="changeAtiveTab(event,'tab-historico')">
                            <i class="fas fa-cog text-base mr-1"></i>  Histórico
                            </a>
                        </li>                        
                    </ul>                    
                    <!-- Columna Trabajo -->
                    <div class="tab-content tab-space">
                        <div class="md:col-span-8 block " id="tab-trabajo">
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
                        </div>
                        <div class="md:col-span-8 hidden" id="tab-operaciones">
                            <div class="mt-12 md:mt-0 ">                                
                                <div class="shadow ">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="container px-5 py-7 mx-auto">
                                            <form action="{{ route('admin.trabajos.guardar-planificacion.post') }}" method="POST" enctype="multipart/form-data">
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
                        </div>    
                        <div class="md:col-span-8 hidden" id="tab-historico">
                            <div class="mt-12 md:mt-0 ">                                
                                    <div class="shadow ">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="container px-5 py-7 mx-auto">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-200">
                                                    <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                        Usuario 
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                        Operación
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                        Fecha
                                                    </th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @forelse ($historico as $historia)    
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{$historia->user_id}}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{$historia->operacion}}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{$historia->created_at}}
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">
                                                        No hay datos en el histórico del trabajo
                                                        </td>
                                                    </tr>   
                                                    @endforelse 
                                                
                                                    <!-- More people... -->
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
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
    
 <script type="text/javascript">
  function changeAtiveTab(event,tabID){
    let element = event.target;
    while(element.nodeName !== "A"){
      element = element.parentNode;
    }
    ulElement = element.parentNode.parentNode;
    aElements = ulElement.querySelectorAll("li > a");
    tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
    for(let i = 0 ; i < aElements.length; i++){
      aElements[i].classList.remove("text-yellow-300");
      aElements[i].classList.remove("bg-gray-700");
      aElements[i].classList.add("text-gray-700");
      aElements[i].classList.add("bg-white");
      tabContents[i].classList.add("hidden");
      tabContents[i].classList.remove("block");
    }
    element.classList.remove("text-gray-700");
    element.classList.remove("bg-white");
    element.classList.add("text-yellow-300");
    element.classList.add("bg-gray-700");
    document.getElementById(tabID).classList.remove("hidden");
    document.getElementById(tabID).classList.add("block");
  }

  const items = () => {
    return {
      nombreFicheroIPR: "",     
      updatePreview: function () {
        files = document.getElementById("ipr").files;
        if (files.length > 0) this.nombreFicheroIPR = files[0].name;
        else this.nombreFicheroIPR = "";     
      }    
    }
  };
</script>




</x-app-layout>