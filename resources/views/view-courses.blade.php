<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/courses.css') }}" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Title</th>
                        <th class="text-left p-3 px-5">Semester</th>
                        <th class="text-left p-3 px-5">ESPB</th>
                        @if(auth()->user()->role==0)
                            <th class="text-left p-3 px-5">Options</th>
                        @endif
                        @if(auth()->user()->role==1)
                            <th class="text-left p-3 px-5">Enrollment</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(App\Models\Course::courses() as $course)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$course->title}}
                            </td>
                            <td class="p-3 px-5">
                                {{$course->semester}}
                            </td>
                            <td class="p-3 px-5">
                                {{$course->espb}}
                            </td>
                            @if(auth()->user()->role==0)
                                <td class="p-3 px-5">
                                    <form action="/courses/edit/{{$course->id}}" class="inline-block">
                                        {{ csrf_field() }}
                                        <button type="submit" name="edit" formmethod="POST" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                                    </form>
                                    <form action="/courses/delete/{{$course->id}}" class="inline-block">
                                        {{ csrf_field() }}
                                        <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    </form>
                                </td>
                            @endif
                            @if(auth()->user()->role==1)
                                @if(App\Http\Controllers\CoursesController::courseEnrolled($course)->isEmpty())
                                    <td class="p-3 px-5">
                                        <form action="/courses/enroll/{{$course->id}}" class="inline-block">
                                            {{ csrf_field() }}
                                            <button type="submit" name="enroll" formmethod="POST" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline button-enroll">Enroll</button>
                                        </form>
                                    </td>
                                @else
                                    <td class="p-3 px-5">
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
