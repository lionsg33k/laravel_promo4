@extends('layout.index')


@section('content')
    <h1 class="bg-red-600 text-center py-5">Hello Categories</h1>



    @foreach ($categories as $category)
        <h1>{{ $category->name}}</h1>
        <h1>{{ $category}}</h1>
        <h1>{{ $category->created_at->format("d m y T HH:i:s") }}</h1>


        <br><br>
    @endforeach
@endsection
