<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Something Wrong') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome! ") }} 
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-row">
                    <div class="px-3">
                    <?php
                    $certs = App\Models\Cert::all()->where('col1', 1)->where('col4', '!=', 1);//isUpdated;
                    $certCount = $certs->count();
                    ?>
                    <div class="my-2 text-gray-500">There are {{ $certCount }} matching records.</div>
                    @foreach ($certs as $cert)
                        
                        <p>
                            <a href="{{ route('certs.edit', $cert->id) }}">{{ $cert->id}}</a>&nbsp;
                            <a href="{{ route('certs.edit', $cert->id) }}">{{ $cert->file_name }}</a>
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('certs.remove_issue_flag', $cert->id) }}">Remove Issue Flag</a>
                            @endif
                        </p>

                        

                    @endforeach
                    </div>
                    <div class="px-3">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
