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
<form action="post">

<fieldset style="width:auto;padding:0 10px;border-bottom:none;">
<legend style="font-size:1.8em">New post</legend>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
    <small id="titleHelp" class="form-text text-muted">Maximum 255 characters.</small>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="deescription" placeholder="Enter post content">
    <small id="descHelp" class="form-text text-muted">Maximum 255 characters.</small>
  </div>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>

@endsection