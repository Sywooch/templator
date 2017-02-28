<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>{{title|text:Maxisize}}</title>
	<meta name="description" content="{{discription|text}}">
	<meta name="keywords" content="{{keywords|text}}">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/mobile.css" rel="stylesheet">
	{{код метрики|simplehtml}}
	{{Мета для google|simplehtml|tpl:meta_google_tpl|default:meta_google_tpl}}
</head>

<body>
<!--header-->
<div class="header">
	<div class="header__top">
		<div class="container clearfix">
			<div class="official__link">
				<a href="#"><span>официальный</span> сайт</a>
			</div>
			<div class="header__order">
				{{Кнопка в хедере|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
			<div class="official__tel">
				{{Телефон|simplehtml|tpl:phone_tpl|default:phone_tpl}}
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header__middle">
		<div class="container clearfix">
			<div class="logo">
				<h1>{{Название продукта|text:Maxisize}}</h1>
			</div>
			<div class="menu__nav" id="menu">
				<ul>
					{{Меню|simplehtml|tpl:menu_tpl|default:menu_tpl}}
					<div class="clear"></div>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="social">
				<div class="social__menu">
					<ul>
						{{Социальные кнопки|simplehtml|tpl:social_tpl|default:social_tpl}}
						<div class="clear"></div>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!--header end-->

<div class="cream">
	<div class="container">
		<div class="cream__image">
			<div class="product">
				<img src="images/product.png" alt="">
			</div>
		</div>
		<div class="cream__title">
			<h3>{{Заголовок1 рядом с ценой|text:оригинальный товар}}</h3>
			<h2>{{Заголовок2 рядом с ценой|text:Крем для увеличения члена}}</h2>
			<div class="cream__order">
				{{Кнопка рядом с товаром|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
			<div class="cream__price">
				<div class="price_main">{{Цена|text:990 руб}}</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="container main_content">
	<!--left side-->
	<div class="left_side">
		<div class="reviews">
			{{Отзывы слева|html|tpl:feedback_left_tpl|default:feedback_left_tpl}}
		</div>
		<!--block left sale-->
		<div class="cream__left">
			<div class="sale">
				<div class="product_two">
					<img src="images/product2.png" alt="">
				</div>
			</div>
			{{Скидка|html|tpl:discount|default:discount}}
			<div class="cream__left-order">
				{{Кнопка рядом со скидкой|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
		</div>
		<!--block left sale end-->
	</div>
	<!--left side end-->
	<!--right side-->
	<div class="right_side">
		<!--block left reviews-->
		<div class="description__right">
			{{Основной блок|html|tpl:main_block_tpl|default:main_block_tpl}}
		</div>
		<!--block left reviews end-->
		<!--block right doctors-->
		<div class="review-doctors">
			{{Отзывы специалистов|html|tpl:specialist_feedback_tpl|default:specialist_feedback_tpl}}
		</div>
		<!--block right doctors end-->
	</div>
	<!--right side end-->
	<div class="clear"></div>
</div>
<!--block footer-->
<div class="footer">
	<div class="container clearfix">
		<div class="footer__logo">
            <h1>{{Название продукта футер|text:Maxisize}}</h1>
		</div>
		<div class="footer__order">
			{{Кнопка рядом в футере|simplehtml|tpl:button_tpl|default:button_tpl}}
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--block footer  end-->
</body>

</html>