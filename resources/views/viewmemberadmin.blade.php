<x-app-layout>
    <style>
        .radio-input {
            display: flex;
            flex-direction: row;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 16px;
            font-weight: 600;
        }

        .radio-input input[type="radio"] {
            display: none;
        }

        .radio-input label {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #FFFFFF;
            border-radius: 5px;
            margin-right: 12px;
            cursor: pointer;
            position: relative;
            padding: 25px;
            width: 60px;
            transition: all 0.3s ease-in-out;
            height: 60px;
        }

        .radio-input label:before {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 0;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #ccc;
            transition: all 0.3s ease-in-out;
        }

        .radio-input input[type="radio"]:checked + label:before {
            background-color: green;
            top: 0;
        }

        .radio-input input[type="radio"]:checked + label {
            background-color: royalblue;
            color: #fff;
            border-color: rgb(129, 235, 129);
            animation: radio-translate 0.5s ease-in-out;
        }

        @keyframes radio-translate {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateX(0);
            }
        }

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
        <h2 class="text-xl text-gray-800 leading-tight">
            View for <b>{{$user_main_data->name}}</b> - SuperVisor: <b>{{$user_main_data->uname}}</b>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="p-4 font-bold text-2xl">Times Edited:</p>

    <div class="radio-input">
    @foreach($data as $data_s)
            <input type="radio" id="value-{{$data_s->step}}" name="value-radio" value="value-{{$data_s->step}}">
            <label id="label-{{$data_s->step}}" for="value-{{$data_s->step}}">{{$data_s->step}}</label>

    @endforeach
    </div>
    @foreach($data as $data_v)
            <div id="data-{{$data_v->step}}" class="hidden datas">


                <table>
                    <tr class="header-row" style="background: black;color: white">
                        <th>Section</th>
                        <th>Module</th>
                        <th>Hours</th>
                        <th>Input</th>
                        <th></th>
                        <th >Result</th>
                    </tr>
                    <tr class="header-row" style="background: none">
                        <th></th>
                    </tr>
                </table>

                <table>
                    <tr class="header-row">
                        <th>Teaching Load</th>
                    </tr>
                    <div>
                        <tr>
                            <td></td>
                            <td>Per course (Conventional)</td>
                            <td id="perCourseConv">78</td>

                            <td class="calculate-cell">
                                <input type="number" id="input_perCourseConv">
                                <button type="button" class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"  id="calc_perCourseConv">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_perCourseConv" disabled class="result-input">
                            </td>
                            <script>

                                $("#calc_perCourseConv").click(function(){
                                    var metabliti = Number($("#perCourseConv").html())
                                    var input = Number($("#input_perCourseConv").val())
                                    var result = metabliti * input;
                                    $("#result_perCourseConv").val(result)

                                });
                            </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Student feedback</td>
                            <td id="stdfeed">0.5</td>
                            <td class="calculate-cell">
                                <input type="number" id="input_stdfeed">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_stdfeed">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_stdfeed" disabled class="result-input">
                            </td>
                            <script>

                                $("#calc_stdfeed").click(function(){
                                    var metabliti = Number($("#stdfeed").html())
                                    var input = Number($("#input_stdfeed").val())
                                    var result = metabliti * input;
                                    $("#result_stdfeed").val(result)

                                });
                            </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Per course (Distance)</td>
                            <td id="perCourseDist">39</td>
                            <td class="calculate-cell">
                                <input type="number" id="input_perCourseDist">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_perCourseDist">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_perCourseDist" disabled class="result-input">
                            </td>
                            <script>

                                $("#calc_perCourseDist").click(function(){
                                    var metabliti = Number($("#perCourseDist").html())
                                    var input = Number($("#input_perCourseDist").val())
                                    var result = metabliti * input;
                                    $("#result_perCourseDist").val(result)

                                });
                            </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Thesis (undergraduate)</td>
                            <td id="thesisUnder">30</td>
                            <td class="calculate-cell">
                                <input type="number" id="input_thesisUnder">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_thesisUnder">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_thesisUnder" disabled class="result-input">
                            </td>

                            <script>

                                $("#calc_thesisUnder").click(function(){
                                    var metabliti = Number($("#thesisUnder").html())
                                    var input = Number($("#input_thesisUnder").val())
                                    var result = metabliti * input;
                                    $("#result_thesisUnder").val(result)

                                });
                            </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Thesis (postgraduate)</td>
                            <td id="thesisPost">40</td>
                            <td class="calculate-cell">
                                <input type="number" id="input_thesisPost">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_thesisPost">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_thesisPost" disabled class="result-input">
                            </td>


                            <script>

                                $("#calc_thesisPost").click(function(){
                                    var metabliti = Number($("#thesisPost").html())
                                    var input = Number($("#input_thesisPost").val())
                                    var result = metabliti * input;
                                    $("#result_thesisPost").val(result)

                                });
                            </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Office Hours</td>
                            <td id="oh">104</td>

                            <td class="calculate-cell">
                                <input type="number" id="input_oh">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_oh">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_oh" disabled class="result-input">
                            </td>


                            <script>

                                $("#calc_oh").click(function(){
                                    var metabliti = Number($("#oh").html())
                                    var input = Number($("#input_oh").val())
                                    var result = metabliti * input;
                                    $("#result_oh").val(result)

                                });
                            </script>
                        </tr>
                    </div>
                </table>

                <table>
                    <tr class="header-row">
                        <th>Administrative duties</th>
                    </tr>

                    <div>
                        <tr>
                            <td></td>
                            <td>Program Coordinator</td>
                            <td id="programCord">128</td>

                            <td class="calculate-cell">
                                <input type="number" id="input_programCord">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_programCord">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_programCord" disabled class="result-input">
                            </td>
                            <script>

                                $("#calc_programCord").click(function(){
                                    var metabliti = Number($("#programCord").html())
                                    var input = Number($("#input_programCord").val())
                                    var result = metabliti * input;
                                    $("#result_programCord").val(result)

                                });
                            </script>
                        </tr>

                        <tr>
                            <td></td>
                            <td>Head of a Department</td>
                            <td id="headDept">138</td>

                            <td class="calculate-cell">
                                <input type="number" id="input_headDept">
                                <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_headDept">Calculate</button>
                            </td>
                            <td>
                                <input type="number" id="result_headDept" disabled class="result-input">
                            </td>
                            <script>

                                $("#calc_headDept").click(function(){
                                    var metabliti = Number($("#headDept").html())
                                    var input = Number($("#input_headDept").val())
                                    var result = metabliti * input;
                                    $("#result_headDept").val(result)

                                });
                            </script>
                        </tr>
                    </div>
                </table>
                <table>
                    <tr class="header-row">
                        <th>Marketing Activities</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Newspaper Article</td>
                        <td id="newspaper">10</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_newspaper">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_newspaper">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_newspaper" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_newspaper").click(function(){
                                var metabliti = Number($("#newspaper").html())
                                var input = Number($("#input_newspaper").val())
                                var result = metabliti * input;
                                $("#result_newspaper").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>School Visits</td>
                        <td id="schoolVisits">10</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_schoolVisits">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_schoolVisits">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_schoolVisits" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_schoolVisits").click(function(){
                                var metabliti = Number($("#schoolVisits").html())
                                var input = Number($("#input_schoolVisits").val())
                                var result = metabliti * input;
                                $("#result_schoolVisits").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Exhibitions</td>
                        <td id="exhibitions">20</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_exhibitions">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_exhibitions">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_exhibitions" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_exhibitions").click(function(){
                                var metabliti = Number($("#exhibitions").html())
                                var input = Number($("#input_exhibitions").val())
                                var result = metabliti * input;
                                $("#result_exhibitions").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Presentations etc</td>
                        <td id="presentations">20</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_presentations">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_presentations">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_presentations" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_presentations").click(function(){
                                var metabliti = Number($("#presentations").html())
                                var input = Number($("#input_presentations").val())
                                var result = metabliti * input;
                                $("#result_presentations").val(result)

                            });
                        </script>
                    </tr>
                </table>
                <table>
                    <tr class="header-row">
                        <th>Research Activities</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Preparing a Proposal</td>
                        <td id="proposal">400</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_proposal">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_proposal">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_proposal" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_proposal").click(function(){
                                var metabliti = Number($("#proposal").html())
                                var input = Number($("#input_proposal").val())
                                var result = metabliti * input;
                                $("#result_proposal").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Q1 Journal Article</td>
                        <td id="q1">250</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_q1">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_q1">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_q1" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_q1").click(function(){
                                var metabliti = Number($("#q1").html())
                                var input = Number($("#input_q1").val())
                                var result = metabliti * input;
                                $("#result_q1").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Q2 Journal Article</td>
                        <td id="q2">200</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_q2">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_q2">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_q2" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_q2").click(function(){
                                var metabliti = Number($("#q2").html())
                                var input = Number($("#input_q2").val())
                                var result = metabliti * input;
                                $("#result_q2").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Q3 or Q4 Article</td>
                        <td id="q3">180</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_q3">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_q3">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_q3" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_q3").click(function(){
                                var metabliti = Number($("#q3").html())
                                var input = Number($("#input_q3").val())
                                var result = metabliti * input;
                                $("#result_q3").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Conference Article</td>
                        <td id="confArticle">150</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_confArticle">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_confArticle">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_confArticle" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_confArticle").click(function(){
                                var metabliti = Number($("#confArticle").html())
                                var input = Number($("#input_confArticle").val())
                                var result = metabliti * input;
                                $("#result_confArticle").val(result)

                            });
                        </script>
                    </tr>
                </table>
                <table>
                    <tr class="header-row">
                        <th>Other Activities</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Study Guide</td>
                        <td id="studyGuide">150</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_studyGuide">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_studyGuide">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_studyGuide" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_studyGuide").click(function(){
                                var metabliti = Number($("#studyGuide").html())
                                var input = Number($("#input_studyGuide").val())
                                var result = metabliti * input;
                                $("#result_studyGuide").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Moodle Page Preparation</td>
                        <td id="moodle_pagePrep">10</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_moodle_pagePrep">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_moodle_pagePrep">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_moodle_pagePrep" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_moodle_pagePrep").click(function(){
                                var metabliti = Number($("#moodle_pagePrep").html())
                                var input = Number($("#input_moodle_pagePrep").val())
                                var result = metabliti * input;
                                $("#result_moodle_pagePrep").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Update Study Guide</td>
                        <td id="updStudyGuide">20</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_updStudyGuide">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_updStudyGuide">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_updStudyGuide" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_updStudyGuide").click(function(){
                                var metabliti = Number($("#updStudyGuide").html())
                                var input = Number($("#input_updStudyGuide").val())
                                var result = metabliti * input;
                                $("#result_updStudyGuide").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Participation in Accreditation</td>
                        <td id="participation">30</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_participation">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_participation">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_participation" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_participation").click(function(){
                                var metabliti = Number($("#participation").html())
                                var input = Number($("#input_participation").val())
                                var result = metabliti * input;
                                $("#result_participation").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Preparing Accreditation Documents</td>
                        <td id="preparing">200</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_preparing">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_preparing">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_preparing" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_preparing").click(function(){
                                var metabliti = Number($("#preparing").html())
                                var input = Number($("#input_preparing").val())
                                var result = metabliti * input;
                                $("#result_preparing").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Preparing new program</td>
                        <td id="preparingProg">200</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_preparingProg">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_preparingProg">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_preparingProg" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_preparingProg").click(function(){
                                var metabliti = Number($("#preparingProg").html())
                                var input = Number($("#input_preparingProg").val())
                                var result = metabliti * input;
                                $("#result_preparingProg").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Courses Recognitions (new students)</td>
                        <td id="courseRecogn">0.5</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_courseRecogn">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_courseRecogn">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_courseRecogn" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_courseRecogn").click(function(){
                                var metabliti = Number($("#courseRecogn").html())
                                var input = Number($("#input_courseRecogn").val())
                                var result = metabliti * input;
                                $("#result_courseRecogn").val(result)

                            });
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Administration (overall)</td>
                        <td id="admin">52</td>

                        <td class="calculate-cell">
                            <input type="number" id="input_admin">
                            <button class="calculate-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button"   id="calc_admin">Calculate</button>
                        </td>
                        <td>
                            <input type="number" id="result_admin" disabled class="result-input">
                        </td>
                        <script>

                            $("#calc_admin").click(function(){
                                var metabliti = Number($("#admin").html())
                                var input = Number($("#input_admin").val())
                                var result = metabliti * input;
                                $("#result_admin").val(result)

                            });
                        </script>
                    </tr>
                </table>
                <button type="button" id="calcall"
                        class="text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 float-left">
                    Calculate All
                </button>
                <input name="data" id="data" value="{{$data_v->data}}" class="hidden">

                <button type="submit" id="submit"
                        class="text-green-500 border border-green500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 float-right">
                    Update
                </button>
            </div>
    @endforeach


            </div>
        </div>
    </div>
    </div>
    <script>
        $('*[id*=label-]').each(function() {
            $(this).click(function() {
                var showid =  $(this).attr("id").replace("label", "data")
                $(".datas").hide()
                $("#"+showid).show()
            })
        });

        $("#submit").mouseenter(function () {
            jsonObj = [];
            $(".calculate-cell input").each(function () {

                var id = $(this).attr("id");
                var value =  $(this).val();

                item = {}
                item ["id"] = id;
                item["val"] = value;

                jsonObj.push(item);
            });
            jsonString = JSON.stringify(jsonObj);
            $("#data").val(jsonString);
        });

        var jsonString =  $("#data").val();
        jsonString = jsonString.replace(/&quot;/g, '"');

        jsonDecode = JSON.parse(jsonString);

        $.each( jsonDecode, function(i, obj) {

            $('#'+obj.id).val(obj.val)
        });
        $(".calculate-button ").trigger("click");

        $("#calcall").click(function () {
            $(".calculate-button ").trigger("click");
        })

    </script>
</x-app-layout>
