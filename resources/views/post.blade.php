@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($allpost) > 0)
    <form method="get" action="/blog_plat/public/home/sortDate">
        <button type="submit" class="btn btn-terciary btn-sm" name="submit">Order by Date</button>
    </form>
    <form method="get" action="/blog_plat/public/home/sortLike">
        <button type="submit" class="btn btn-terciary btn-sm" name="submit">Order by Likes</button>
    </form>
    
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
                        @if(Route::has('sortDate'))
                        <a href="..//home/like/{{ $post->id }}" ><img src="https://img.icons8.com/cotton/2x/facebook-like--v2.png" width="50px" height="50px"/></a>
                        @else
                        <a href="home/like/{{ $post->id }}" ><img src="https://img.icons8.com/cotton/2x/facebook-like--v2.png" width="50px" height="50px"/></a>
                        @endif

                    </td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
    @endif
</div>
@endsection