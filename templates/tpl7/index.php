

<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{Заголовок}}</title>
        <meta name="description" content="{{discription}}">
        <meta name="keywords" content="{{keywords}}">
       <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link media="all" rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        {{Метрика|simplehtml}}
        <div class="wrapper-hidden">
            <div class="wrapper">
                <header>
                    <div class="header-top">
                        <div class="header-left">
                            
                          
                            <div></div>
                        </div>
                        <div class="header-right">
                            <div class="wrap-right">
                                официальный сайт
                                <ul class="inline">
                                    
                                    <li>
                                        <noindex><a href="{{url}}" class="header-btn">
                                            заказать
                                            </a>
                                        </noindex>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <main>
                    <section>
                        <div class="block1">
                            <center> 
<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="transparent" data-options="big,square,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
 </center>
                            <div class="block1-wrap">
                                
                                <div class="block-text">
                                    {{описание товара|html}}
                                </div>
                                <div class="block1-help">
                                    <ul class="unstyled">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="block4">
                            <h2 id="4">Отзывы потребителей</h2>
                            <div class="block-text">
                                {{Отзывы потребителей|html}}
                            </div>
                            <h2>Отзывы от специалистов</h2>
                            <div class="block-text">
                                {{Отзывы специалистов|html}}
                            </div>
                        </div>
                        
                        
                    </section>
                    <aside>
                        <nav>
                            {{Меню|simplehtml|tpl:menu_tpl|default:menu_default|order:3}}
                        </nav>
                        <div class="banner">
                            <div class="banner-sleep">
                                <noindex><a href="{{url}}" class="banner-sleep-btn">
                                
                                    </a>
                                </noindex>
                                <img src="images/zakazik.jpg"  alt=""/>
                                <div class="banner-price">
                                    <span class="newprice"></span>
                                    <span class="curr"></span>
                                </div>
                            </div>
                        </div>
                    </aside>
                </main>
                <footer>
                    {{футер}}
                    
                </footer>
            </div>
        </div>
    </body>
</html>


