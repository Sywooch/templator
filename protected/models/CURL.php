<?php
/**
 * Работа с cURL
 */
namespace app\models;
use Yii;
 
class CURL 
{
	public $url = '',
		$post = array(),
		$referer = '',
		$headers = array(),
		$file = '',
		$json = false,
		$nohead = true,
		$proxy = '', //key for $_proxy
		$cookie = '',
		$encoding = 'gzip',
		$useragent = 'Mozilla/5.0 (Windows NT 6.3; rv:38.0) Gecko/20100101 Firefox/38.0',
		$timeout = 45,
		$debug = false,
		$keepcookie = false,
		$speed_limit = 51200, //50 kB/s
		$file_upload,
		$ssl = true;

	const POST_EMPTY = false;

	private $_proxy = array(
			'UA' => 'socks5://localhost:3000',
			//'RU' => 'socks5://localhost:3001',
		);

	function __destruct()
	{
		if(!$this->keepcookie AND !empty($this->cookie) AND file_exists($this->getcookiefile()))
			unlink($this->getcookiefile());
	}

	public function sendquery()
	{
	    if(!$this->file_upload)
		    if($this->json)
			    $fields = (is_array($this->post)) ? json_encode($this->post) : '';
		    else
			    $fields = (is_array($this->post)) ? http_build_query($this->post) : '';
        else
            $fields = $this->post;
            
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		if(empty($this->file) and !$this->nohead)
			curl_setopt($ch, CURLOPT_HEADER, 1);

		curl_setopt($ch, CURLOPT_USERAGENT, $this->useragent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		if($this->nohead)
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		if(!empty($this->encoding))
			curl_setopt($ch, CURLOPT_ENCODING, $this->encoding);

		if(is_array($this->headers))
			curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers); 			
		
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($ch, CURLOPT_REFERER, $this->referer);

		if(is_array($this->post) and count($this->post))
		{
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		}

		$cookie = $this->getcookiefile();

		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);  
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

		curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, $this->speed_limit);
		curl_setopt($ch, CURLOPT_MAX_SEND_SPEED_LARGE, $this->speed_limit);

		curl_setopt($ch, CURLINFO_HEADER_OUT, true);

		if(!$this->ssl)
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if(isset($this->_proxy[$this->proxy]))
			curl_setopt($ch, CURLOPT_PROXY, $this->_proxy[$this->proxy]);

		if(!empty($file))
		{
			$fp =fopen($file, 'w+b');
			curl_setopt($ch, CURLOPT_FILE, $fp);
		}

		$t = microtime(1);
		$c = curl_exec($ch);

        if(!$c)
            Yii::log(date('H:i:s d-m-Y')." ".$this->url." => ".curl_error($ch), 'error', 'curl');

		if($this->debug)
		{
			echo "<hr>";	
			echo curl_getinfo($ch, CURLINFO_HEADER_OUT);
			echo $fields;
			echo "<hr>";
		}

		curl_close($ch);
	
		if(!empty($file))
			fclose($fp);

		return $c;
	}

	public function getPemDirectory()
	{
		if(!empty($this->cookie))
			return Yii::app()->getRuntimePath().'/pem/';
		return '';
	}

	public function setcookie($stream, $parser)
	{
		$this->cookie = $parser.".".$stream;
	}

	public function getcookiefile()
	{
		if(!empty($this->cookie))
			return Yii::app()->getRuntimePath().'/cookies/'.$this->cookie.'.txt';
		return '';
	}

	public function getcookies()
	{
		if(!file_exists($this->getcookiefile()))
			return false;
	
		$cookies = file($this->getcookiefile());
	
		$return = array();
		foreach($cookies as $cookie)
		{
			$c = explode("\t", $cookie);
			if(count($c) > 5)
			{
				$return[$c[5]] = @$c[6];
			}
		}

		return $return;
	}
		
	public function clearcookies()
	{
		if(!file_exists($this->getcookiefile()))
			return false;

		file_put_contents($this->getcookiefile(), "");
	}

	public function getallcookies()
	{
		if(!file_exists($this->getcookiefile()))
			return false;
		return file_get_contents($this->getcookiefile());
	}

	public function setallcookies($coo)
	{
		if(!file_exists($this->getcookiefile()))
			return false;
		return file_put_contents($this->getcookiefile(), $coo);
	}

	public function deletecookie($name)
	{
		if(!file_exists($this->getcookiefile()))
			return false;
	
		$cookies = file($this->getcookiefile());
	
		$return = array();
		foreach($cookies as $k => $cookie)
		{
			$c = explode("\t", $cookie);
			if(count($c) > 5)
			{
				if($c[5] == $name)
					unset($cookies[$k]);
			}
		}

		return file_put_contents($this->getcookiefile(), implode("\n", $cookies));
	}

	public static function send($url, $post = array(), $referer = '', $headers = array(), $json = false)
	{
		if($json)
			$fields = json_encode($post);
		else
			$fields = (is_array($post)) ? http_build_query($post) : '';

		$ch = curl_init();	

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	//	curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
	//	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

		if(is_array($headers))
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
		
		curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, 50*1024);
		curl_setopt($ch, CURLOPT_MAX_SEND_SPEED_LARGE, 50*1024);

		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_REFERER, $url);
		if(is_array($post))
		{
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_POST, true);
		}

		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		$c = curl_exec($ch);


	//	var_dump(curl_getinfo($ch));

		curl_close($ch);
		return $c;
	}

	public function serialize_form($html, $form_id)
	{
		$h = $html;
		$html = SHTML::str_get_html($html);
		if(!$html)
			return false;

		$post = array();
		$elements = array('input', 'select', 'textarea');
		foreach($elements as $element)
			foreach($html->find(''.$form_id.' '.$element) as $e)
			{
				$check = 1;
				if($element == 'input' && $e->type == 'checkbox')
					$check = $check && $e->checked;
				if($element == 'input' && $e->type == 'radio')
					$check = $check && $e->checked;
				if($element == 'select')
				{
					foreach($e->find('option[selected]') as $option)
					{
						parse_str($e->name."[]=".$option->value, $a);
						$post = array_merge($post, $a);
					}
					$check = false;
				}

				if($check)
				{
					parse_str($e->name."=".$e->value, $a);
					$post = array_merge_recursive($post, $a);
				}
			}
		return $post;
	}
	
	public function reset()
	{
		$this->url = '';
		$this->post = array();
		$this->referer = '';
		$this->headers = array();
		$this->file = '';
		$this->json = false;
	}

	public function getredirects($url, $ref, $cookie, $onlytransit = false)
	{
		$redirects = array();
		$this->setcookie('getredirects', $cookie);
		$redirects[] = array($url, 'start');

		while(1)
		{
			$newurl = ''; $type = '';
			$this->reset();
			$this->url = $url;
			$this->referer = $ref;

			$page = $this->sendquery();

			if(preg_match('#(document|window)\.location(\.href)?\s*=\s*["\']([^"\']+)["\']#im', $page, $nurl) && !$onlytransit)
				$newurl = trim($nurl[3]);
			elseif(preg_match('#Location:\s*([^\n]+)\n#im', $page, $nurl))
				$newurl = trim($nurl[1]);
			elseif(preg_match('#location.replace\(["\']([^"\']+)["\']\)#im', $page, $nurl))
				$newurl = trim($nurl[1]);
			elseif(preg_match('#<meta http-equiv=[\'"](location|refresh)[\'"] content=["\']([^;]+;)?\s*(URL=)?([^"\']+)["\']/?>#im', $page, $nurl))
				$newurl = trim($nurl[4]);
			elseif(preg_match('#Refresh: 0;url=([^\n]+)\n#im', $page, $nurl))
				$newurl = trim($nurl[1]);

			if(!empty($newurl))
				$type = 'redirect';

			if($newurl == '.')
			{
				$u = parse_url($url);

				$newurl = $u['scheme']."://".$u['host']."/".ltrim($u['path'], '/');
			}

			if(strpos($newurl, 'http') === false AND !empty($newurl))
			{
				$u1 = parse_url($url);
				$u2 = parse_url($newurl);

				if(!isset($u2['host']) AND isset($u2['path']) AND isset($u1['scheme']))
					$newurl = $u1['scheme']."://".$u1['host']."/".ltrim($u2['path'], '/');
				else
					$newurl = '';
			}

			if(empty($newurl) && !$onlytransit)
			{
				preg_match_all('#href=[\'"](http(s)?:[^\'"]+)[\'"]#im', $page, $urls);
			
				$u = array_count_values($urls[1]);
				arsort($u);
				reset($u);

				if($k = key($u))
				{
					if($u[$k] > 5)
					{
						$newurl = str_replace('\/', '/', $k);
						$type = 'links';
					}
				}
			}

			if(empty($newurl) && !$onlytransit)
			{
				preg_match('#"page_to":[\'"](http(s)?:[^\'"]+)[\'"]#im', $page, $urls);
			
				if(isset($urls[1]))
				{
					$newurl = str_replace('\/', '/', $urls[1]);
					$type = 'js';
				}
			}
			if(empty($newurl) && !$onlytransit)
			{
				preg_match("#setAttribute\(['\"]href['\"],\s*['\"]([^'\"]+)['\"]\)#im", $page, $urls);
			
				if(isset($urls[1]))
				{
					$newurl = str_replace('\/', '/', $urls[1]);
					$type = 'js';
				}
			}

			if(empty($newurl) && !$onlytransit)
			{
				$cookies = $this->getcookies();

				if(isset($cookies['url']) AND !empty($cookies['url']))
				{
					$newurl = urldecode($cookies['url']);
					$type = 'cookies';

					$this->deletecookie('url');

					if(in_array(array($newurl, 'cookies'), $redirects))
					{
						$newurl = '';
					}
				}
			}

			$newurl = preg_replace(array('#utm_[^&]+&?#'), '', trim(urldecode($newurl)));

			if(empty($newurl) or in_array(array($newurl, $type), $redirects))
				break;

			$redirects[] = array($newurl, $type);

			$ref = $url;
			$url = $newurl;
		}
		return $redirects;
	}
}
?>
