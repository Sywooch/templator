<!DOCTYPE html>
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>{{title}}</title>
    <meta name="description" content="{{description}}">
    <meta name="keywords" content="{{keywords}}">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>

<body>
    {{Метрика}}

    <div id="holder">
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Page -->
            <div id="drop-shadow">
                <!-- Shell -->
                <div class="shell">
                    <!-- Header -->
                    <div id="header">
                        <img src="images/11.png" id="logoh">

                    </div>
                    <!-- END Header -->

                    <!-- Wrapper-top -->
                    <div id="wrapper-top"></div>
                    <!-- END Wrapper-top -->
                    <!-- Wrapper-middle -->
                    <div id="wrapper-middle">
                        <!-- Navigation -->
                        <div id="navigation">
                            <ul>
                                {{Меню|simplehtml|default:menu_default|tpl:menu_tpl}}
                            </ul>
                            <div id="social">

                            </div>
                        </div>
                        <!-- END Navigation -->

                        <!-- Main -->
                        <div id="main">
                            <div id="content">
                                <div class="top-block-cont">
                                    {{Текст|html}}
                                </div>
                            </div>
                        </div>
                        <div id="sidebar">

                            <div style="padding: 10px 10px 0 0; text-align: center;">
                                <noindex>
                                    <a href="{{url}}">
                                        <img src="images/skidka.png" style="max-width: 100%;">

                                        <img src="images/buy-maxi-lash.png" style="max-width: 100%;" />
                                    </a>
                                </noindex>
                            </div>

                            <h2>Отзывы покупателей</h2>
                            {{Отзывы|simplehtml|tpl:opinion}}
                            <br>

                        </div>
                    </div>



                    <!-- END Sidebar -->

                </div>
                <!-- END Main -->
            </div>
            <!-- END Wrapper-middle -->

        </div>
        <div class="footer">
            {{Футер}}
        </div>
    </div>
</body>

</html>
