<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	
	<title>{{title}}</title>
	<meta name="description" content="{{discription}}">
	<meta name="keywords" content="{{keywords}}">
	
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,400italic,500,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>    
	<link rel="stylesheet" type="text/css" media="all" href="css/main.css">
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
{{Метрика|simplehtml}}


    <div id="utils" class="hidden">
        <iframe name="transport" id="transport_frame"></iframe>
        <form class="ajaxfree" id="transport_form" method="post" enctype="multipart/form-data"  target="transport" action="/ajax/transport" accept-charset="utf-8">
            <input type="file" name="files" id="transportInput" accept="image/jpeg,image/gif,image/png"/>
        </form>
    </div>
    <div class="process_loader" id="process_loader"></div>

    

    <div id="body">

        <div class="header">
    <div class="center_side" id="head_center">


        
        
<!-- logo --> 
		<div class="head_link new_year logo "><i></i>{{лого}}</div>
<!-- // logo -->


<!-- navi -->
       {{Меню|simplehtml|tpl:menu_tpl|default:menu_default}}
<!-- // navi -->
        


        <div class="clearfix"></div>
    </div>

</div>

        <div class="main">
            
<div id="wrapper" class="clear">
    
    
        


    <div class="clearfix"></div>


    
                
    
    <div class="center_side">

    <div class="startup_page_right fl_r ">

        

        <div class="right_col_block">
    <h3 class="block_title">
                {{Отзывы потребителей|Text: Отзывы потребителей о напитке от алкогольной зависимости Алко Барьер разнообразны, но всех их объединяет то, что люди с помощью сыворотки вернулись к нормальной жизни без тяги к спиртному.}}
    </h3>

<!-- start review -->                                

<!-- // end review -->

<!-- start review -->                                
{{Отзывы|html}}
<!-- // end review -->
<h3 class="block_title">
                 {{Отзывы потребителей|Text: Отзывы потребителей об Alco Barrier сидетельствуют о том, что использовать напиток необходимо в случаях, когда алкогольная тяга оказывается сильнее человека. Пора покончить с ней!}}
    </h3>

            
            
            
            
        </div>                    <div class="right_col_block mt30">
    <center><div class="block_title">{{Заказать напиток сыворотку|Text:Заказать напиток-сыворотку от алкоголизма Alco Barrier}}</div> </center>
    <div class="content" style="text-align: center; font-size: 20px;">
        
       <noindex> <a href="{{url}}" style="text-decoration: none;"></noindex>
	        {{купить со скидкой}}
	        <img src="images/discount.png" alt="" title="" style="max-width: 100%; margin: 15px 0 0 0;" />
        </a>
        
    </div>
</div>                <div class="injector right_col_block mt30" data-injection="/Ajax/getBlockJobs?type=1&companyId=1672" data-loader-class="none"></div>
        
        
            </div>

    <div class="r_col">

            <div class="startup_about l_col_block p_rel">

                <h3 class="block_title">
             {{отказаться от пагубной привычки}}
                                    </h3>

                                    <div class="l_col_block_content b_body clear">
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
 
                           
<h1>{{Заголовок}}</h1>   
<br>                        
{{Описание|html}}

<h2 id="4">Отзывы от специалистов</h2>
                           
<a name="4"></a>
{{Отзывы от специалистов|simplehtml|tpl:spec}}

                   
                                        </div>
                    
               
<div class="injector l_col_block_content startup_press" data-injection="/startup/html/block-articles" data-loader-class="none"></div>
            </div>
        </div>
</div>
</div>


        </div>

    </div>
    <div class="site_footer">
    <div class="center_side">
        <div class="m0_30">
          
            <div class="fl_l logo">
                <div class="name">{{текст ссылки}}

</div>
                <div class="desc">{{футер}}</div>
            </div>
        </div>
    </div>
</div>

    



    </body>
</html>
