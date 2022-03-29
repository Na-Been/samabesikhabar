@extends('backend.layouts.app')
@section('title','Live Link Edit')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Live Video
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('add.live.link')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::model($live,['method'=>'PUT','route'=>['update.live.link',$live->id], 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5 p-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Title <span class="text-theme-6">*</span></div>
                            {!! Form::text('title',$live->title,['class' => 'input w-full border flex-1','placeholder'=>'Enter Title']) !!}
                            {!! $errors->first('title', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>

                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">URL<span class="text-theme-6">*</span></div>
                            {!! Form::url('url',$live->url,['class'=>'input w-full border flex-1','placeholder' => 'URL....']) !!}
                            {!! $errors->first('url', '<span class="pristine-error text-theme-6 mt-2">:message</span>') !!}
                        </div>

                        <div
                            class="intro-y col-span-12 sm:col-span-6 p-2 {{($errors->has('status')) ? 'has-error':''}}">
                            <div class="mb-2  font-medium">Status <span class="text-theme-6">*</span></div>
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], $live->status, ['class' => 'input w-full border flex-1']) !!}
                            {!! $errors->first('status', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mb-23 p-5">
                        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- END: Document Editor -->
        </div>
    </div>
@endsection

@section('js')
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
@endsection
