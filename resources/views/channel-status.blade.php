@extends('layouts.app2')

@section('content')
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .table th,
        .table td {
            border-top: none;
            border-bottom: 1px solid #dee2e6;
        }

        td > div {
            white-space:nowrap;
            display: inline-block;
            min-width: 86px;
        }
    </style>

    <section id="about">
        <div class="container">
            <div class="row">
                <!-- channel status -->
                <div class="col-lg-2 mb-4">

                </div>
                <div class="col-lg-8 mb-4">
                    <h2 id="serverName"></h2>

                    <!-- Tab links -->
                    <div class="tab">
                        <button class="tablinks" onclick="openPage(event, '3row')">3欄式</button>
                        <button class="tablinks" onclick="openPage(event, '1row')">1欄式</button>
                    </div>

                    <div id="3row" class="tabcontent">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><div>Channel 1 </div><i class="fas fa-circle text-danger px-4 channel_1"></i></td>
                                <td><div>Channel 2 </div><i class="fas fa-circle text-danger px-4 channel_2"></i></td>
                                <td><div>Channel 3 </div><i class="fas fa-circle text-danger px-4 channel_3"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 4 </div><i class="fas fa-circle text-danger px-4 channel_4"></i></td>
                                <td><div>Channel 5 </div><i class="fas fa-circle text-danger px-4 channel_5"></i></td>
                                <td><div>Channel 6 </div><i class="fas fa-circle text-danger px-4 channel_6"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 7 </div><i class="fas fa-circle text-danger px-4 channel_7"></i></td>
                                <td><div>Channel 8 </div><i class="fas fa-circle text-danger px-4 channel_8"></i></td>
                                <td><div>Channel 9 </div><i class="fas fa-circle text-danger px-4 channel_9"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 10 </div><i class="fas fa-circle text-danger px-4 channel_10"></i></td>
                                <td><div>Channel 11 </div><i class="fas fa-circle text-danger px-4 channel_11"></i></td>
                                <td><div>Channel 12 </div><i class="fas fa-circle text-danger px-4 channel_12"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 13 </div><i class="fas fa-circle text-danger px-4 channel_13"></i></td>
                                <td colspan=2><div class="connect-message">Unconnected</div><i class="fas fa-circle text-danger px-4 connect-light"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="1row" class="tabcontent">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><div>Channel 1 </div><i class="fas fa-circle text-danger px-4 channel_1"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 2 </div><i class="fas fa-circle text-danger px-4 channel_2"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 3 </div><i class="fas fa-circle text-danger px-4 channel_3"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 4 </div><i class="fas fa-circle text-danger px-4 channel_4"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 5 </div><i class="fas fa-circle text-danger px-4 channel_5"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 6 </div><i class="fas fa-circle text-danger px-4 channel_6"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 7 </div><i class="fas fa-circle text-danger px-4 channel_7"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 8 </div><i class="fas fa-circle text-danger px-4 channel_8"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 9 </div><i class="fas fa-circle text-danger px-4 channel_9"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 10 </div><i class="fas fa-circle text-danger px-4 channel_10"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 11 </div><i class="fas fa-circle text-danger px-4 channel_11"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 12 </div><i class="fas fa-circle text-danger px-4 channel_12"></i></td>
                            </tr>
                            <tr>
                                <td><div>Channel 13 </div><i class="fas fa-circle text-danger px-4 channel_13"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="connect-message">Unconnected</div><i class="fas fa-circle text-danger px-4 connect-light"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-lg-2 mb-4">

                </div>
            </div>

        </div>
    </section>

    <script type="text/javascript">
        init();

        var url_string = window.location.href;
        var url = new URL(url_string);
        var channel = url.searchParams.get("channel");
        var ws;
        var task;

        channelLang = {"Bebhinn": "貝婷", "Alissa": "愛麗莎", "Nao": "娜歐" };
        document.getElementById("serverName").innerText = channel + ' - ' + channelLang[channel]

        document.getElementById("3row").style.display = "block";

        function init() {
            // Connect to Web Socket
            ws = new WebSocket("wss://mabi-websocket.herokuapp.com/channelStatus");
            // Set event handlers.
            ws.onopen = function (e) {
                $(".connect-message").text('Connect');
                $(".connect-light").removeClass(["text-danger", "text-warning"]);
                $(".connect-light").addClass("text-success");
                checkChannel()
                // console.log(e.data)
            };
            ws.onmessage = function (e) {

                try {
                    data = JSON.parse(e.data);
                } catch (e) {
                    return false;
                }

                if (data['job'] == 'channelStatus') {
                    updateStatus(data['chennel'])
                }

            };
            ws.onclose = function () {
                // console.log("連線中斷")
                $(".connect-message").text('Connect Fail')
                $(".connect-light").removeClass(["text-danger", "text-success"])
                $(".connect-light").addClass("text-warning")
            };
            ws.onerror = function (e) {
                updateStatus([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0])
                $(".connect-message").text('Connect Error')
                $(".connect-light").removeClass(["text-warning", "text-success"])
                $(".connect-light").addClass("text-danger")
            };
        }

        function checkChannel() {

            //console.log(channel);

            data = {
                job: "channelStatus",
                server: channel
            };

            if (ws.readyState === WebSocket.CLOSED) {
                // console.log("reconnect server")
                $(".connect-message").text('Reconnect...')
                clearTimeout(task);
                init();
                return
            }
            // console.log("send job")
            ws.send(JSON.stringify(data));

            task = setTimeout(checkChannel, 60000);
        }

        function updateStatus(data) {
            for (var i = 0; i < data.length; i++) {
                var ids = ".channel_" + (i + 1);

                $(ids).removeClass(["text-danger", "text-success"])
                if (data[i] == 1) {
                    $(ids).addClass("text-success")
                } else {
                    $(ids).addClass("text-danger")
                }
            }
        }

        function openPage(evt, pageName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(pageName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
