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
    <div class="flex mb-4  justify-center"> 
        
            <div class="py-12 w-9/12 items-center">
            
                <div class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg p-8">
                    <div class="block mb-8"><h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                      Activar Usuario
                    </h2>
                </div>
                <form method="POST" action="{{ route('admin.usuarios.activar-usuario.post') }}">
                            @csrf
                            <input type="hidden" name="idUsuario" value="{{$usuario->id}}"/> 
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nombre Fiscal</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="nombrefiscal" :value="old('nombrefiscal')" required autofocus autocomplete="name" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">CIF / NIF</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="cif" :value="old('cif')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Dirección Fiscal</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="direccionfiscal" :value="old('direccionfiscal')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="nombre" :value="old('nombre')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Apellidos</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="apellidos" :value="old('apellidos')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Número de Colegiado</span>
                                <input  disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="numerocolegiado" :value="old('numerocolegiado')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Colegio de Dentistas</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="colegiodentistas" :value="old('colegiodentistas')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Dirección de Envío</span>
                                <input disabled  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="direccionenvio" :value="old('direccionenvio')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Persona de Contacto</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="personacontacto" :value="old('personacontacto')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" type="text" name="telefono" :value="old('telefono')" required />
                            </label>


                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" type="email" name="email" :value="old('email')" required />
                            </label>
                            
                            @if (!$usuario->is_active)
                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-700 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                                {{ __('Activar') }}
                            </button>
                            @endif
                          </form>
                        
                </div>
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