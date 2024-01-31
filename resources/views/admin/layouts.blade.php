<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ env('APP_NAME') }} </title>
    <link rel="icon" href="{{ asset('logo/logopama.png') }}" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css?ver=1.1"
        type="text/css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css?ver=1.1" type="text/css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/components.css') }}" type="text/css">


    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:ital,wght@1,500&family=Kanit:wght@500&family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- css datatables --}}
    <!-- Table Style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"> --}}

    {{-- css button datatables  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>
        thead input {
            width: 100%;
        }

        #table-1 {
            width: 100%;
            min-width: 100%;
        }

        #table-1 thead {
            width: 100%;
            min-width: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .select {
            width: 100%;
        }

        .dtr-title {
            text-transform: uppercase;
        }
    </style>

    <!-- Page Specific CSS File -->
    @yield('style')
</head>

<body>
    @yield('modal')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar ">
                <div class="mr-auto ">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars burger-icon-navbar"></i></a></li>
                        <li><a href="/" class="nav-link nav-link-lg ">
                                <div class="judul-navbar active">Pamapersada</div>
                            </a></li>
                    </ul>

                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user text-dark">
                            <div class="d-sm-none d-lg-inline-block">
                                {{-- <div class="font-username"> --}}
                                {{-- Hai, Admin --}}
                                Hello, {{ Auth::user()->name }}
                                {{-- </div> --}}
                            </div>
                            {{-- <i class="fas fa-chevron-down fa-fw fa-sm "></i> --}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt">
                                </i> Logout

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>

            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/" class="text-white">Pamapersada</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/" class="text-white">PMPRSD</a>
                    </div>
                    <ul class="sidebar-menu">
                        @if (Auth::user()->role == 'admin')
                            <li class="menu-header">Employee Accounts</li>
                            <li class="nav-item dropdown {{ Route::is('users.index') ? 'active' : '' }}">
                                <a href="{{ route('/') }}"
                                    class="nav-link has-dropdown {{ Route::is('users.index') ? 'active' : '' }}"><i
                                        class="fas fa-users-cog"></i><span id="hmm">Employee
                                        Accounts</span></a>
                                <ul class="dropdown-menu {{ Route::is('users.index') ? 'active' : '' }}">
                                    <li class="{{ Route::is('users.index') ? 'active' : '' }}">
                                        <a class="nav-link"
                                            href="
                                    {{ route('users.index') }}
                                    "><i
                                                class="fas fa-users"></i> <span>
                                                User Accounts</span></a>
                                    </li>
                                    <li class="{{ Route::is('show.admin') ? 'active' : '' }}">
                                        <a class="nav-link"
                                            href="
                                    {{ route('show.admin') }}
                                    "><i
                                                class="fas fa-user-cog"></i> <span>
                                                Admin Profile</span></a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="menu-header">VDC Catalog</li>
                        <li class="nav-item dropdown {{ Route::is('vdc_master.index') ? 'active' : '' }}">
                            <a href="{{ route('/') }}"
                                class="nav-link has-dropdown {{ Route::is('vdc_master.index') ? 'active' : '' }}"><i
                                    class="fas fa-table"></i><span id="hmm">VDC Catalog</span></a>
                            <ul class="dropdown-menu {{ Route::is('vdc_master.index') ? 'active' : '' }}">
                                <li class="{{ Route::is('vdc_master.index') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="
                                {{ route('vdc_master.index') }}
                                "><i
                                            class="fas fa-layer-group"></i> <span>
                                            Show List</span></a>
                                </li>
                                <li class="{{ Route::is('vdc_master.create') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="
                                {{ route('vdc_master.create') }}
                                "><i
                                            class="fas fa-plus-square"></i> <span>
                                            Add New List</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header">Units</li>
                        <li class="{{ Route::is('units.index') ? 'active' : '' }}"><a class="nav-link"
                                href="
                                                        {{ route('units.index') }}
                                                        "><i
                                    class="fas fa-sitemap"></i><span>
                                    Units</span></a></li>
                        <li class="menu-header">VDC Maintenance</li>
                        <li class="nav-item dropdown ">
                            <a href="{{ route('vdc_claim.index') }}" class="nav-link has-dropdown"><i
                                    class="fas fa-chalkboard-teacher"></i><span id="hmm">VDC
                                    Claim</span></a>
                            <ul class="dropdown-menu {{ Route::is('vdc_claim.index') ? 'active' : '' }}">
                                <li class="{{ Route::is('vdc_claim.index') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="
                                        {{ route('vdc_claim.index') }}
                                        "><i
                                            class="fas fa-layer-group"></i> <span>
                                            Show List</span></a>
                                </li>
                                <li class="{{ Route::is('vdc_claim.create') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="
                                        {{ route('vdc_claim.create') }}
                                        "><i
                                            class="fas fa-plus-square"></i> <span>
                                            Add New List</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

                    </div>

                </aside>
            </div>
        </div>

        <div class="main-content" style="min-height= 698px;">
            {{-- <section class="section" style="min-height: 616px;"> --}}
            @include('sweetalert::alert')
            @yield('content')
            {{-- </section> --}}
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://pamapersada.com/#"><text>Pamapersada
                    </text></a> All rights reserved.
            </div>

        </footer>
    </div>

</body>

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!-- sweetalert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template JS File -->
<script src="{{ asset('js/stisla.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

{{-- js datatables --}}
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
{{-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script> --}}

{{-- js buttons datatables --}}
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    var table, jsonTables;
    // {{-- function load datatables  --}}
    function loadAjaxDataTables(params) {

        // Setup - add a text input to each header cell
        $(params.idTable + ' thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo(params.idTable + ' thead');

        table = $(params.idTable).DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            // responsive: true,
            dom: 'lBfrtip',
            buttons: [
            // {
            //     extend: 'print',
            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            ///////////////
            // {
            //     extend: 'excelHtml5',
            //     text: 'Export Excel',
            //     titleAttr: 'Export to Excel',
            //     title: 'Data VDC',
            //     autoFilter: true,
            //     footer: true,
            //     stripHtml: false,
            //     decodeEntities: true,
            //     sheetName: 'Exported data',
            //     exportOptions: {
            //         columns: ':not(:last-child)',
            //         format: {
            //             body: function(data, row, column, node) {

            //                 return column === 9 ? "hzzz" : data;
            //             },
            //             body: function(data, row, column, node) {
            //                 console.log(data);
            //                 return column === 1 ? "hzzz" : data;
            //             }

            //         }
            //     },
            // customize: function(xlsx) {
            //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
            //     console.log(sheet)
            //     // Loop over the cells in column `C`
            //     $('row c[r^="Q"]', sheet).each(function() {
            //         // Get the value
            //         var cellValue = $(this).find('is t').text();

            //         // Modify the value as needed, for example, set it to 'hahaahhaaha'
            //         $(this).find('is t').text('hahaahhaaha');
            //         // return $(this).text()
            //         // if ($('is t', this).text() == 'New York') {
            //         //     $(this).attr('s', '20');
            //         // }
            //     });
            //     $('row c[r^="B"]', sheet).each(function() {
            //         // Get the value
            //         if ($('is t', this).text() == 'OPEN') {
            //             $(this).attr('s', '20');
            //         }
            //     });

            // },

                // },
                'colvis'
            ],
            processing: true,
            // scrollX: true,
            // pagingType: 'numbers',
            // serverSide: true,
            /// ---- handle filter each column function  -----
            initComplete: function() {
                var api = this.api();
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html(
                            '<input type="text" class="text-center text-wrap" style="text-transform: uppercase;" placeholder="' +
                            title + '" />'
                            // '<textarea class="text-center form-control text-wrap" style="text-transform: uppercase;" placeholder="' + title + '"></textarea>'
//                             `
//                         <div class="form-group">
//   <div class="form-control text-center text-wrap" contenteditable="true" style="text-transform: uppercase;">
//     ${title}
//   </div>
// </div>

//                         `
                        );

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                    '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
            ajax: params.urlAjax,
            columns: params.columns,
            columnDefs: params.defColumn,
        });

    }

    // console.log(table);
    // ajax store data
    function ajaxSaveDatas(params) {
        $.ajax({
            url: params.url,
            method: params.method,
            async: true,
            // dataType: 'json',
            data: params.input,
            beforeSend: function(xhr) {
                Swal.fire({
                    title: 'Saving Data...',
                    html: 'Please Wait!',
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })
            },
            success: function(data) {
                if (params.reload == null || params.reload == false) {
                    if (table != null)
                        table.ajax.reload();

                }

                Swal.close()
                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    icon: 'success',
                    title: 'Yayy!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                })
                params.forms
                params.modal
                if (params.reload != null && params.reload == true) {
                    location.reload()
                }

                if (params.redirect != null) {
                    window.location.href = params.redirect
                }

            },
            error: function(xhr, status, error) {
                Swal.close()
                var message;
                var validationErrors = xhr.responseJSON.errors
                for (var fieldName in validationErrors) {
                    if (validationErrors.hasOwnProperty(fieldName)) {
                        var errorMessages = validationErrors[fieldName];

                        // Handle each error message for the current field
                        console.log('Validation Errors for ' + fieldName + ':', errorMessages);
                        message = errorMessages
                    }
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There is something wrong while saving data. Try again! ' + (xhr
                        .responseJSON &&
                        xhr.responseJSON.contents ? xhr.responseJSON.contents : message ?
                        message : ""),

                })

                // console.log("xhr only: " + xhr.responseJSON.errors)
                console.log("statusText: " + xhr.statusText)
                console.log("responseTxt: " + xhr.responseText.message)
                console.log("responseJSON: " + xhr.responseJSON.contents)
                console.log("without xhr: " + responseJSON.contents)
            }
        });
    }

    function deleteConfirm(event, params = null, isTable = true) {
        Swal.fire({
            title: 'Delete Confrimation!',
            text: 'Are you sure want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            confirmButtonColor: 'red'
        }).then(dialog => {
            var method = 'GET',
                valueHeaders = '';
            if (params != null) {
                method = params;
                valueHeaders = {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                };
            }
            if (dialog.isConfirmed) {
                // window.location.assign(event.dataset.deleteUrl);
                $.ajax({
                    headers: valueHeaders,
                    url: event.dataset.deleteUrl,
                    type: method,
                    dataType: "JSON",
                    error: function(xhr) {
                        var message;
                        var validationErrors = xhr.responseJSON.errors
                        for (var fieldName in validationErrors) {
                            if (validationErrors.hasOwnProperty(fieldName)) {
                                var errorMessages = validationErrors[fieldName];

                                // Handle each error message for the current field
                                console.log('Validation Errors for ' + fieldName + ':',
                                    errorMessages);
                                message = errorMessages
                            }
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'There is something wrong while deleting data. Try again! ' +
                                (xhr.responseJSON &&
                                    xhr.statusText ? xhr.statusText :
                                    message ?
                                    message : ""),
                        })
                        console.log("statustext: " + xhr.statusText + "responsetxt: " + xhr
                            .responseText)
                    },
                    success: function(data) {
                        if (isTable) {
                            table.ajax.reload()
                        } else {
                            $(event).closest(".form-row").remove();
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    }
                });
            }
        })
    }
</script>
<!-- Page Specific JS File -->
@yield('script')

</html>
