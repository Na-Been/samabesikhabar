@extends('backend.layouts.app')
@section('title','Live Link')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Live Video List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('create.live.link')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add
                    New Live Video Link</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="example" style="width:100%">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">SN</th>
                        <th class="whitespace-no-wrap">Title</th>
                        <th class="whitespace-no-wrap">Link</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($videos as $v)

                        <tr class="intro-x">
                            <td class="w-40">
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">
                                    {{$v->title}}</a>
                            </td>
                            <td>
                                <div>
                                    <div style="width:320px; height:240px;">
                                        {!! $v->live_link !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input class="input input--switch border liveStatusSwitch" name="status"
                                       {{ ($v->status == '1')?'checked':null }} type="checkbox"
                                       value="{{$v->id}}"></a>
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a href="{{route('edit.live.link',[$v->id])}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['delete.live.link',$v->id],'class'=>'inline']) !!}
                                    <button type="submit"
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                            onclick="javascript:return confirm('Are you sure you want to delete?');">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete</a>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script>

        $('#example').DataTable({
            language: {
                paginate: {
                    sNext: '<i class="fa fa-forward datatable-arrow"></i>',
                    sPrevious: '<i class="fa fa-backward datatable-arrow"></i>'
                }
            }
        });
    </script>
    @include('backend.layouts.flashMessage')
    <script>
        $(document).on('change', '.liveStatusSwitch', function () {
            let id = $(this).val();
            console.log(id);
            $.ajax({
                type: "GET",
                url: "/backend/live/changeStatus/" + id
            }).done(function () {
                window.location = '{{route('add.live.link')}}'
            });
        });
    </script>
@endsection
