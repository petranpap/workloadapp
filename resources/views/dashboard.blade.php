<x-app-layout>
    @section('title',config('app.name').' | Dashboard')

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

            thead {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }


            button {
                font-family: inherit;
                font-size: inherit;

                color: white;
                padding: 0.1em 0.7em;
                display: flex;
                align-items: center;
                justify-content: center;
                border: none;
                border-radius: 25px;
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
                transition: all 0.3s;
            }
            #createbtn{
                background: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);
            }
            #editbtn{
                background: linear-gradient(135deg,green 0%,rgb(0 128 0 / 59%) 100%);
            }

            button:hover {
                transform: translateY(-3px);
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            }

            button:active {
                transform: scale(0.95);
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            }

            button span {
                display: block;
                margin-left: 0.4em;
                transition: all 0.3s;
            }

            button svg {
                width: 18px;
                height: 18px;
                fill: white;
                transition: all 0.3s;
            }

            button .svg-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.2);
                margin-right: 0.5em;
                transition: all 0.3s;
            }

            button:hover .svg-wrapper {
                background-color: rgba(255, 255, 255, 0.5);
            }

            button:hover svg {
                transform: rotate(45deg);
            }


        </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Your Members</h2>

                    <table>
                        <thead>
                        <tr>
                            <th>Member name</th>
                            <th>Data</th>
                            <th>Edit / Create</th>
{{--                            <th>Year</th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sep_data as $sep_data)
                            <tr>
                                <td>
                        {{ $sep_data->name }}
                                </td>

                    @if($sep_data->data==0)
                                    <td>No Data</td>
                                    <td><a  href="/create">
                                            <button id="createbtn">
                                                <div class="svg-wrapper-1">
                                                    <div class="svg-wrapper">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span>Create</span>
                                            </button>
                                        </a></td>
                        @else

                                    <td> Yes</td>
                                    <td><a  href="/edit/{{$sep_data->id}}">
                                            <button id="editbtn">
                                                <div class="svg-wrapper-1">
                                                    <div class="svg-wrapper">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span>Edit</span>
                                            </button>
                                        </a>
                                    </td>


                    @endif
{{--                                <td>--}}
{{--                                    {{ $sep_data->year }}--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
