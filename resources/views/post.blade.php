@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($allpost) > 0)
    <a href="home/fecha/d">order date</a>
    <!--<select class="btn btn-terciary btn-sm">
        <option class="dropdown-item" value=0>Sort by Date</option>
        <option class="dropdown-item" value=1>Sort by Likes</option>
    </select>-->
    <div><p></p></div>
    <div class="table-responsive">
            <table class="table table-hover" style="font-size:.9em;">
                <caption>List of Posts</caption>
            	<thead class="thead-dark">
            		<tr>
            			<th>Post</th>
            			<th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th colspan=2>Likes</th>
            		</tr>
            	</thead>
            	<tbody>
                @foreach($allpost as $post)
              		<tr>
              			<th>{{ $post->id }}</th>
              			<td>{{ $post->title }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->publication_date }}</td>
                    <td> {{ $post->num }} </td>
                    <td>
                        <a href="home/{{ $post->id }}" ><img src="https://img.icons8.com/cotton/2x/facebook-like--v2.png" width="50px" height="50px"/></a>
                    </td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
    @endif
</div>
@endsection