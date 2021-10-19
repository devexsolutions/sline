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
                <div class="block mb-8"><h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Mis trabajos
            </h2>
            </div>
                <div class="shadow overflow-hidden border-b border-gray-700 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-700">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-300 uppercase tracking-wider">
                            Clinica 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-300 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-300 uppercase tracking-wider">
                            Apellidos
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-300 uppercase tracking-wider">
                            Objetivos
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-300 uppercase tracking-wider">
                            Estado
                        </th>                       
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-300 uppercase tracking-wider">
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
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $estado[$trabajo->estado_cod - 1]["nombre"] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->fecha_solicitud}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button onclick="window.location='{{ route('trabajos.edit', $trabajo->id)}}'" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Editar">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                          </button>
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
