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
    <form action="{{ route('trabajos.selecciona-tarifa.post') }}" method="POST">
                @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:col-span-12">
            <div class="mx-12 space-y-12 lg:space-y-0 lg:flex lg:gap-4 lg:items-center lg:justify-center">
            <div class="max-w-sm p-8 border-t-4 border-indigo-600 bg-white rounded shadow-lg">
                <h3 class="text-2xl text-center">FLEXIBLE</h3>
                <p class="text-center"><input required type="radio" class="form-radio" name="tarifa" value="flexible" /></p>
                <div>
                    <ul class="space-y-4 list-disc">
                    </ul>
                    <div class="flex items-center justify-center mt-4">
                    <button class="w-full px-2 py-2 text-indigo-200 bg-indigo-600 rounded">+ Info</button>
                    </div>
                </div>
            </div>
            <div class="max-w-sm p-8 border-t-4 border-indigo-600 bg-white rounded shadow-lg">
                <h3 class="text-2xl text-center">TARIFA 18</h3>
                <p class="text-center"><input required type="radio" class="form-radio" name="tarifa" value="18" /></p>
                <div>
                    <ul class="space-y-4 list-disc">
                    </ul>
                    <div class="flex items-center justify-center mt-4">
                    <button class="w-full px-2 py-2 text-indigo-200 bg-indigo-600 rounded">+ Info</button>
                    </div>
                </div>
            </div>
            <div class="max-w-sm p-8 border-t-4 border-indigo-600 bg-white rounded shadow-lg">
                <h3 class="text-2xl text-center">TARIFA 30</h3>
                <p class="text-center"><input required type="radio" class="form-radio" name="tarifa" value="30" /></p>
                <div>
                    <ul class="space-y-4 list-disc">
                    </ul>
                    <div class="flex items-center justify-center mt-4">
                    <button class="w-full px-2 py-2 text-indigo-200 bg-indigo-600 rounded">+ Info</button>
                    </div>
                </div>
            </div>
            <div class="max-w-sm p-8 border-t-4 border-indigo-600 bg-white rounded shadow-lg">
                <h3 class="text-2xl text-center">TARIFA 48</h3>
                <p class="text-center"><input required type="radio" class="form-radio" name="tarifa" value="48" /></p>
                <div>
                    <ul class="space-y-4 list-disc">
                    </ul>
                    <div class="flex items-center justify-center mt-4">
                        <button class="w-full px-2 py-2 text-indigo-200 bg-indigo-600 rounded">+ Info</button>
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