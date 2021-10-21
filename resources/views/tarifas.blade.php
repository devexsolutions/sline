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


        
        

     
 
    
</x-app-layout>