@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4" style="margin-top: 5% !important;">Dashboard</h1>
  {{-- Extra remove is here --}}
  <a href="{{route('newspapers.create')}}" class="btn btn-primary mb-3">Add News Event</a>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      DataTable Example
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Headlines</th>
            <th>Hero Section</th>
            <th>Banner</th>
            <th>Description</th>
            <th>Image</th>
            <th>video</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Headlines</th>
            <th>Hero Section</th>
            <th>Banner</th>
            <th>Description</th>
            <th>Image</th>
            <th>Video</th>
            <th>Operation</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($newspapers as $key => $newspaper)
        <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $newspaper->title }}</td>
        <td>{{ $newspaper->headlines }}</td>
        <td>{{ $newspaper->hero_section }}</td>
        <!-- Banner Column -->
        <td>
          @if($newspaper->banner)
        <img src="{{ asset('storage/' . $newspaper->banner) }}" alt="News banner" width="100">
      @else
      <p>No Banner</p>
    @endif
        </td>

        <td>{{ $newspaper->description }}</td>

        <!-- Image Column -->
        <td>
          @if($newspaper->image)
        <img src="{{ asset('storage/' . $newspaper->image) }}" alt="News Image" width="100">
      @else
      <p>No Image</p>
    @endif
        </td>

        <!-- Video Column -->
        <td>
          @if($newspaper->video)
        <video width="150" controls>
        <source src="{{ asset('storage/' . $newspaper->video) }}" type="video/mp4">
        Your browser does not support the video tag.
        </video>
      @else
      <p>No video</p>
    @endif
        </td>

        <td>
          <!-- Edit Button -->
          <a href="{{ route('newspapers.edit', $newspaper->id) }}" class="btn btn-sm btn-warning">
          <i class="fas fa-edit"></i> Update
          </a>

          <!-- Delete Button -->
          <form action="{{ route('newspapers.destroy', $newspaper->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger"
            onclick="return confirm('Are you sure you want to delete this item?');">
            <i class="fas fa-trash"></i> Delete
          </button>
          </form>
          <!-- Show Button -->
          <a href="{{route('newspapers.show', $newspaper->id)}}" class="btn btn-info btn-sm">Show</a>
        </td>
        </tr>
      @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>