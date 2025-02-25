@extends('layouts.admin')
@section('content')
  <div class="container-fluid px-4">
    <a href="{{route('dashboard')}}" class="btn btn-primary mb-3">Go To Dashboard</a>
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
  @endif

    @if(session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
  @endif

    {{-- Error messages --}}
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
  @endif


    {{-- Form Start --}}
    <form action="{{ route('newspapers.update', $newspaper->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- Title --}}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $newspaper->title) }}">
    </div>

    {{-- Headlines --}}
    <div class="form-group">
      <label for="headlines">Headlines</label>
      <input type="text" name="headlines" id="headlines" class="form-control"
      value="{{ old('headlines', $newspaper->headlines) }}">
    </div>

    {{-- Hero section --}}
    <div class="form-group">
      <label for="hero_section">Hero Section</label>
      <input type="text" name="hero_section" id="hero_section" class="form-control"
      value="{{ old('hero_section', $newspaper->hero_section) }}">
    </div>



    {{-- Description --}}
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control"
      value="{{ old('description', $newspaper->description) }}">
    </div>

    {{-- Banner --}}
    <div class="form-group">
      <label for="banner">Banner</label>
      <input type="file" name="banner" id="banner" class="form-control" accept="image/*">
    </div>

    {{-- Image --}}
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>

    {{-- Video --}}
    <div class="form-group">
      <label for="video">Video</label>
      <input type="file" name="video" id="video" class="form-control" accept="video/*">
    </div>

    {{-- Submit Button --}}
    <button type="submit" class="btn btn-primary mt-3">Update News</button>
    </form>

  </div>
@endsection