@extends('layouts.admin')
@section('content')
  <div class="container-fluid px-4">
    <a href="{{route('dashboard')}}" class="btn btn-primary mb-3">Go To Dashboard</a>
    <div class="card p-1">
    <h1>Newspaper Title : {{$newspaper->title}}</h1>
    </div>

    <div class="card p-1">
    <h1>Newspaper Headlines : {{$newspaper->headlines}}</h1>
    </div>

    <div class="card p-1">
    <h1>Newspaper Hero Section : {{$newspaper->hero_section}}</h1>
    </div>


    <div class="card p-1">
    <h1>Newspaper Banner</h1>
    <img src="{{asset('storage/' . $newspaper->banner)}}" alt="Newspaper Banner" style="max-width: 10%;height:auto;">
    </div>



    <div class="card p-1">
    <h1>Newspaper description : {{$newspaper->description}}</h1>
    </div>



    <div class="card p-1">
    <h1>Newspaper Picture</h1>
    <img src="{{asset('storage/' . $newspaper->image)}}" alt="Newspaper Picture" style="max-width: 10%;height:auto;">
    </div>


    <div class="card p-1">
    <h1>Newspaper Video </h1>
    <video controls style="max-width: 10%" src="{{asset('storage/' . $newspaper->video)}}" type="video/*">Browser not
      support the video</video>
    </div>
  </div>
@endsection