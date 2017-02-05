<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>{{title|text:Maxisize}}</title>
	<meta name="description" content="{{discription|text}}">
	<meta name="keywords" content="{{keywords|text}}">
	<link href="css/style.css" rel="stylesheet">
	{{код метрики|simplehtml}}
</head>

<body>
<!--header-->
<div class="header">
	<div class="header__top">
		<div class="container clearfix">
			<div class="social">
				<div class="social__menu">
					<ul>
						{{Социаильные кнопки|simplehtml|tpl:social_tpl|default:social_tpl}}
					</ul>
				</div>
			</div>
			<div class="header__order">
				{{Кнопка сверху|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header__middle">
		<div class="container clearfix">
			<div class="logo">
				<h1>{{Заголовок|text:Maxisize}}</h1>
			</div>
			<div class="menu__nav">
				<ul>
					{{Меню|simplehtml|tpl:menu_tpl|default:menu_tpl}}
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--header end-->
<div class="container">
	<div class="cream">
		<div class="cream__image">
			<img src="images/product.png" alt="">
		</div>
		<div class="cream__title">
			{{Заголовок рядом с ценой|html|tpl:title_near_image_tpl|default:title_near_image_tpl}}
			<div class="cream__order">
				{{Кнопка рядом с картинкой|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
			<div class="cream__price">
				<div class="price_main">{{Цена|text:990 руб}}</div>
			</div>
		</div>
		<div class="sale">
			<img src="images/sale-bg.png" alt="">
		</div>
		<div class="clear"></div>
	</div>
	<!--left side-->
	<div class="left_side">
		<div class="reviews">
			{{Отзывы слева|html|tpl:left_feedback_tpl|default:left_feedback_tpl}}
		</div>
		<!--block left sale-->
		<div class="cream__left">
			<div class="bow">
				<img src="images/bow.png" alt="">
			</div>
			<div class="product_two">
				<img src="images/product2.png" alt="">
			</div>
			{{Блок со скидкой|html|tpl:discont_description_tpl|default:discont_description_tpl}}
			<div class="cream__left-order">
				{{Кнопка рядом со скидкой|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
		</div>
		<!--block left sale end-->
	</div>
	<!--left side end-->
	<!--right side-->
	<!--block left reviews-->
	<div class="description__right">
		{{Основной блок|html|tpl:main_block_tpl|default:main_block_tpl}}
	</div>
	<!--block left reviews end-->
	<!--block right doctors-->
	<div class="review-doctors">
		{{Отзывы от специалистов|html|tpl:specialists_feedback_tpl|default:specialists_feedback_tpl}}
	</div>
	<!--block right doctors end-->
	<!--right side end-->
	<div class="clear"></div>

</div>
<!--block footer-->
<div class="footer">
	<div class="container clearfix">
		<div class="footer__logo">
			<h2>{{Заголовок в футере|text:Maxisize}}</h2>
		</div>
		<div class="footer__order">
			{{Кнопка в футере|simplehtml|tpl:button_tpl|default:button_tpl}}
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--block footer  end-->
</body>

</html>
