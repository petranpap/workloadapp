<x-app-layout>
    @section('title',config('app.name').' | Add New Member')
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
                position: relative;
                display: inline-block;
                cursor: pointer;
                outline: none;
                border: 0;
                vertical-align: middle;
                text-decoration: none;
                background: transparent;
                padding: 0;
                font-size: inherit;
                font-family: inherit;
            }

            button.learn-more {
                width: 12rem;
                height: auto;
            }

            button.learn-more .circle {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                position: relative;
                display: block;
                margin: 0;
                width: 3rem;
                height: 3rem;
                background: #282936;
                border-radius: 1.625rem;
            }

            button.learn-more .circle .icon {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                position: absolute;
                top: 0;
                bottom: 0;
                margin: auto;
                background: #fff;
            }

            button.learn-more .circle .icon.arrow {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                left: 0.625rem;
                width: 1.125rem;
                height: 0.125rem;
                background: none;
            }

            button.learn-more .circle .icon.arrow::before {
                position: absolute;
                content: "";
                top: -0.29rem;
                right: 0.0625rem;
                width: 0.625rem;
                height: 0.625rem;
                border-top: 0.125rem solid #fff;
                border-right: 0.125rem solid #fff;
                transform: rotate(45deg);
            }

            button.learn-more .button-text {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                padding: 0.75rem 0;
                margin: 0 0 0 1.85rem;
                color: #282936;
                font-weight: 700;
                line-height: 1.6;
                text-align: center;
                text-transform: uppercase;
            }

            button:hover .circle {
                width: 100%;
            }

            button:hover .circle .icon.arrow {
                background: #fff;
                transform: translate(1rem, 0);
            }

            button:hover .button-text {
                color: #fff;
            }
        </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Member
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-black text-xl font-bold  pb-6">Add Members</h2>


                    <form action="{{ url('/newmemberData')}}"  method="POST">
                        @csrf

                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Supervisor Email</th>
                            </tr>
                            </thead>
                            <tbody id="members-table-body">
                            <tr>
                                <td><input type="text" class="mname" name="members[0][name]"></td>
                                <td><input type="email" class="memail" name="members[0][email]"></td>
                                <td><input type="email" class="supervisor" name="members[0][supervisor]"></td>
                            </tr>

                            </tbody>
                        </table>


                            <button type="button" id="add-row-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2 hover:bg-blue-600">
                                <span>&#43;</span>
                                Add new Row
                            </button>
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 float-right">
                                Submit
                            </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#add-row-btn').click(function() {
                var newRow = `
                <tr>
                    <td><input type="text" class="mname" name="members[][name]"></td>
                    <td><input type="email" class="memail" name="members[][email]"></td>
                    <td><input type="text" class="supervisor" name="members[][supervisor]"></td>
                </tr>
            `;
                $('#members-table-body').append(newRow);
            });
        });
    </script>


</x-app-layout>
