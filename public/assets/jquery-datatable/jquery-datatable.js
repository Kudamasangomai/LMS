$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});



// $(document).ready(function() {
//         $('.js-exportable').DataTable( {
//             dom: 'Bfrtip',
//             buttons: [
//                 'copy', 'csv', 'excel', 'pdf', 'print'
//             ]
//         } );
//     } );