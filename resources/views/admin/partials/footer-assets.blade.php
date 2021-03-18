   <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <script src="{{ asset('vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{ asset('vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>

    <script src="{{ asset('vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('libs/js/main-js.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <!-- date picker jquery -->
    <script src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('admin-elite/assets/node_modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin-elite/assets/node_modules/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

   $(function() {
        $(".add_datepicker").datepicker({
            format: 'dd-mm-yyyy',
            changeMonth: true,
            changeYear: true

        }).datepicker('setDate', 'today');

        var date = new Date();
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        // var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

        $("#from_date_null").datepicker({
            format: 'dd-mm-yyyy',
            changeMonth: true,
            changeYear: true,
        });

        $("#from_date").datepicker({
            format: 'dd-mm-yyyy',
            changeMonth: true,
            changeYear: true,
            orientation: "bottom"
        });

        $("#from_date").datepicker("setDate", firstDay);

        $("#to_date").datepicker({
            format: 'dd-mm-yyyy',
            changeMonth: true,
            changeYear: true,
            orientation: "bottom"
        });
        
        $("#to_date").datepicker("setDate", 'today');

        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            changeMonth: true,
            changeYear: true,

        });
    });
    </script>
    
   