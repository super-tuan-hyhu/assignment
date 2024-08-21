<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>@yield('title') | Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <style href="../assets/css/custom.css"></style>
    <link rel="stylesheet" href="../assets/css/css.css">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.3/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.3/b-3.1.1/b-html5-3.1.1/b-print-3.1.1/datatables.min.css" rel="stylesheet">
</head>


<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default dark-sidebar">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!-- Page -->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <!--Header-->
            @include('admin.layout.header')
            <!--end::Header-->



            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <!--begin::Sidebar-->
                @include('admin.layout.sidebar')
                <!--end::Sidebar-->


                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!-- main -->
                    @yield('body')
                    <!-- end main -->

                    <!--begin::Footer-->
                    @include('admin.layout.footer')
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->


        </div>
        <!--end::Page-->
    </div>

    <!--begin::Chat drawer-->
    @include('admin.layout.chat')
    <!--end::Chat drawer-->



    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.1.3/datatables.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.3/b-3.1.1/b-html5-3.1.1/b-print-3.1.1/datatables.min.js"></script>


<!-- <script>
    $(document).ready(function(){
        var table = $('#example').DataTable({
            buttons : ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        table.buttons().d-flex().appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script> -->

</body>

</html>