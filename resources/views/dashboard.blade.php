<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if(auth()->user()->role()==0)
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Name</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->users() as $user)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$user->name}}
                            </td>
                            <td class="p-3 px-5">
                                {{$user->email}}
                            </td>
                            <td class="p-3 px-5">
                                @if($user->role==0)
                                    administrator
                                @else
                                    student
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Title</th>
                        <th class="text-left p-3 px-5">Semester</th>
                        <th class="text-left p-3 px-5">ESPB</th>
                        @if(auth()->user()->role()==1)
                            <th class="text-left p-3 px-5">Options</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->courses as $course)
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
                            @if(auth()->user()->role()==1)
                            <td>
                                <form action="/courses/enroll/delete/{{$course->id}}" class="inline-block">
                                    {{ csrf_field() }}
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
