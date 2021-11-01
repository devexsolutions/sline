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
                            @include('admin.trabajos.tabs.vertrabajo') 
                        </div>
                        <div class="md:col-span-8 hidden" id="tab-operaciones">
                            @include('admin.trabajos.tabs.operaciones_tabla') 
                        </div>    
                        <div class="md:col-span-8 hidden" id="tab-historico">
                            @include('admin.trabajos.tabs.historico') 
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

  const items2 = () => {
    return {
      nombreFicheroFactura: "",     
      updatePreview2: function () {
        files = document.getElementById("factura").files;
        if (files.length > 0) this.nombreFicheroFactura = files[0].name;
        else this.nombreFicheroFactura = "";     
      }    
    }
  };

  const items3 = () => {
    return {
      nombreFicheroPresupuesto: "",     
      updatePreview3: function () {
        files = document.getElementById("presupuesto").files;
        if (files.length > 0) this.nombreFicheroPresupuesto = files[0].name;
        else this.nombreFicheroPresupuesto = "";     
      }    
    }
  };
</script>




</x-app-layout>