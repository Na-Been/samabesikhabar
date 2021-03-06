@extends('user::layouts.master')
@section('title','User List')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10">
            Users List
        </h2>
        <div class="grid grid-cols-12">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mb-2">
                <a href="{{route('user.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New User</a>

                <div class="hidden md:block mx-auto text-gray-600"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-gray-700 dark:text-gray-300">
                        <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Users Layout -->
            @foreach($users as $user)
                <div class="intro-y col-span-12 md:col-span-12 mb-2">
                    <div class="box">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                <img class="rounded-full" src="{{$user->user_image}}">
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">{{$user->name}}</a>
                                <div class="text-gray-600 text-xs">{{$user->email}}</div>
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">Role : {{$user->role}}</a>
                            </div>
                            <div class="flex mt-4 lg:mt-0 mr-auto">
                                <div class="flex justify-center items-center">
                                    <input class="input input--switch border user-status"
                                           {{ ($user->status == 'active')?'checked':null }} type="checkbox"
                                           value="{{$user->id}}">
                                </div>
                            </div>
                            <div class="flex mt-4 lg:mt-0">
                                <div class="flex justify-center items-center">
                                    @if($user->id != auth()->id())
                                        <a href="{{route('user.edit',[$user->id])}}"
                                           class="button w-15 rounded-full mr-1 mb-2 text-theme-9">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['user.destroy',$user->id],'class'=>'inline']) !!}
                                        <button type="submit"
                                                class="button w-24 rounded-full mr-1 mb-2 text-theme-6"
                                                onclick="javascript:return confirm('Are you sure you want to delete?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    @include('backend.layouts.flashMessage')
    <script>
        $(document).on('change', '.user-status', function () {
            $id = $(this).val();
            $.ajax({
                url: "backend/user/changeStatus/" + $id,
                type: "GET"
            });
        });
    </script>
@endsection
