@extends('layout.index')

@section('content')
    <h1 class="text-center py-8">hello {{ $student->name }}</h1>
    <div class="  bg-gray-900 ">

        <form class="flex flex-col space-y-6 border border-white rounded-xl px-5 py-3" action="{{ route("student.update" , $student) }}" method="post">
            @csrf
            @method("PUT")
            <input value="{{ old("name" , $student->name) }}" class="border border-white/50 rounded-lg px-3 py-1  text-white" placeholder="please  insert a valid  name"
                type="text" name="fullName" id="">
            <input value="{{ old("age" , $student->age) }}" class="border border-white/50 rounded-lg px-3 py-1  text-white" placeholder="how old are  you "
                type="number" name="age" id="">

            <select class="border border-white/50 rounded-lg px-3 py-1  text-white" name="school" id="">
                <option disabled  value="">Select your school </option>
                <option @selected($student->school == "coding") value="coding">coding</option>
                <option @selected($student->school == "media") value="media">media</option>
            </select>

                <button class=" bg-white text-black font-semibold rounded-lg">Save</button>
            </form>
        </div>
    @endsection
