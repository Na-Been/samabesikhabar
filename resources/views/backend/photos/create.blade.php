@extends('backend.layouts.app')
@section('title','Create Photo')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Create Blog
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('photo.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::open(['method'=>'post','route'=>'photo.store', 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-6 p-5 {{($errors->has('status')) ? 'has-error':''}}">
                            <div class="mb-2">Status</div>
                            {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], '1', ['class' => 'input w-full border flex-1' ,'placeholder'=>'--Select One--']) !!}
                            {!! $errors->first('status', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>

                        <div
                            class="intro-y col-span-12 sm:col-span-7 mt-5 {{($errors->has('image')) ? 'has-error':''}}">
                            <div class="box p-3 mt-5">
                                <div class="font-medium mb-2">
                                    <label for="image_label font-medium"> Feature Image</label>
                                </div>
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" style="cursor: pointer!important;" data-input="thumbnail1"
                                        data-preview="holder" class="btn btn-primary">
                                       <i class="fas fa-image"></i> Choose Feature Image</a>
                                   </span>
                                    <input id="thumbnail1" class="form-control" type="text" name="image">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="p-5" id="standard-editor">
                        {!! Form::textarea('description',null,['class'=>'editor','placeholder' => 'Image Description']) !!}
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mb-23">
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
    @include('backend.layouts.scripts')
    @include('backend.layouts.flashMessage')
@endsection
