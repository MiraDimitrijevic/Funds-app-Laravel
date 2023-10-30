<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
    <h1>FUND DATA</h1>
    </div>
    <table class="table table-bordered data-table" id="fundsTable1">
        <thead> 
            <tr>
            <th>Name</th>
            <th>Category</th>
            <th>SubCategory</th>
                <th>ISIN</th>
                <th>WKN</th>
                <th>Add to favorites</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div style="margin: 10px;">
<a href="{{ url('/favorites') }}" class="btn btn-xs btn-info pull-right" style="margin-left: 127px;">Your favorite funds</a>

</div>
</x-app-layout>
<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        dom: 'Bfrtip',
      buttons: [
        'pdf','excel'
      ],
        processing: true,
        serverSide: true,
        ajax: "{{ route('userfunds.index') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'categoryName', name: 'categoryName'},
            {data: 'subCategoryName', name: 'subCategoryName'},
            {data: 'ISIN', name: 'ISIN'},
            {data: 'WKN', name: 'WKN'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#fundsTable1').on('click', '.fav' , function(){
     fundID=parseInt(this.id);
    fundData={"fundID":fundID};
    console.log(fundData);
console.log("In the function");
        request = $.ajax({  
        url: "{{ route('favfund.store') }}",  
        type: 'post', 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        data: fundData
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log(textStatus);
        console.log(jqXHR);
      console.log(response);

        if (textStatus === "success") {
            alert("Successfully added to favorites!");
                    }
        else {
       
            console.log("Failed " + response);
        }
   });
      
  });

});
</script>
