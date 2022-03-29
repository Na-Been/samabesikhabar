@extends('user::layouts.master')
@section('title','Edit User')
<style>

    input[type='password'] {
        background-color: white !important;
    }
</style>
@section('content')
    <!-- END: Top Bar -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')

    <!-- END: Top Bar -->
        <div class="flex items-center mt-8">
            <h2 class="intro-y text-lg font-medium mr-auto pl-5">
                Update User
            </h2>
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <a href="{{route('user.index')}}"
                   class="button text-white bg-theme-1 shadow-md mr-2"><small>Back</small></a>
            </div>
        </div>
        <!-- BEGIN: Wizard Layout -->
        <div class="intro-y ">
            {!! Form::model($user,['method'=>'put','route'=>['user.update',$user->id], 'enctype'=>'multipart/form-data']) !!}
            <div class="p-5  border-t border-gray-200 dark:border-dark-5">

                <div class="col-span-12 lg:col-span-6">
                    <div class="grid grid-cols-12 mt-5">
                        <div class="intro-y col-span-12 sm:col-span-9  p-2">
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('user_name')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">User Name<span class="text-theme-6">*</span></div>
                                {!! Form::text('user_name',old('user_name'),['class' => 'input w-full border flex-1','placeholder'=>'Enter User Name','required']) !!}
                                {!! $errors->first('user_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-2 {{($errors->has('first_name')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">First Name<span class="text-theme-6">*</span></div>
                                {!! Form::text('first_name',old('first_name'),['id'=>'firstName','class' => 'input w-full border flex-1','placeholder'=>'Enter First Name','required']) !!}
                                {!! $errors->first('first_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('last_name')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Last Name<span class="text-theme-6">*</span></div>
                                {!! Form::text('last_name',old('last_name'),['id'=>'lastName','class' => 'input w-full border flex-1','placeholder'=>'Enter Last Name','required']) !!}
                                {!! $errors->first('last_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('nick_name')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Nick Name<span class="text-theme-6">*</span></div>
                                {!! Form::text('nick_name',old('nick_name'),['id'=>'nickName','class' => 'input w-full border flex-1','placeholder'=>'Enter Nick Name','required']) !!}
                                {!! $errors->first('nick_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('display_name')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Display Name Publicly As<span
                                        class="text-theme-6">*</span></div>
                                {!! Form::select('display_name', [$user->display_name],$user->display_name, ['id'=>'displayName','class' => 'input w-full border flex-1','placeholder'=>'Select One...','required']) !!}
                                {!! $errors->first('display_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('email')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Email<span class="text-theme-6">*</span></div>
                                {!! Form::email('email',old('email'),['class' => 'input w-full border flex-1','placeholder'=>'Enter Email Address','required']) !!}
                                {!! $errors->first('email', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('website')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Website</div>
                                {!! Form::url('website',old('website'),['class' => 'input w-full border flex-1','placeholder'=>'Enter website if any']) !!}
                                {!! $errors->first('website', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('twitter_link')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Twitter UserName(without @)</div>
                                {!! Form::text('twitter_link',old('twitter_link'),['class' => 'input w-full border flex-1','placeholder'=>'Enter Twitter username']) !!}
                                {!! $errors->first('twitter_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2   {{($errors->has('facebook_link')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Facebook Profile Url</div>
                                {!! Form::url('facebook_link',old('facebook_link'),['class' => 'input w-full border flex-1','placeholder'=>'Enter Email Address']) !!}
                                {!! $errors->first('facebook_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>

                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-2 {{($errors->has('personal_details')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Biographical Info</div>
                                {!! Form::textarea('personal_details',old('personal_details'),['id'=>'ck-editor','placeholder' => 'personal details']) !!}
                            </div>

                        </div>
                        <div class="intro-y col-span-12 sm:col-span-3 p-2">
                            <div
                                class="intro-y col-span-12 sm:col-span-5  p-2   {{($errors->has('status')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Status<span class="text-theme-6">*</span></div>
                                {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], 'active', ['class' => 'input w-full border flex-1']) !!}
                                {!! $errors->first('status', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('role')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Role<span class="text-theme-6">*</span></div>
                                {!! Form::select('role', ['admin' => 'Admin', 'editor' => 'Editor'], 'admin', ['class' => 'input w-full border flex-1','required']) !!}
                                {!! $errors->first('role', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-2  {{($errors->has('title')) ? 'has-error':''}} ">
                                <div
                                    class="intro-y col-span-12 sm:col-span-6 p-0 {{($errors->has('avatar')) ? 'has-error':''}}">

                                    <label for="image_label" class="mb-2 font-medium"> User Image</label>
                                    <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                        style="cursor: pointer">
                                       <i class="fas fa-image"></i> Choose Image</a>
                                   </span>
                                        <input id="thumbnail" class="form-control" type="text" name="avatar">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                    {!! $errors->first('avatar', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                                </div>
                                {!! $errors->first('avatar', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>


                        <div class="intro-y col-span-12 flex items-center  mt-5">
                            <button type="submit" class="button  justify-center block  text-white ml-2"
                                    style="background:#E3AF55">Update User
                            </button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
            <!-- END: Wizard Layout -->
            </div>
            @endsection
            @section('js')
                @include('backend.layouts.scripts')
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
                @include('backend.layouts.flashMessage')
                <script src="{{ asset('vendor/file-manager/js/filemanager.js') }}"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // set fm height
                        // document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');
                        document.getElementById('lfm').setAttribute('style', 'height:' + window.innerHeight + 'px');
                        document.getElementById('lfm2').setAttribute('style', 'height:' + window.innerHeight + 'px');

                        // Add callback to file manager
                        fm.$store.commit('fm/setFileCallBack', function (fileUrl) {
                            window.opener.fmSetLink(fileUrl);
                            window.close();
                        });
                    });
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
