@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.update',$post->id)}}" method="POST">
            @csrf
            @METHOD("PUT")
            <div class="form-group">
                <label class="form-label" for="title">Titolo</label>
                <input class="form-control" type="text" name="title" id="title"  value="{{old('title')??$post->title}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content')??$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <select class="form-group" aria-label="Default select example" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{($category->id == $post->category_id)? 'selected' : ''}}>
                        {{$category->name}}
                    </option>                    
                @endforeach
            </select>
            <div class="form-group" name="tags" id="tags">
                @foreach($tags as $tag)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" 
                        @if($errors->any())
                            {{in_array($tag->id,old('tags',[]))? "checked" : ""}}
                        @else
                            {{$post->tags->contains($tag) ? 'checked' : ''}}
                        @endif
                        >
                        <label for="{{$tag->slug}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Pubblica</button>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
