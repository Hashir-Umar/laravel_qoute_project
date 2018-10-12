@extends('layouts.master')

@section('title')
    Home Page
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/style.css')}}">
@endsection

@section('header')
    <h1 class="text-center text-info">QOUTES</h1>
@endsection

@section('content')
   
    @if(count($errors) > 0) 
        <div class="info-box fail">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li> 
            @endforeach
        </div> 
    @endif

    @if(Session::has('success'))
        <div class="info-box success">
            {{Session::get('success')}}
        </div>  
    @endIf

    @if($flag == false) 
        <div class="info-box warning">
            <span class="text-muted">A filter has been set</span>  <a style="color: white;" href="{{route('index')}}"> Show all qoutes </a>
        </div> 
    @endif

    <div class="row">    
        @if(!count($qoutes))
            <div class="mx-auto info-box">No Qoutes Found</div>
        @endif
        @for($i = 0; $i < count($qoutes); $i++)
            <div class="col-md-6 col-lg-4 col-xl-4 mt-1 p-1">
                <section class="qoute-section">
                    <div class="qoute-heading"><a href=" {{ route('delete', ['qoute_id' => $qoutes[$i]->id]) }}">x</a></div>
                    <div class="qoute-content">
                        {{$qoutes[$i]['qoute']}}
                    </div>
                    <div class="qoute-footer">Created by &nbsp <a href="{{ route('index', ['author_name' => $qoutes[$i]->author->name]) }}"><u>{{$qoutes[$i]->author->name}}</u></a> &nbsp at {{$qoutes[$i]->created_at}}</div>
                </section>
            </div>
        @endfor
    </div> 
    
    <div class="text-center">
        @if($qoutes->currentPage() !== 1)
            <a href="{{ $qoutes->previousPageUrl() }}"><</a>
        @endif
        
        @if($qoutes->currentPage() !== $qoutes->lastPage() && $qoutes->hasPages())
            <a href="{{ $qoutes->nextPageUrl() }}">></a>  
        @endif

    </div>
    
    <hr />

    @if($flag)
        <div class="row mt-2">
            <div class="col-md-6 mx-auto">
            <h1 class="text-center text-muted">~Add Qoute~</h1> <br />
                <form action="{{route('create')}}" method="post">
                    <div class="form-group">
                        <label for="Author">Author: </label>
                        <input name="author" type="text" class="form-control form-control-sm" >
                    </div>
                    <div class="form-group">
                        <label for="Qoute">Qoute: </label>
                        <textarea name="qoute" id="qoute" rows="6"></textarea>
                    </div>
                    <button class="btn btn-outline-info">Submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>
        </div>
    @endif

@endsection

