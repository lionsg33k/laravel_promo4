@extends('layout.index')

@section('content')
    <div class=" bg-black/90 flex items-center  flex-col gap-8">
        <h1 class="text-white text-3xl font-semibold">Download your file here from url </h1>

        <form class="border  border-white px-5 py-3" action="/imager/store" method="post">
            @csrf
            <div class="flex flex-col gap-5">
                <input class="text-white px-5 py-2 border placeholder:text-white/70" placeholder="image url" required
                    type="url" name="imageUrl" id="">
                <button class="bg-white rounded-xl. text-black w-full">Download</button>
            </div>
        </form>


        <div class=" grid grid-cols-4 gap-5">
            @forelse ($allImages as $img)
                <img src="{{ asset('/storage/images/' . $img->url) }}" alt="">
            @empty
                <h1>No image</h1>
            @endforelse
        </div>
    </div>
    <div class=" bg-black/90 flex items-center  flex-col gap-8">
        <h1 class="text-white text-3xl font-semibold">UPload  your own file ( file machi darori  image) </h1>

        <form enctype="multipart/form-data" class="border  border-white px-5 py-3" action="/imager/store/file" method="post">
            @csrf
            <div class="flex flex-col gap-5">
                <input accept="image/jpeg" class="text-white px-5 py-2 border placeholder:text-white/70"  required
                    type="file" name="file" id="">
                <button class="bg-white rounded-xl. text-black w-full">Upload</button>
            </div>
        </form>


        <div class=" grid grid-cols-4 gap-5">
            @forelse ($allImages as $img)
                <img src="{{ asset('/storage/'. $img->url) }}" alt="">
            @empty
                <h1>No image</h1>
            @endforelse
        </div>
    </div>
@endsection
