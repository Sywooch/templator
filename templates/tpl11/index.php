<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>{{Заголовок}}</title>
	<meta name="description" content="{{discription|text}}">
	<meta name="keywords" content="{{keywords|text}}">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/mobile.css" rel="stylesheet">
	{{код метрики|simplehtml}}
</head>

<body itemscope="" itemtype="http://schema.org/Product">
<!--header-->
<div class="header">
	<div class="header__top">
		<div class="container">
			<a href="" class="official__link"><span>официальный</span> сайт</a>
			{{телефон|text|tpl:phone|default:phone}}

			<div class="clear"></div>
		</div>
	</div>
	<div class="header__middle">
		<div class="container clearfix">
			<div class="logo">
				<h1 itemprop="name">{{товар|text:Maxisize}}</h1>
				<h3 itemprop="description">{{описание товара|text:крем для увеличения члена}}</h3>
			</div>
			<div class="header__order">
				{{Кнопка сверху|text|tpl:button|default:button}}
			</div>

			<div class="clear"></div>
		</div>

		<div class="clear"></div>
	</div>
	<div class="header__nav">
		<div class="container">
			<div class="menu__nav" id="menu">
				<ul>
					{{Меню|simplehtml|tpl:menu_tpl|default:menu_tpl}}
				</ul>
			</div>
			<div class="social clearfix">
				<h2>{{Заголовок перед социальными кнопками|text:поделитесь}}</h2>
				<div class="social__menu">
					<ul>
						{{Социальные кнопки|simplehtml|tpl:social|default:social}}
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<!--header end-->
<div class="container">
	<!--block product-->

	<div class="cream">
		<div class="cream__image">
			<img src="images/product.png" alt="">
		</div>
		<div class="cream__title">
			{{Заголовок рядом с ценой|html|tpl:title_near_image_tpl|default:title_near_image_tpl}}
			<div class="cream__order">
				{{Кнопка посередине|text|tpl:button|default:button}}
			</div>
            {{Блок с ценой|simplehtml|tpl:price_tpl|default:price_tpl}}
		</div>

		<div class="clear"></div>
	</div>
	<!--block product end-->

	<!--block right reviews-->
	<div class="description__left">
		{{основной блок|html|tpl:main_block|default:main_block}}
	</div>
	<div class="reviews" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
		<meta itemprop="ratingValue" content="{{meta ratingValue|text:4.5}}"/>
		<meta itemprop="bestRating" content="{{meta bestRating|text:5}}">
		<meta itemprop="ratingCount" content="{{meta ratingCount|text:296}}"/>
		{{отзывы справа|html|tpl:feedback2|default:feedback2}}
	</div>
	<!--block right reviews end-->

	<div class="clear"></div>

	<!--block left doctors-->
	<div class="review-doctors">
		{{Отзывы специалистов|html|tpl:specialist_feedback_tpl|default:specialist_feedback_tpl}}
	</div>
	<!--block left doctors end-->

	<!--block right sale-->
	<div class="cream__right">
		<div class="product_two">
			<img src="images/product2.png" alt="">
		</div>
		{{Текст под отзывами справа|html|tpl:under_feedback2|default:under_feedback2}}
		<div class="cream__right-order">
			{{Кнопка справа|text|tpl:button|default:button}}
		</div>
	</div>
	<!--block right sale end-->

	<div class="clear"></div>
</div>
<!--block footer-->
<div class="footer">
	<div class="container clearfix">
		<div class="footer__logo">
			<h2>{{Заголовок в футере|text:MAXISIZE}}</h2>
			<p>{{описание в футере|text:официальный сайт}}</p>
		</div>
		<div class="footer__order">
			{{Кнопка в футере|text|tpl:button|default:button}}
		</div>

		<div class="clear"></div>
	</div>
</div>
</body>

</html>
