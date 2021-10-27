<x-app-layout title="Dashboard">
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="block mb-8"><h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                @if (\Auth::user()->is_admin == true) 
                    Trabajos
                @else 
                    Mis trabajos
                @endif
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
                                <p class="px-2 py-1 font-semibold text-center leading-tight overflow-ellipsis overflow-hidden text-white bg-{{ $colores[$trabajo->estado_cod -1] }} rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $estado[$trabajo->estado_cod - 1]["nombre"] }}   
                                </p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$trabajo->fecha_solicitud}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if (\Auth::user()->is_admin == true) 
                            <button onclick="window.location='{{ route('admin.trabajos.view', $trabajo->id)}}'" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            @else 
                            <button onclick="window.location='{{ route('trabajos.view', $trabajo->id)}}'" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            @endif
                            
                           
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