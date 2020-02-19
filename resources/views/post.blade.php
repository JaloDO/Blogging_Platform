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
                        <th><img src="https://img.icons8.com/cotton/2x/facebook-like--v2.png" width="10%"/></th>
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