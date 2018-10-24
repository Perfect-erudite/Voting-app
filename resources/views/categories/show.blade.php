@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <small> Category > {!! $category->name !!} </small>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <!--Display form if user hasn't nomineted before-->
                    
                        @include('categories.show_fields')
                   
                    <a href="{!! route('categories.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
