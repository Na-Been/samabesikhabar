@extends('backend.layouts.app')
@section('title','News List')
@section('content')
    <link href=
          'https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css'
          rel='stylesheet'>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://unpkg.com/nepali-date-picker@2.0.1/dist/nepaliDatePicker.min.css"
          crossorigin="anonymous"/>--}}

    <style type="text/css">
        .ribbon {
            background-color: #a00;
            overflow: hidden;
            white-space: nowrap;
            /* top left corner */
            position: absolute;
            left: -40px;
            top: -15px;
            /* for 45 deg rotation */
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            /* for creating shadow */
            -webkit-box-shadow: 0 0 10px #888;
            -moz-box-shadow: 0 0 10px #888;
            box-shadow: 0 0 10px #888;
            z-index: 10;
        }

        .ribbon a {
            border: 1px solid #faa;
            color: #fff;
            display: block;
            font-size: 8px;
            margin: 1px 0;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            /* for creating shadow */
            text-shadow: 0 0 5px #444;
        }

        .odd td {
            background: #F1F5F8 !important;
            border-radius: none !important;
        }


        .ui-datepicker-calendar {
            display: none !important;
        }

        .ui-datepicker-div {
            z-index: 50 !important;
        }

        .ui-datepicker {
            z-index: 50 !important;
        }

        .table-report:not(.table-report--bordered):not(.table-report--tabulator) td {
            box-shadow: none !important;

        }
    </style>
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8 ">

            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add News</a>
            </div>
        </div>
        <div class="intro-y flex flex-col sm:flex-row items-center mb-2 ">
            <div>
                <input type="hidden" name="currentValue" id="currentVal" value="all">
                <span><a href="#all"><span id="all">All News</span> ( {{$countNews}})</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                <span><a href="#mine"><span id="mine">Mine</span> ( {{$userNews}})</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                <span><a href="#published"><span id="published">Published</span> ( {{$active}})</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                <span><a href="#unpublished"><span id="unpublished">Draft </span>( {{$inactive}})</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                <span><a href="#trash"><span id="trash">Trash </span>({{$delete}})</a></span>
            </div>
        </div>
        <div class="intro-y flex flex-col sm:flex-row  mb-3 ">
            <div class="dataTables_length mr-5" id="DataTables_Table_0_length">
                <select name="bulk_delete" id="bulkDelete" aria-controls="DataTables_Table_0"
                        class="">
                    <option selected disabled>--Bulk Action--</option>
                    <option>Bulk Delete</option>
                </select>

            </div>
            <div class=" dataTables_filter mr-5" id="DataTables_Table_0_length">
                <input type="text" id="date" value="{{old('search_input_date')}}" placeholder="Date"
                       name="search_input_date" class="form-control nepali_datepicker" autocomplete="off">

            </div>
            <div class="dataTables_length" id="DataTables_Table_0_length">
                <select name="category_search" id="searchByCategory" aria-controls="DataTables_Table_0"
                        class="search_category">
                    <option>--All Category--</option>
                    @forelse($newsCats as $cat)
                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible" style="overflow-x: scroll">
                <table class="table table-report -mt-2 data-table"
                       style="width:100%;background:#fff;border:1px solid #ccc">
                    <thead style="background:#fff;">
                    <tr>
                        <th><input type="checkbox" class="select_all" id="selectAll" data-group=".checkValue"></th>
                        <th>Image</th>
                        <th class="whitespace-no-wrap">Author Name</th>
                        <th class="text-center whitespace-no-wrap">News Title</th>
                        <th class="text-center whitespace-no-wrap">Category</th>
                        <th class="text-center whitespace-no-wrap">No Of Views</th>
                        <th class="text-center whitespace-no-wrap">Posted On</th>
                        <th class="text-center whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="example_news">
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
    </div>
@endsection
@section('js')
    @include('backend.layouts.flashMessage')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script>
        $(function () {
            $("#date").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function (dateText, inst) {
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                    table.draw();
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('news.index') }}",

                    data: function (d) {
                        d.search_input_date = $('#date').val();
                        d.category_search = $('#searchByCategory').val();
                        d.search = $('.dataTables_filter input[type="search"]').val();
                        d.currentValue = $('#currentVal').val();
                    },
                },
                columns: [
                    {data: 'check', name: 'check', orderable: false, searchable: false},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'posted_by', name: 'posted_by'},
                    {data: 'title', name: 'title'},
                    {data: 'category', name: 'category'},
                    {data: 'share', name: 'share'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]
            });
            $("#searchByCategory").on('change', function () {
                table.draw();
            });
            $("#mine").on('click', function () {
                $('#currentVal').val('mine');
                $(this).addClass('text-theme-3')
                $('#published').removeClass('text-theme-3')
                $('#unpublished').removeClass('text-theme-3')
                $('#trash').removeClass('text-theme-3')
                $('#all').removeClass('text-theme-3')
                table.draw();
            });
            $("#published").on('click', function () {
                $('#currentVal').val('published');
                $(this).addClass('text-theme-3')
                $('#mine').removeClass('text-theme-3')
                $('#unpublished').removeClass('text-theme-3')
                $('#trash').removeClass('text-theme-3')
                $('#all').removeClass('text-theme-3')
                table.draw();
            });
            $("#unpublished").on('click', function () {
                $('#currentVal').val('unpublished');
                $(this).addClass('text-theme-3')
                $('#published').removeClass('text-theme-3')
                $('#mine').removeClass('text-theme-3')
                $('#trash').removeClass('text-theme-3')
                $('#all').removeClass('text-theme-3')
                table.draw();
            });
            $("#trash").on('click', function () {
                $('#currentVal').val('trash');
                $(this).addClass('text-theme-3')
                $('#published').removeClass('text-theme-3')
                $('#unpublished').removeClass('text-theme-3')
                $('#mine').removeClass('text-theme-3')
                $('#all').removeClass('text-theme-3')
                table.draw();
            });
            $('#all').on('click', function () {
                $('#currentVal').val('allData');
                $(this).addClass('text-theme-3')
                $('#published').removeClass('text-theme-')
                $('#unpublished').removeClass('text-theme-3')
                $('#trash').removeClass('text-theme-3')
                $('#mine').removeClass('text-theme-3')
                table.draw();
            })
        });

    </script>

    <script>
        function active(newsId) {
            var id = newsId.value;
            $.ajax({
                type: "GET",
                url: "news/changeStatus/" + id,
                success: function () {
                    window.location = "{{route('news.index')}}";
                }
            });
        }

        function deactive(newsId) {
            var id = newsId.value;
            console.log(id);
            $.ajax({
                type: "GET",
                url: "news/changeStatus/" + id,
                success: function () {
                    window.location = "{{route('news.index')}}";
                }
            });
        }

    </script>

    <script>
        $(document).on('change', '#bulkDelete', function () {
            if ($(':checkbox:checked').prop("checked") == true) {
                var newsId = [];
                $(':checkbox:checked').each(function () {
                    newsId.push($(this).val());
                });
                $.ajaxSetup({
                    cache: false
                });
                if (confirm('Are You Sure You Want To Delete This?')) {
                    $.ajax({
                        type: "POST",
                        data: {
                            newsId: newsId,
                            _token: "{{ csrf_token() }}",
                        },
                        url: "multiple/delete",
                        success: function (data) {
                            window.location = "{{route('news.index')}}"
                            toastr.success('Bulk News Deleted Successfully');
                        }
                    });
                }
            } else {
                alert('Please Select News To Delete...');
            }
        });
    </script>

    <script>
        //select all checkboxes
        $(document).on('click', '.select_all', function () {  //"select all" change
            $(".select_all").each(function () {
                var group = $(this).data("group");
                var parent = $(this);

                parent.change(function () {  //"select all" change
                    $(group).prop('checked', parent.prop("checked"));
                });
                $(group).change(function () {
                    parent.prop('checked', false);
                    if ($(group + ':checked').length == $(group).length) {
                        parent.prop('checked', true);
                    }
                });
            });
        });
    </script>

    <script>
        $('#example_news').on('click', '.news-delete', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');
            var token = $(this).data("token");
            // confirm then
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                        url: url,
                        type: 'post',
                        dataType: "json",
                        data: {
                            id: "id",
                            _method: 'DELETE',
                            _token: token
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        },
                        success: function (json) {
                            window.location = "{{route('news.index')}}"
                            toastr.success('News Deleted Successfully');
                        },
                    }
                ).always(function (data) {
                });
            } else
                alert("You have cancelled!");
        });

    </script>

    <script>
        $('#example_news').on('click', '.force-delete', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');
            var token = $(this).data("token");
            // confirm then
            if (confirm('Are you sure you want to permanent delete this? Be Sure This Cannot Be recover')) {
                $.ajax({
                        url: url,
                        type: 'post',
                        dataType: "json",
                        data: {
                            id: "id",
                            _method: 'DELETE',
                            _token: token
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        },
                        success: function (json) {
                            window.location = "{{route('news.index')}}"
                            toastr.success('News Deleted Successfully');
                        },
                    }
                ).always(function (data) {
                });
            } else
                alert("You have cancelled!");
        });

    </script>
@endsection


