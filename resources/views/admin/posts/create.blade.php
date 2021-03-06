@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Titolo</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label class="form-label" for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label">Immagine</label>
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            <select class="form-group" aria-label="Default select example" name="category_id" id="category_id">
                <option selected>Seleziona la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>                    
                @endforeach
            </select>
            <div class="form-group" name="tags" id="tags">
                @foreach($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]" id="{{$tag->slug}}" {{in_array($tag->id,old('tags',[]))? "checked" : ""}}>
                        <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
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
