@extends('admin.layouts.app')
@section('title')
    Admin|Artists
@endsection

@section('main')
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mt-4">Artist Index</h1>
            <a href="{{route('admin.artist.create')}}" class="btn btn-success">Create Artist</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                    <tr>
                        <td>{{$artist->id}}</td>
                        <td><small class="h4 fw-normal">{{$artist->name}} </small> <br>{{$artist->country}}<br> {{$artist->date_of_birth}}</td>
                        <td>
                            @if($artist->image)
                                <img src="{{asset('img'. $artist->image)}}" alt="Artist Image" class="img-thumbnail" style="max-width: 100px;">
                            @else
                            No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.artist.edit', $artist->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('admin.artist.destroy', $artist->id)}}" method="post" style="display:inline;">
                                @csrf
                                @method('Delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection