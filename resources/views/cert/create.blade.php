@extends('layouts.app')

    @section('content')

    <div class="bg-white overflow-hidden shadow-sm sm:rounded my-6 mx-6">
        <div class="p-1 text-gray-900 flex flex-row my-1 mx-1">
            <div class="flex flex-col my-1 mx-1">
                <div class="w-4/12 px-1 w-full my-1 mx-1">
                    <h2 class="text-2xl font-bold mb-4">
                        Create New Record
                    </h2>
                    <form action="{{ route('certs.store') }}" method="POST" class="bg-white shadow-md rounded px-2 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="project_id">
                                Project ID
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="project_id" 
                                   type="text" 
                                   name="project_id" 
                                   value="{{ 1 }}"
                                >
                        </div>

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="order_id">
                                Order ID
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="order_id" 
                                   type="text" 
                                   name="order_id" 
                                   value="{{ 1 }}"
                                >
                        </div>

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="pc_id">
                                PC ID
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="pc_id" 
                                   type="text" 
                                   name="pc_id" 
                                   value="{{ 1 }}"
                                >
                        </div>

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="latest_pc_id">
                                Latest PC ID
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="latest_pc_id" 
                                   type="text" 
                                   name="latest_pc_id" 
                                   value="{{ 1 }}"
                                >
                        </div>

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="user_id">
                                User Id
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="user_id" 
                                   type="text" 
                                   name="user_id" 
                                   value="10"
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
