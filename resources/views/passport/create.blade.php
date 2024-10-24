@extends('layouts.app')

    @section('content')

    <div class="bg-white overflow-hidden shadow-sm sm:rounded my-6 mx-6">
        <div class="p-1 text-gray-900 flex flex-row my-1 mx-1">
            <div class="flex flex-col my-1 mx-1">
                <div class="w-4/12 px-1 w-full my-1 mx-1">

                    <form action="{{ route('passports.store') }}" method="POST" class="bg-white shadow-md rounded px-2 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="employee_id">
                                Employee ID
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="employee_id" 
                                   type="text" 
                                   name="employee_id" 
                                   value="{{ old('employee_id') }}"
                                   
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="file_name">
                                file name
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="file_name" 
                                   type="text" 
                                   name="file_name" 
                                   value="{{ old('file_name') }}"
                                    
                                   
                                >
                        </div>

                        <div class="mb-4">
                                    <input type="file" name="document" id="document">

                        </div>

                        <div class="flex items-center justify-between">
                            <button id="total-label" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                    type="submit">
                                    Submit
                            </button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
