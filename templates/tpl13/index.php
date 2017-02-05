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
	<div class="header-container">
		<div class="header__top">
			<div class="container clearfix">
				<div class="official__link">
					{{Официальный сайт|simplehtml|tpl:button_oficial_tpl|default:button_oficial_tpl}}
				</div>
				<div class="menu__nav">
					<ul>
						{{Меню|simplehtml|tpl:menu_tpl|default:menu_tpl}}
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="header__middle">
			<div class="container clearfix">
				<div class="logo">
					{{Продукт под меню|html|tpl:product_under_menu_tpl|default:product_under_menu_tpl}}
				</div>
				<div class="clear"></div>
				<div class="official__tel">
					{{Телефон|simplehtml|tpl:phone_tpl|default:phone_tpl}}
				</div>
				<div class="header__order">
					{{Кнопка рядом с телефоноом|simplehtml|tpl:button_tpl|default:button_tpl}}
				</div>
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
</div>
<!--header end-->
<div class="container">
	<div class="cream">
		<div class="cream__image">
			<img src="images/product.png" alt="">
		</div>
		<div class="cream__title">
			{{Продукт рядом с ценой|html|tpl:product_near_price_tpl|default:product_near_price_tpl}}
			<div class="cream__order">
				{{Кнопка рядом с ценой|simplehtml|tpl:button_tpl|default:button_tpl}}
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
	<!--left side end-->
	<!--right side-->
	<div class="right_side">
		<div class="reviews">
			<ul>
				{{Отзывы справа|html|tpl:feedback_right_tpl|default:feedback_right_tpl}}
			</ul>
		</div>
		<!--block left sale-->
		<div class="cream__left">
			<div class="product_two">
				<img src="images/product2.png" alt="">
			</div>
			{{Скидка|simplehtml|tpl:discount_tpl|default:discount_tpl}}
			<div class="cream__left-order">
				{{Кнопка рядом со скидкой|simplehtml|tpl:button_tpl|default:button_tpl}}
			</div>
		</div>
		<!--block left sale end-->
	</div>
	<!--right side end-->
	<div class="clear"></div>
</div>
<!--block footer-->
<div class="footer">
	<div class="container clearfix">
		<div class="footer__logo">
			{{Продукт в футере|html|tpl:product_footer_tpl|default:product_footer_tpl}}
		</div>
		<div class="footer__order">
			{{Кнопка d aentht|simplehtml|tpl:button_tpl|default:button_tpl}}
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--block footer  end-->
</body>

</html>
