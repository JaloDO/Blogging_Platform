@extends('layouts.app')

@section('content')

<div class="container">

<form method="get" action="/blog_plat/public/store">
<fieldset style="width:auto;padding:0 10px;border-bottom:none;">
<legend style="font-size:1.8em">New post</legend>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title" value="">
    <small id="titleHelp" class="form-text text-muted">Maximum 255 characters.</small>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" id="description" placeholder="Enter post content" value="">
  </div>
  <button type="submit" class="btn btn-secondary" name="submit">Submit</button>
  </fieldset>
</form><div style="height:30px;"></div>

    @if(count($allpost) > 0)
    <div class="table-responsive">
            <table class="table table-hover table-sm" style="font-size:.8em;">
            	<thead class="thead-light">
            		<tr>
            			<th>Post</th>
            			<th>Title</th>
                  <!--<th>Author</th>-->
                  <th>Description</th>
                  <th>Date</th>
                  <th>Likes</th>
            		</tr>
            	</thead>
            	<tbody>
                @foreach($allpost as $post)
              		<tr>
              			<th>{{ $post->id }}</th>
              			<td>{{ $post->title }}</td>
                    <!--<td>{{ $post->name }}</td>-->
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->publication_date }}</td>
                    <td>{{ $post->num }}</td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
    @endif
</div>


@endsection