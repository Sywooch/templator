<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>{{title}}</title>
	<meta name="description" content="{{Meta Description}}">
	<meta name="keywords" content="{{Meta Keywords}}">
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
{{Метрика|simplehtml}}

<div id="turmaprost"> <!-- main block -->
	<div id="leftmenu"> <!-- leftmenu -->
		<ul>
			{{Левое меню|tpl:menu_li|default:menu_default|simplehtml|order:5}}
		</ul>
	</div> <!-- # leftmenu -->
	
	<div id="rightcontent"> <!-- rightcontent -->
		<div id="enter" style="margin: 15px 0 0 0;"> <!-- enter -->
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
			<div class="line1"><a name="product"></a><h1>{{Заголовок|order:4}}</h1></div>
			<div class="line2"><p>{{Описание|html}}</p></div>
		</div> <!-- # enter -->

		{{Текст|html}}

        <a name="vrach"></a>
        <div class="vrach">
	        {{Что говорят специалисты?|default:vrach|simplehtml}}
        </div>
		
		<div id="comments"><!-- comments -->
			<a name="otzyvy"></a><div class="title">Отзывы покупателей</div>
			{{Отзывы|tpl:opinion|simplehtml}}
		</div><!-- # comments -->
		
		<a name="buy"></a>
		<div class="buylnk"><a href="{{url}}" id="buy">
        	{{Текст ссылки|text:КУПИТЬ ТРУСЫ С ТУРМАЛИНОМ<br> НА ОФИЦИАЛЬНОМ САЙТЕ}}
        </a></div>
		
		<div id="footer"> <!-- footer -->
        	{{Футер|text:© 2015 Трусы с турмалином TURMAPROST, Официальный представитель}}
		</div> <!-- # footer -->		
	</div> <!-- # rightcontent -->
</div> <!-- # main block -->



</body>
</html>
