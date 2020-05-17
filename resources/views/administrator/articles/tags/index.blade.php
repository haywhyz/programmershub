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
                            <a href="{{route('tags.destroy', $tag->id)}}" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Delete</a>
                        </td>
                    </tr>
                       @endforeach
                   </table>
                </div>
            </div>
            <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                @csrf 
                @method('delete')
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                are sure u want to delete 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">delete</button>
                                {{-- <a href="{{route('tag.destroy', $tag)}}" class="btn btn-danger">Delete</a> --}}
                                <!--  <button type="button" class="btn btn-primary">Delete</button> -->
                           </div>
                        </div>
                    </div>
                </div>
            </form>
           
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
