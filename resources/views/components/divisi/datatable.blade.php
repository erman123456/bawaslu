<script>
    $('#lembagaData').DataTable({
        ajax: 'lembagaData',
        columns: [
            { data: 'created_at', name: 'created_at', orderable:true, searchable: true },
            { data: 'nama_lembaga', name: 'nama_lembaga', orderable:true, searchable: true },
            { data: 'nama_lembaga', name: 'nama_lembaga'},
        ],
        language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
        destroy: true,
        },



        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        columnDefs:[
            {
                "targets" : 1,
                "className": "text-left"
            }
        ],
        aaSorting: [[0, 'desc']],
        "bDestroy": true,
        "processing": true,
        "serverSide": true,
    }).fnDestroy();
</script>
