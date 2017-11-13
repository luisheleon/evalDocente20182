<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $("#tableFront").DataTable({

            pageLength: 10,
            responsive: true,
            pagingType: "full_numbers",
            aaSorting: [['1', 'asc']],
            "scrollX": false,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {
                    extend: 'copy',
                    text: '<i data-toggle="tooltip" title="Copiar"  class="glyphicon glyphicon-copy"></i>'
                },
                {
                    extend: 'csv',
                    text: '<i data-toggle="tooltip" title="csv"  class="fa fa-table"></i>',
                    title: 'evalDocente'
                },
                {
                    extend: 'excel',
                    text: '<i data-toggle="tooltip" title="Excel"  class="fa fa-file-excel-o"></i>',
                    title: 'evalDocente'
                },
                {
                    extend: 'pdf',
                    text: '<i data-toggle="tooltip" title="PDF"  class="fa fa-file-pdf-o"></i>',
                    title: 'evalDocente'
                }

            ]

        });
    });
</script>