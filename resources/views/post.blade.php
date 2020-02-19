@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($allpost) > 0)
        
    <div class="table-responsive">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>Post Nº</th>
            			<th>Title</th>
                        <th>Author</th>
                        <th>Publication Date</th>
                        <th>Description</th>
                        <th>Likes</th>
            		</tr>
            	</thead>
            	<tbody>
                @foreach($allpost as $post)
              		<tr>
              			<th>{{ $post->id }}</th>
              			<td>{{ $post->title }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->publication_date }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->like }}</td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
    @endif
</div>

@endsection