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
            {{ __('Nuevo Trabajo -> Seleccionar Tarifa') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            @foreach($tarifas as $tarifa)                      
                {!! $tarifa->descripcion !!}
            @endforeach
    
        </div>


        
        <div class="pricing-plan border-t-4 border-solid border-white bg-white text-center max-w-lg	 mx-auto hover:border-indigo-600 transition-colors duration-300">
                <div class="p-6 md:py-8">
                    <h4 class="font-medium leading-tight text-2xl mb-2">Plan 48</h4>
                    <p class="text-gray-600">48 Alineadores</p>
                </div>
                <div class="pricing-amount bg-indigo-100 p-6 transition-colors duration-300">
                    <div class=""><span class="text-4xl font-semibold">1.300€</span></div>
                </div>
                <div class="p-6 text-left">
                    <ul class="leading-loose list-disc">                    
                    <li>*Alineadores Adicionales a 20€ / unidad</li>
                    <li>Precio cerrado al paciente desde el primer diágnostico en clínica</li>
                    <li>5 años para completar el tratamiento si finalmente no se consumiensen todos los alineadores contratados en el plan</li>
                    <li>Estudio 150€. Incluido estudio de refinamiento intermedio o final.</li>
                    <li>Estudio de refinamiento adicional 120€</li>
                    <li>Primer envío gratuito. Envío de alineadores adicionales a 6€, excepto Canarias, Ceuta y Melilla.</li>
                    </ul>                    
                </div>
        </div>

     
 
    
</x-app-layout>