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
                <a href="{{route('tags.create')}}" class="btn btn-primary float-right"> create Tag</a>
                <div class="card-header">Tags</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <table class="table table-stripped">
                     
                           <th>name</th>
                           <th>Operations</th>
                      
                       @foreach ($tags as $tag )
 
                       <tr>
                        <td>{{ $tag->name}} </td>
                        
                        <td> <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info">Edit</a> 
                            <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> delete</button>
                                {{-- <a href="{{route('tags.destroy', $tag->id)}}" type="submit" class="btn btn-danger"  >Delete</a> --}}
                            </form>
                        
                        </td>
                    </tr>
                       @endforeach
                   </table>
                </div>
            </div>
            
           
           
        </div>
        </div>
    </div>
</div>
@endsection
<style>
     ul li{
        display: inline;
        padding: 10px;
    }
</style>
