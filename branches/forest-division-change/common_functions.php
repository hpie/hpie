<?
	function wrap_text($text,$count=10){
	 return $text = wordwrap($text, $count, "\n", 1);
	}

	function fd_brtonbsp($desc){
		$d = $desc;
		$d = preg_replace('/<br.*?>/', ' ', $d);
		$opt = array( '/<p.*?>/', '/<\/p>/', '/<div.*?>/', '/<\/div>/', '/<span.*?>/', '/<\/span>/', '/<table.*?>/', '/<\/table>/', '/<tr.*?>/', '/<\/tr>/', '/<td.*?>/', '/<\/td>/', '/<th.*?>/', '/<\/th>/', '/<strong.*?>/', '/<\/strong>/', '/<font.*?>/', '/<\/font>/', '/<h.*?>/', '/<\/h.*?>/', '/<ul.*?>/', '/<\/ul>/', '/<ol.*?>/', '/<\/ol>/', '/<li.*?>/', '/<\/li>/', '/<em.*?>/', '/<\/em>/');
		return preg_replace($opt, '', $d);
	}

	function beautify_desc($desc, $wordcount)	{
		$desc = fd_brtonbsp($desc);		
		$x = strlen($desc);
		$str = $desc;
		if($x <= $wordcount || $wordcount == -1){
			$c = $x;
		}else{
			$c = strpos($str, ' ', $wordcount);
			if($c === false){
				$c = strpos($str, ' ', strrpos($str, ' '));
			}
		}		
		$str = substr($str, 0, $c);
		return $str;
	}

	
	function show_bread_crumb($home=null,$categoryName=null,$productName=null){
		require_once('./classes/clsBreadcrumb.php');
		$trail = new Breadcrumb();
		if($categoryName == 'catalog'){
			$breadcrumb=$trail->add('Home', $home.'home.html');
			$breadcrumb=$trail->add('Catalog', '#');
		}elseif($categoryName != "" && $productName != ""){
			$breadcrumb=$trail->add('Home', $home.'home.html');
			$breadcrumb=$trail->add($categoryName, '#');	
			$breadcrumb=$trail->add($productName, '#');	
		}elseif($categoryName!= ""){
			$breadcrumb=$trail->add('Home', $home.'home.html');
			$breadcrumb=$trail->add(ucwords(eregi_replace("_"," ",$categoryName)), '#');	
		}else{
			$breadcrumb=$trail->add('Home', $home.'home.html');
			//$breadcrumb=$trail->add('My Account', '#');
		}

		return $breadcrumb;
	}

	function highlight_search_terms($word, $string) {
		$search = preg_quote($word);

		$search = str_replace('a', '[aאבגדהו]', $search);
		$search = str_replace('e', '[eטיךכ]', $search);
		/* repeat for each possible accented character */
		return preg_replace('/\b' . $search . '\b/i', '<span class="keysearch">$0</span>', $string);
	}

	function friendlyURL($string){
		$string = preg_replace("`\[.*\]`U","",$string);
		$string = preg_replace('`&(amp;)??[a-z0-9]+;`i','-',$string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string);
		$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
		return strtolower(trim($string, '-'));
 }


 function multiCol($string, $numcols) { $collength = ceil(strlen($string) / $numcols) + 3; $retval = explode("\n", wordwrap(strrev($string), $collength)); if(count($retval) > $numcols) { $retval[$numcols-1] .= " " . $retval[$numcols]; unset($retval[$numcols]); } $retval = array_map("strrev", $retval); return array_reverse($retval); }

 function truncate_str($str, $maxlen)  {
	if ( strlen($str) <= $maxlen ) return $str;
	$newstr = substr($str, 0, $maxlen);
	if ( substr($newstr,-1,1) != ' ' ) $newstr = substr($newstr, 0, strrpos($newstr, " "));
	return $newstr;
}

	function show_tooltip_text($key,$templates_id){
		$strTooltip = "";
		if($templates_id == 1){
			switch($key){
				case "page_name":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page name'></a>";
				break;
				case "meta_title":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page title <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_keywords":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be keywords for your page <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_description":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be description for your page <br /> used for SEO (Search Engine Optimization)'></a>";
				break;
				default:
					//$strTooltip = "<a href='#' class='screenshot toolTipButton' rel='templates/$templates_id/$templates_id.jpg'></a>";
					$strTooltip = "<a id='example2' class='toolTipButton' href='templates/$templates_id/$key.jpg'></a>";
				break;
			}
			
		}elseif($templates_id == 2){
			switch($key){
				case "page_name":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page name'></a>";
				break;
				case "meta_title":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page title <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_keywords":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be keywords for your page<br /> used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_description":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be description for your page <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				default:
					$strTooltip = "<a id='example2' class='toolTipButton' href='templates/$templates_id/$key.jpg'></a>";
				break;
			}
		}elseif($templates_id == 3){
			switch($key){
				case "page_name":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page name'></a>";
				break;
				case "meta_title":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page title <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_keywords":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be keywords for your page<br /> used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_description":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be description for your page <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				default:
					$strTooltip = "<a href='#' class='screenshot toolTipButton' rel='templates/$templates_id/$templates_id.jpg'></a>";
				break;
			}
		}elseif($templates_id == 4){
			switch($key){
				case "page_name":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page name'></a>";
				break;
				case "meta_title":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='This will be your page title <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_keywords":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be keywords for your page<br /> used for SEO (Search Engine Optimization)'></a>";
				break;
				case "meta_description":
					$strTooltip = "<a href ='#' class='tooltip toolTipButton' title='These will be description for your page <br />used for SEO (Search Engine Optimization)'></a>";
				break;
				default:
					$strTooltip = "<a id='example2' class='toolTipButton' href='templates/$templates_id/$key.png'></a>";
				break;
			}
		}
	return $strTooltip;
}

function getUserInfo($users_id){
	global $db;
	$sql = "SELECT * FROM wp_users WHERE ID ='".$users_id."'";
	$row = $db->getXByY($sql);
	return $row['display_name'];
}
?>