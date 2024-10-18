@extends('layouts.app')

    @section('content')
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-row">
                    <div class="w-4/12 px-3">
                    <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                REC_ID
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="id" 
                                   type="text" 
                                   name="id" 
                                   value="{{ old('id', $cert->id) }}" 
                                   readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                PO Number
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="po_number" 
                                   type="text" 
                                   name="po_number" 
                                   value="{{ old('PO_number', $cert->PO_number) }}" 
                                   readonly>
                        </div>

                        <!-- <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="project_id">
                                Project ID
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="project_id" 
                                   type="text" 
                                   name="project_id" 
                                   value="{{ old('project_id', $cert->project_id) }}" 
                                        autofocus >
                        </div> -->
<!-- 
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="order_id">
                                Order ID
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="order_id" 
                                   type="text" 
                                   name="order_id" 
                                   value="{{ old('order_id', $cert->order_id) }}" 
                                        >
                        </div> -->

                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="order_id">
                                Select
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="single_po" 
                                   type="checkbox" 
                                   name="single_po" 
                                   value="1"
                                   {{ old('single_po', $cert->single_po) ? 'checked' : ''}}
                                >
                        </div>

                        <!-- <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                Advance Amount
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="advance_amount" 
                                   type="text" 
                                   name="advance_amount" 
                                   value="{{ old('id', $cert->advance_amount) }}" 
                                   readonly>
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                Retention Amount
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="retention_amount" 
                                   type="text" 
                                   name="retention_amount" 
                                   value="{{ old('retention_amount', $cert->retention_amount) }}" 
                                   readonly>
                        </div> -->

                        <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Update SC data
                                </button>
                                <a href="{{ route('dashboard') }}" 
                                   class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="w-8/12 px-20" style="height: calc(100vh - 180px);">
                    <?php
                    // you cannot add subfolder path in env.
                    // if you have a subfolder in idrive, add it to the path in your code.
                    $file = '/finished/';
                    $file .= $cert->file_name;
                    $docUrl = Storage::disk('idrive_e2')->temporaryUrl($file, now()->addMinutes(5));
                    $docUrl .= '#zoom=150';
                    ?>

                            <div class="w-full h-full">
                            <iframe class="embed-responsive-item w-full h-full" src="{{ $docUrl }}" allowfullscreen></iframe>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection