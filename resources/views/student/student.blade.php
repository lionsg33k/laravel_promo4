@extends('layout.index')

@section('content')
    <div class="  bg-gray-900 ">

        <form class="flex flex-col space-y-6 border border-white rounded-xl px-5 py-3" action="/student/store" method="post">
            @csrf
            <input class="border border-white/50 rounded-lg px-3 py-1  text-white" placeholder="please  insert a valid  name"
                type="text" name="fullName" id="">
            <input class="border border-white/50 rounded-lg px-3 py-1  text-white" placeholder="how old are  you "
                type="number" name="age" id="">

            <select class="border border-white/50 rounded-lg px-3 py-1  text-white" name="school" id="">
                <option disabled selected value="">Select your school </option>
                <option value="coding">coding</option>
                <option value="media">media</option>
            </select>
            {{-- 
        <div class="">
            <label for="x">x</label>
            <input id="x" name="x" value="jkhfkjsd" type="checkbox">
        </div> --}}
            <button class=" bg-white text-black font-semibold rounded-lg">Save</button>
        </form>
    </div>

    <div class="">

        @forelse ($students as $student)
            <div class="w-full py-5 px-3 border flex items-center justify-between">
                <h1>{{ $student->name }}</h1>
                <div class="flex gap-x-6">
                    <a class=" py-2 px-3 bg-amber-600 rounded-lg text-white cursor-pointer hover:bg-amber-800"
                        href="{{ route('student.show', $student->id) }}">Check Student Detail</a>

                    <form class="bg-red-600 py-2 px-8 text-white rounded-lg cursor-pointer " action="{{ route("student.destroy" , $student) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <h1>there is no student</h1>
        @endforelse
    </div>
@endsection
