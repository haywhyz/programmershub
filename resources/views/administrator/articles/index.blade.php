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
            <div>
                <a href="{{route('articles.create')}}" class="btn btn-primary">Create articles</a>
                <a href="{{route('tags.index')}}" class="btn btn-primary">Tags</a>
            </div>
            {{-- <div class="main">
                <ul class="menu">
                    <li><a href="{{ route('user')}}">User</a></li>
                    <li>User</li>
                </ul>
            </div> --}}
           
            <div class="card">
               
                
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-stripped">
                     
                        <th>Image </th>
                        <th>title</th>
                        <th>Posted by <th>
                        <th>Operations</th>
                   
                    {{-- @foreach ($tags as $tag ) --}}

                    <tr>
                     {{-- <td>{{ $tag->name}} </td> --}}
                     <td> image </td>
                     <td> commonwealth </td>
                     <td> Olayinka</td>
                     <td> <a href="" class="btn btn-info">Edit</a> 
                         <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Delete</a>
                     </td>
                 </tr>
                    {{-- @endforeach --}}
                </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

