<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>{{Заголовок}}</title>
	<meta name="description" content="{{discription}}">
	<meta name="keywords" content="{{keywords}}">
	
	 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter31405318 = new Ya.Metrika({
                    id:31405318,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/31405318" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



<div id="turmaprost"> <!-- main block -->
	
	<div id="leftmenu"> <!-- leftmenu -->
		
		<ul>
			 {{Меню|simplehtml|tpl:menu_tpl|default:menu_default}}
		</ul>
		
	</div> <!-- # leftmenu -->
	
	<div id="rightcontent"> <!-- rightcontent -->
		

		
		<div id="enter" style="margin: 15px 0 0 0;"> <!-- enter -->
			<div class="line1"><a name="product"></a><h1>{{Заголовок}}</h1></div>
			
			<div class="line2"><p>{{Описание|html}}</p></div>

		</div> <!-- # enter -->

		


<noindex><p><a href="{{url}}"><img style="display: block; margin-left: auto; margin-right: auto;" title="Заказать Алкобарьер" src="images/2.jpg" alt="Заказать Алкобарьер" /></a></p></noindex>
<div class="line2"><p>{{Текст|html}}</p></div>

 







<h2 id="otzyvy">Отзывы о препарате</h2>
<p>{{Отзывы о товаре|Text:Отзывы об Alco Barrier свидетельствуют о неоценимой пользе данного препарата}}</p>

<div id="comments">
<div class="title">{{Мнения людей|Text:Какие мнения у людей об АлкоБарьере?}}</div>
			
		{{Отзывы|simplehtml|tpl:opinion}}
			
</div>
<br>
<h2>{{Мнение специалистов-врачей|Text:Мнение специалистов-врачей об АлкоБарьере}}</h2>
<p>{{Отзывы врачей|Text:Отзывы врачей об Alco Barrier – еще одно явное подтверждение эффективности напитка}}</p>
<div class="vrach">
	<div class="title">{{Имя врача}}</div>
<div class="img"><img src="images/vrach.png" alt="{{Имя врача}}" title="{{Имя врача}}" /></div>




<p>{{Текст отзыва|html}}</p>
</div>








{{текст под отзывами|html}}










		<a name="buy"></a>
		<div class="buy">
		<noindex><a href="{{url}}">{{текст ссылки}}</a> </noindex>
		</div>
		

		
		<div id="footer"> <!-- footer -->
			&copy;{{футер}}
		</div> <!-- # footer -->
		
	</div> <!-- # rightcontent -->
	
</div> <!-- # main block -->

</body>
</html>	
