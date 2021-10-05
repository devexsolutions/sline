<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Trabajos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="block mb-8">
                <a href="{{ route('trabajos.selecciona-tarifa') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Solicitar Trabajo</a>
            </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Clinica 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Apellidos
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Objetivos
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>                       
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($trabajos as $trabajo)    
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->nombre_clinica}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->nombre_paciente}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->apellidos_paciente}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->objetivos}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               Solicitado
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->fecha_solicitud}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="{{ route('trabajos.edit', $trabajo->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>                        
                        </tr>
                        @endforeach
                    
                        <!-- More people... -->
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</x-app-layout>
