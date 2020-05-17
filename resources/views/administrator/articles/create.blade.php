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
                <div class="card-header">Create Article</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST">
                        @csrf

                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            
                            <input id="content" type="hidden" name="content" id="content" >
                                <trix-editor input="content"></trix-editor>
        
                        </div>
                        <div class="form-group">
                            @if($tags->count() > 0)
                            <label for="tag">Tags</label>
                            <select name="tag[]" id="multiple" class="multiple form-control" multiple="multiple">
                                @foreach ($tags as $tag)
                                    
                                <option value="{{ $tag->id }}">
                                   
                                    {{ $tag->name }}
                                </option>
                                @endforeach
                            </select>
                             @endif
                        </div>
                        <div class="form-group">
                            <label> Published_At</label>
                            <input type="date" name="published_at" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" > Add </button>
                        </div>

                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"> </script>  
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script> --}}

<script type="text/javascript">
	$(document).ready(function() 
		{ 
           
            // alert("hu");
            // $('.mdb-select').materialSelect();

            $("#multiple").select2();
		 });
</script>

@endsection


