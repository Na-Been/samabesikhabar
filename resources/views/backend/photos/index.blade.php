@extends('backend.layouts.app')
@section('title','Photo Feature List')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Photo Feature List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('photo.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Create
                    New Photo Feature</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="i   ntro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="example" style="width:100%">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">S.N.</th>
                        <th class="whitespace-no-wrap">Image</th>
                        <th class="whitespace-no-wrap">Description</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{$loop->iteration}}
                            </td>
                            <td>

                                <a href="" class="font-medium whitespace-no-wrap">
                                    <img src="{{asset(url('/').Storage::url($photo->image))}}">

                                </a>
                               </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">
                                    {!! Str::limit($photo->description,100)  !!}
                                </a>
                            </td>
                            <td>
                                @if($photo->status == 'active')
                                    <input class="input input--switch border photo-status" type="checkbox"
                                           value="{{$photo->id}}" checked>
                                @else
                                    <input class="input input--switch border photo-status" type="checkbox"
                                           value="{{$photo->id}}">
                                @endif
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a href="{{route('photo.edit',$photo->id)}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE','route'=>['photo.destroy',$photo->id],'class'=>'inline']) !!}
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
        $(document).on('change', '.photo-status', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "photo/changeStatus/" + id,
            }).done(function () {
                window.location = "{{route('photo.index')}}";
            });
        });
    </script>
@endsection
