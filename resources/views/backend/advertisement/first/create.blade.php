@extends('backend.layouts.app')
@section('title','Advertisement Create')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Create Advertisement
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('advertisement.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::open(['method'=>'post','url'=>'backend/advertisement', 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5 p-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Title <span class="text-theme-6">*</span></div>
                            {!! Form::text('title',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Title']) !!}
                            {!! $errors->first('title', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('rank')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Rank <span class="text-theme-6">*</span></div>
                            {!! Form::number('rank',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Rank']) !!}
                            {!! $errors->first('rank', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('starting_date')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Starting Date <span class="text-theme-6">*</span></div>
                            {!! Form::date('starting_date',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter starting date']) !!}
                            {!! $errors->first('starting_date', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('ending_date')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Ending Date <span class="text-theme-6">*</span></div>
                            {!! Form::date('ending_date',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter ending date']) !!}
                            {!! $errors->first('ending_date', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-2 {{($errors->has('display_at')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Display At <span class="text-theme-6">*</span></div>
                            {!! Form::text('display_at',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Place To Display Ads']) !!}
                            {!! $errors->first('display_at', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6 p-2 {{($errors->has('page')) ? 'has-error':''}}">
                            <div class="mb-2 font-medium">Page<span class="text-theme-6">*</span></div>
                            {!! Form::select('page', ['1' => 'Home Page', '2' => 'News Details Page','3'=>'Category Page','4'=>'Sub Category Page'], '1', ['class' => 'input w-full border flex-1']) !!}
                            {!! $errors->first('page', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-12  p-2 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">URL<span class="text-theme-6">*</span></div>
                            {!! Form::url('url',null,['class'=>'input w-full border flex-1','placeholder' => 'URL....']) !!}
                            {!! $errors->first('url', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div
                            class="intro-y col-span-6 sm:col-span-6 p-2 {{($errors->has('image')) ? 'has-error':''}}">
                            <div class="font-medium">
                                <label for="image_label font-medium">Image</label>
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
                        <div
                            class="intro-y col-span-12 sm:col-span-6 p-2 {{($errors->has('status')) ? 'has-error':''}}">
                            <div class="mb-2 font-medium">Status<span class="text-theme-6">*</span></div>
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], '1', ['class' => 'input w-full border flex-1']) !!}
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
    @include('backend.layouts.scripts')
    @include('backend.layouts.flashMessage')
@endsection
