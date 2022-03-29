@extends('backend.layouts.app')
@section('title','Profile')
@section('content')
    <div class="content">
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Update Profile
            </h2>
        </div>
        {{--        @dd($user->avatar)--}}
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                <div class="intro-y box mt-5">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            <img alt="Dummy" class="rounded-md"
                                 src="{{$user->user_image}}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{$user->display_name}}</div>
                            <div class="text-gray-600">{{$user->email}}</div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                        <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            Personal Information </a>
                    </div>
                </div>
            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                <!-- BEGIN: Display Information -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Display Information
                        </h2>
                    </div>
                    <div class="p-5">
                        {!! Form::model($user,['method'=>'put','route'=>['profile.update'], 'enctype'=>'multipart/form-data']) !!}
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 xl:col-span-4">
                                <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                    <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img alt="Dummy" class="rounded-md" id="previewImg" src="{{$user->user_image}}">
                                    </div>
                                    <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="button w-full bg-theme-1 text-white">Change Photo
                                        </button>
                                        <input type="file" name="avatar"
                                               class="w-full h-full top-0 left-0 absolute opacity-0"
                                               onchange="previewFile(this);">

                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-8">
                                <div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('user_name')) ? 'has-error':''}} ">
                                        <div class="mb-2 font-medium">User Name<span class="text-theme-6">*</span></div>
                                        {!! Form::text('user_name',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter User Name', 'readonly']) !!}
                                        {!! $errors->first('user_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7 p-2 {{($errors->has('first_name')) ? 'has-error':''}} ">
                                        <div class="mb-2 font-medium">First Name<span class="text-theme-6">*</span>
                                        </div>
                                        {!! Form::text('first_name',null,['id'=>'firstName','class' => 'input w-full border flex-1','placeholder'=>'Enter First Name']) !!}
                                        {!! $errors->first('first_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('last_name')) ? 'has-error':''}} ">
                                        <div class="mb-2 font-medium">Last Name<span class="text-theme-6">*</span></div>
                                        {!! Form::text('last_name',null,['id'=>'lastName','class' => 'input w-full border flex-1','placeholder'=>'Enter Last Name']) !!}
                                        {!! $errors->first('last_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('nick_name')) ? 'has-error':''}} ">
                                        <div class="mb-2 font-medium">Nick Name<span class="text-theme-6">*</span></div>
                                        {!! Form::text('nick_name',null,['id'=>'nickName','class' => 'input w-full border flex-1','placeholder'=>'Enter Nick Name']) !!}
                                        {!! $errors->first('nick_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('display_name')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Display Name Publicly As<span
                                                class="text-theme-6">*</span></div>
                                        {!! Form::select('display_name', [$user->display_name],$user->display_name, ['id'=>'displayName','class' => 'input w-full border flex-1','placeholder'=>'Select One...']) !!}
                                        {!! $errors->first('display_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('email')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Email<span class="text-theme-6">*</span></div>
                                        {!! Form::email('email',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Email Address']) !!}
                                        {!! $errors->first('email', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>

                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('website')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Website<span class="text-theme-6">*</span></div>
                                        {!! Form::url('website',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter website if any']) !!}
                                        {!! $errors->first('website', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('twitter_link')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Twitter UserName(without @)<span
                                                class="text-theme-6">*</span>
                                        </div>
                                        {!! Form::text('twitter_link',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Twitter username']) !!}
                                        {!! $errors->first('twitter_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('facebook_link')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Facebook Profile Url<span
                                                class="text-theme-6">*</span>
                                        </div>
                                        {!! Form::url('facebook_link',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Email Address']) !!}
                                        {!! $errors->first('facebook_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>

                                    <div
                                        class="intro-y col-span-12 sm:col-span-7 p-2 {{($errors->has('personal_details')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Biographical Info<span
                                                class="text-theme-6">*</span>
                                        </div>
                                        {!! Form::textarea('personal_details',null,['id'=>'ck-editor','placeholder' => 'personal details']) !!}
                                    </div>

                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('password')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Password<span class="text-theme-6">*</span></div>
                                        {!! Form::password('password',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Password']) !!}
                                        {!! $errors->first('password', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <div
                                        class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('password_confirmation')) ? 'has-error':''}}">
                                        <div class="mb-2 font-medium">Confirm Password<span
                                                class="text-theme-6">*</span></div>
                                        {!! Form::password('password_confirmation',null,['class' => 'input w-full border flex-1','placeholder'=>'Re-Enter Password']) !!}
                                        {!! $errors->first('password_confirmation', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                    </div>
                                    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')
            @include('backend.layouts.scripts')
            @include('backend.layouts.flashMessage')
            <script
                src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
            <script type="text/javascript">
                CKEDITOR.replace('ck-editor', {
                    extraPlugins: 'embed,autoembed,image2',
                    filebrowserImageBrowseUrl: "{{url('/')}}" + '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: "{{url('/')}}" + '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: "{{url('/')}}" + '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: "{{url('/')}}" + '/laravel-filemanager/upload?type=Files&_token=',
                    embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
                    image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
                    image2_disableResizer: true,

                });
            </script>
            <script>
                function previewFile(input) {
                    var file = $("input[type=file]").get(0).files[0];

                    if (file) {
                        var reader = new FileReader();

                        reader.onload = function () {
                            $("#previewImg").attr("src", reader.result);
                        }

                        reader.readAsDataURL(file);
                    }
                }
            </script>

            <script>
                $(document).on('keyup change', '#nickName,#firstName,#lastName', function () {
                    // $('#displayName').empty();
                    var first_name = $('#firstName').val();
                    var last_name = $('#lastName').val();
                    var nick_name = $('#nickName').val();
                    var full_name = first_name + ' ' + last_name;


                    $('#displayName')
                        .html([$("<option></option>")
                            .attr("value", full_name)
                            .text(full_name),
                            $("<option></option>")
                                .attr("value", nick_name)
                                .text(nick_name)]
                        );
                });
            </script>
@endsection
