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
    </x-slot>
    <form action="{{ route('externo-guardar-stl') }}" method="POST" enctype="multipart/form-data">
                @csrf

     <div class="px-4 py-3 my-7 bg-gray-50 text-center sm:px-6">   
             <label for="tipo_cod" class="block text-sm font-medium text-gray-700 ">
                    Seleccionar Trabajo:
                </label>
            <select x-cloak id="trabajo" class="p-2 border-2 border-color-gray-300" required name="trabajo">
            <option value="0">------------------------------</option>                                             
                @foreach($trabajos as $trabajo)
                    <option value="{{$trabajo->id}}">{{$trabajo->numero_expediente}}&nbsp;-&nbsp;{{$trabajo->nombre_paciente}}&nbsp;{{$trabajo->apellidos_paciente}}</option>
                @endforeach  
            </select>
     </div>  
      
      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <div class="container px-5  mx-auto">
               
                <div class="flex flex-wrap -m-4">
               
                <div class="lg:w-1/3 p-4 w-1/3">        
                <div class="border border-dashed border-gray-500 relative w-full	" >
                        <input type="file" disabled name="superiorStl" id="superiorStl" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>                        
                   </div>    
                  <div class="mt-4 h-6"> 
                           <div style="display: none" class="progress mt-3 shadow w-full bg-grey-light" style="height: 25px">
                              <div class="progress-bar progress-bar-striped progress-bar-animated shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                            </div> 
                      <h2 class="text-gray-900 title-font text-center text-lg font-medium">SUPERIOR STL</h2>
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file" disabled  name="inferiorStl" id="inferiorStl" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4 h-6"> 
                          <div style="display: none" class="progress1 mt-3 shadow w-full bg-grey-light" style="height: 25px">
                              <div class="progress-bar1 progress-bar-striped progress-bar-animated shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                            </div>        
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">INFERIOR STL</h2>          
                  </div>
                </div>
                <div class="lg:w-1/3 p-4 w-1/3">
                <div class="border border-dashed border-gray-500 relative w-full	">
                        <input type="file" disabled name="oclusionStl" id="oclusionStl" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                        <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                            <h4>
                                Arrastre o haga clic para seleccionar el fichero
                                <br/>
                            </h4>
                            <p class="">Seleccionar Fichero</p>
                        </div>
                   </div>
                  <div class="mt-4 h-6">
                         <div style="display: none" class="progress2 mt-3 shadow w-full bg-grey-light" style="height: 25px">
                              <div class="progress-bar2 progress-bar-striped progress-bar-animated shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                            </div>          
                    <h2 class="text-gray-900 title-font text-center text-lg font-medium">OCLUSIÓN STL</h2>          
                  </div>
                </div>     
          </div>
      </div>  
</div>  <br /><br />
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:text-right">
            <button type="submit" class="flex float-right	items-right justify-between p-4 mb-8 text-sm font-semibold bg-yellow-300 bg-gray-700 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Guardar</span>
                  </div>
                  <span>&nbsp;&nbsp; →</span>
            </button>
        </div>
        <br /><br />
    

</form>
   
<script>
   
  let trabajo = $('#$trabajo');


  let superiorStl = $('#superiorStl');
  let inferiorStl = $('#inferiorStl');
  let oclusionStl = $('#oclusionStl');

  let resumable = new Resumable({
        target: '{{ route('trabajos.adjuntar-stl.post') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['stl'],
        chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(superiorStl[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
      //  $('#videoPreview').attr('src', response.path);
      //  $('.card-footer').show();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });

    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }


    let resumable1 = new Resumable({
        target: '{{ route('trabajos.adjuntar-stl.post') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['stl'],
        chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable1.assignBrowse(inferiorStl[0]);

    resumable1.on('fileAdded', function (file) { // trigger when file picked
        showProgress1();
        resumable1.upload() // to actually start uploading.
    });

    resumable1.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress1(Math.floor(file.progress() * 100));
    });

    resumable1.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
      //  $('#videoPreview').attr('src', response.path);
      //  $('.card-footer').show();
    });

    resumable1.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });

    let progress1 = $('.progress1');
    function showProgress1() {
        progress1.find('.progress-bar1').css('width', '0%');
        progress1.find('.progress-bar1').html('0%');
        progress1.find('.progress-bar1').removeClass('bg-success');
        progress1.show();
    }

    function updateProgress1(value) {
        progress1.find('.progress-bar1').css('width', `${value}%`)
        progress1.find('.progress-bar1').html(`${value}%`)
    }

    function hideProgress1() {
        progress1.hide();
    }

    let resumable2 = new Resumable({
        target: '{{ route('trabajos.adjuntar-stl.post') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['stl'],
        chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable2.assignBrowse(oclusionStl[0]);

    resumable2.on('fileAdded', function (file) { // trigger when file picked
        showProgress2();
        resumable2.upload() // to actually start uploading.
    });

    resumable2.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress2(Math.floor(file.progress() * 100));
    });

    resumable2.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
      //  $('#videoPreview').attr('src', response.path);
      //  $('.card-footer').show();
    });

    resumable2.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });

    let progress2 = $('.progress2');
    function showProgress2() {
        progress2.find('.progress-bar2').css('width', '0%');
        progress2.find('.progress-bar2').html('0%');
        progress2.find('.progress-bar2').removeClass('bg-success');
        progress2.show();
    }

    function updateProgress2(value) {
        progress2.find('.progress-bar2').css('width', `${value}%`)
        progress2.find('.progress-bar2').html(`${value}%`)
    }

    function hideProgress2() {
        progress2.hide();
    }



</script>
</x-app-layout>