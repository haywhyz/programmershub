@extends('layouts.app')

@section('content')

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
                     <tr>
                        <th>Image </th>
                        <th>title</th>
                        <th>Posted by <th>
                        <th>posted date </th>
                        <th>Operations</th>
                        </tr>
                   
                    @foreach ($articles as $articles )

                    <tr>
                    <td> <img src="{{ asset('/storage/'.$articles->image)}} " alt="" width="100px" height="100px"> </td>
                     <td>{{ $articles->title}} </td>
                     <td>{{ $articles->user->username}} </td>
                     <td>{{ $articles->published_at}} </td>
                   
                     <td> <a href="{{route('articles.edit', $articles->id)}}" class="btn btn-info">Edit</a> 
                        <form action="{{route('articles.destroy', $articles->id)}}"  method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">delete</button>
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
@endsection

