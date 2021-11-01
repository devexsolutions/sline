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
                            {{$historia->nombre_fiscal}}
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