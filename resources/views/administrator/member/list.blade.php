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
                <div class="card-header">Members</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Fullname</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{$member->id}}</td>
                            <td>{{$member->firstname}}</td>
                            <td>Action</td>
                        </tr>
                        @endforeach

                    </table>

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
