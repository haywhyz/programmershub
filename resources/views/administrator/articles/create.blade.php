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
            
            @if($errors->any())
            <div class=" alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error )
                    <li class="list-group-item">
                        {{$error}}
                    </li>
                    @endforeach
                    
                </ul>
            </div>
            
            @endif
            <div class="card">
                <div class="card-header"> 
                   {{isset($article) ? 'Edit Article': 'Create Articles' }}
                 
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{isset($article) ? route('articles.update', $article->id) : route('articles.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($article))
                        @method('PUT')
                        @endif
                        
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{isset($article)? $article->title : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            
                            <input id="content" type="hidden" name="content" id="content" value="{{isset($article)? $article->content : ''}}" >
                            <trix-editor input="content"></trix-editor>
                            
                        </div>
                        <div class="form-group">
                            @if($tags->count() > 0)
                            <label for="tag">Tags</label>
                            <select name="tag[]" id="multiple" class="multiple form-control" multiple="multiple">
                                @foreach ($tags as $tag)
                                
                                <option value="{{ $tag->id }}"

                                     @if(isset($article))
                             
                                     @if($article->hasTag($tag->id))
                                         selected 
                                     @endif

                                     
                                  @endif>
                                    
                                    {{ $tag->name }}
                                </option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Published_At</label>
                            <input type="date" name="published_at" class="form-control"  value="{{isset($article)? $article->published_at : ''}}">
                        </div>
                        
                        <div class="form-group">
                            @if (isset($article))
                            <img src="{{asset('/storage/'.$article->image)}}" alt="image" width="200px" height="200px"> 
                            @endif
                            <input type="file" name="image" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            
                            <button class="btn btn-primary btn-block" type="submit" > {{isset($article)? 'Update Articles': 'Create Articles' }}</button>
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


