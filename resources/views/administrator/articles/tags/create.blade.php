@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
           <ul class="list-group">
               <li class="list-group-item">
                   <a href="{{ route('user')}}" class="href">Users</a>
               </li>
               <li class="list-group-item">
                <a href="{{route('articles.index')}}" class="href">Articles</a>
            </li>
           </ul>
        </div>
        <div class="col-md-8">
            
            {{-- <div class="main">
                <ul class="menu">
                    <li><a href="{{ route('user')}}">User</a></li>
                    <li>User</li>
                </ul>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    {{isset($tags)? 'upadate tags' : 'Create tags'}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ isset($tags)? route('tags.update', $tags->id) :route('tags.store')}}" method="POST">
                        @csrf
                       @if(isset($tags))
                       @method('PUT')
                       @endif
                        <div class="form-group">
                            <label> Tag Name</label>
                            <input type="text" name="name" class="form-control" value="{{isset($tags)? $tags->name : ''}}">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success"> {{isset($tags)? 'upadate ' : 'Create '}} </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"> </script>  
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> </script>


<script type="text/javascript">
	$(document).ready(function() 
		{ $("#multiple").select2();
		 });
</script>
<style>
     ul li{
        display: inline;
        padding: 10px;
    }
</style>
