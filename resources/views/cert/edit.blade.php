@extends('layouts.app')

    @section('content')
    @auth
    <div class="pt-3">
    
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-2">
            <div class="flex justify-between my-2">
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                {{ $cert->user() ? $cert->user->id . ' - ' . $cert->user->name : 'Unassigned' }}
                            </a> 
                            @if(auth()->user() && auth()->user()->is_admin)
                                @if($previousCert)
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.edit', $previousCert->id) }}">
                                        << Previous
                                    </a>
                                @else
                                    <span class="inline-block align-baseline font-bold text-sm text-gray-400">
                                        << Previous
                                    </span>
                                @endif
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.show', $cert->id) }}">
                                    Show Record
                                </a>
                                @if($nextCert)
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.edit', $nextCert->id) }}">
                                        Next >>
                                    </a>
                                @else
                                    <span class="inline-block align-baseline font-bold text-sm text-gray-400">
                                        Next >>
                                    </span>
                                @endif
                            @endif    
            <a href="{{ route('dashboard') }}" 
                                   class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                    Cancel
                                    </a>
                                    
                                                     
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 text-gray-900 flex flex-row">
                    <div class="flex flex-col ">
                    <div class="w-4/12 px-1 w-full">
                    <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-2 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                REC_ID
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="id" 
                                   type="text" 
                                   name="id" 
                                   value="{{ old('id', $cert->id) }}" 
                                   readonly>
                        </div>

                    
                        </form>





                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-1 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       




                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col19">
                                SWO Reference
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col19" 
                                   type="text" 
                                   name="col19" 
                                   value="{{ old('col19', $cert->col19) }}"
                                    required
                                   
                                >
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col11">
                                Work Done to Date - A
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col11" 
                                   type="number"
                                   step="0.01"
                                   name="col11" 
                                   value="{{ old('col11', $cert->col11) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col13">
                                Material on Site - B
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col13" 
                                   type="number"
                                   step="0.01"
                                   name="col13" 
                                   value="{{ old('col13', $cert->col13) }}"
                                   
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col25">
                                Add: Approved VO - C
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col25" 
                                   type="number"
                                   step="0.01"
                                   name="col25" 
                                   value="{{ old('col25', $cert->col25) }}"
                                   
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col27">
                                Add: Awaiting VO - D
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col27" 
                                   type="number"
                                   step="0.01"
                                   name="col27" 
                                   value="{{ old('col27', $cert->col27) }}"
                                   
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="advance_amount">
                                Advance Payment - E
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="advance_amount" 
                                   type="number"
                                   step="0.01"
                                   name="advance_amount" 
                                   value="{{ old('advance_amount', $cert->advance_amount) }}"
                                   
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col15">
                                Recovery of Advance - F
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col15" 
                                   type="number"
                                   step="0.01"
                                   name="col15" 
                                   value="{{ old('col15', $cert->col15) }}"
                                   
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="retention_amount">
                                Retention Amount - G
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="retention_amount" 
                                   type="number"
                                   step="0.01"
                                   name="retention_amount" 
                                   value="{{ old('retention_amount', $cert->retention_amount) }}"
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col17">
                                Release Retention First Half - H
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col17" 
                                   type="number"
                                   step="0.01"
                                   name="col17" 
                                   value="{{ old('col17', $cert->col17) }}"
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col21">
                                Release Retention Second Half - I
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col21" 
                                   type="number"
                                   step="0.01"
                                   name="col21" 
                                   value="{{ old('col21', $cert->col21) }}"
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="deduction_amount">
                                Deduction Amount - J
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="deduction_amount" 
                                   type="number"
                                   step="0.01"
                                   name="deduction_amount" 
                                   value="{{ old('deduction_amount', $cert->deduction_amount) }}"
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col23">
                                Invoice Total
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col23" 
                                   type="number"
                                   step="0.01"
                                   name="col23" 
                                   value="{{ old('col23', $cert->col23) }}"
                                   required
                                >
                        </div>




                        

                        <div class="flex items-center justify-between">
                        <button id="total-label" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                type="submit">
                                Submit
                        </button>
                        

                               
                                
                            </div>
                        </form>







                        




                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-1 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                                             

                        

                        
                        <div class="mb-4">
                        <label class=" block text-gray-700 text-sm font-bold mb-2" for="single_po">
                                Enter Issue 
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col5" 
                                   type="textarea" 
                                   name="col5" 
                                   value="{{ old('col5', $cert->col5) }}"
                                   {{ old('col5', $cert->col5) ? 'checked' : ''}}
                                >
                            
                        </div>

                        

                        

                        <div class="flex items-center justify-between">
                                
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Something Wrong
                                </button>
                               
                            </div>

                            
                            
                        </form>
                    </div>
                    </div>
















                    <!-- <div class="w-8/12" style="height: calc(100vh - 180px);"> -->
                    <div class="w-8/12" style="width: 100% !important;">

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
    @else
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-2 flex items-center justify-center">
            <p>You must be logged in to view this page.</p>
            <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Log in</a>
        </div>
    </div>
@endauth

    <script>
document.addEventListener('DOMContentLoaded', function() {
    console.log("triggered");
    const workDoneInput = document.getElementById('col11');
    const materialOnSiteInput = document.getElementById('col13');
    const approvedVOInput = document.getElementById('col25');
    const awaitingVOInput = document.getElementById('col27');
    const advanceAmountInput = document.getElementById('advance_amount');
    const releaseRetentionFirstHalfInput = document.getElementById('col17');
    const releaseRetentionSecondHalfInput = document.getElementById('col21');
    const recoveryOfAdvanceInput = document.getElementById('col15');
    const retentionAmountInput = document.getElementById('retention_amount');
    const deductionAmountInput = document.getElementById('deduction_amount');
    const invoiceTotalInput = document.getElementById('col23');
    const totalLabel = document.getElementById('total-label');

    function updateColorAndButton() {
        const workDone = parseFloat(workDoneInput.value) || 0;
       const materialOnSite = parseFloat(materialOnSiteInput.value) || 0;
       const approvedVO = parseFloat(approvedVOInput.value) || 0;
       const awaitingVO = parseFloat(awaitingVOInput.value) || 0;
        const advanceAmount = parseFloat(advanceAmountInput.value) || 0;
        const retentionAmount = parseFloat(retentionAmountInput.value) || 0;
        const deductionAmount = parseFloat(deductionAmountInput.value) || 0;
        const invoiceTotal = parseFloat(invoiceTotalInput.value) || 0;
        const releaseRetentionFirstHalf = parseFloat(releaseRetentionFirstHalfInput.value) || 0;
        const releaseRetentionSecondHalf = parseFloat(releaseRetentionSecondHalfInput.value) || 0;
        const recoveryOfAdvance = parseFloat(recoveryOfAdvanceInput.value) || 0;

        const calculatedTotal = workDone + materialOnSite + approvedVO + awaitingVO + advanceAmount + releaseRetentionFirstHalf + releaseRetentionSecondHalf -
        (recoveryOfAdvance + retentionAmount + deductionAmount);

        const calculatedTotal_fixed = Math.trunc(calculatedTotal * 100) / 100;
        const invoiceTotal_fixed = Math.trunc(invoiceTotal * 100) / 100;

        let difference =calculatedTotal_fixed - invoiceTotal_fixed;
        difference = Math.trunc(difference * 100) / 100;

        console.log("calculatedTotal: " + calculatedTotal_fixed);
        console.log("invoiceTotal: " + invoiceTotal_fixed);

        console.log("difference: " + difference);

        // Math.abs(calculatedTotal_fixed - invoiceTotal_fixed) > 0.01


        if (Math.abs(difference) > 0.01) {
            totalLabel.classList.remove('bg-blue-500');   
            totalLabel.classList.add('bg-red-500');
            totalLabel.disabled = true;
            totalLabel.classList.add('opacity-50', 'cursor-not-allowed');
            totalLabel.title = 'Totals do not match';
        } else {
            totalLabel.classList.remove('bg-red-500');
            totalLabel.classList.add('bg-blue-500');
            totalLabel.disabled = false;
            totalLabel.classList.remove('opacity-50', 'cursor-not-allowed');
            totalLabel.title = 'Totals match';
        }
    }

    workDoneInput.addEventListener('input', updateColorAndButton);
    materialOnSiteInput.addEventListener('input', updateColorAndButton);
    approvedVOInput.addEventListener('input', updateColorAndButton);
    awaitingVOInput.addEventListener('input', updateColorAndButton);
    advanceAmountInput.addEventListener('input', updateColorAndButton);
    retentionAmountInput.addEventListener('input', updateColorAndButton);
    deductionAmountInput.addEventListener('input', updateColorAndButton);
    invoiceTotalInput.addEventListener('input', updateColorAndButton);
    releaseRetentionFirstHalfInput.addEventListener('input', updateColorAndButton);
    releaseRetentionSecondHalfInput.addEventListener('input', updateColorAndButton);
    recoveryOfAdvanceInput.addEventListener('input', updateColorAndButton);
    
    // Initial check
    updateColorAndButton();

    console.log();
    
    
});
</script>
    @endsection

    