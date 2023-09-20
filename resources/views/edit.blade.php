<x-app-layout>
    @if(session()->has('success'))

        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold"> {{ session()->get('success') }} </p>

                </div>
            </div>
        </div>
    @endif

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        td:nth-child(2){
            width: 250px;
        }
        td:nth-child(5){
            text-align: center;
        }

        .header-row {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .header-row th{
            width: 130px;
        }

        .calculate-cell {
            display: flex;
            align-items: center;
        }

        .calculate-button {
            margin-left: auto;
            margin-right: auto;
        }

        .result-input {
            width: 150px !important;
        }
        input{
            width: 100px;
            margin-left: auto;
            margin-right: auto;
        }
        :disabled {
            cursor: NOT-ALLOWED;
            background: #ccc;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Edit The Workload for a Member</h2>


                    <select id="sep_member" name="sep_member" class="focus:shadow-primary-outline dark:bg-blue-600 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-blue-600 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        <option disabled selected value class="font-bold"> -- Select Manager To Edit  -- </option>
                        @foreach($sep_data as $sep_data)
                            <option value="{{ $sep_data->id }}">{{ $sep_data->name }} </option>
                        @endforeach
                    </select>
                    <input id="sep_member_val" name="sep_member_val" value="" class="hidden">
                    <button type="submit" id="submit" class="text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 float-right">
                        Edit Member
                    </button>

                </div>
            </div>
        </div>
    </div>
    <script>

        $('#sep_member').change(function() {
            if($("#sep_member option:selected:not(:disabled)").length>0){
                $("#add-form").show()
                $("#sep_member_val").val($('#sep_member').val())
                $("#sep_member_name").html('Editing Member: <b>'+$('#sep_member option:selected').text()+'</b>')
            }

        })
        $("#submit").click(function () {
            window.location.href = window.location.href+'/'+$("#sep_member_val").val()
        })

    </script>
</x-app-layout>
