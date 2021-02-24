<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/courses.css') }}" />
    <x-slot name="header">
        <h2 class="font semibold text-xl text-gray-800 leading-tight">
            {{__('Add Course')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form action="/courses" method="POST">
                    <div class="form-group">
                        <label for="title">Title:</label><br>
                        <input type="text" id="title" name="title"><br>
                        
                        <label for="description">Description:</label><br>
                        <textarea name="description" id="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter course description'></textarea>
                        
                        <label for="semester">Choose a semester:</label><br>
                        <select name="semester" id="semester">
                            <option value="prvi">Prvi</option>
                            <option value="drugi">Drugi</option>
                            <option value="treci">Treci</option>
                            <option value="cetvrti">Cetvrti</option>
                            <option value="peti">Peti</option>
                            <option value="sesti">Sesti</option>
                            <option value="sedmi">Sedmi</option>
                            <option value="osmi">Osmi<option>
                        </select>
                        <br>
                        <label for="espb">ESPB:</label><br>
                        <input type="text" id="espb" name="espb"><br>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Course</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>    
        
        </div>
    
    </div>

</x-app-layout>