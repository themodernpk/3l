<?php


class TP
{

	public static $assets_path = NULL;

	//----------------------------------------

	function __construct()
	{

	}

    //----------------------------------------
	public static function assets()
	{
		if(static::$assets_path == NULL)
		{
			return static::$assets_path = get_template_directory_uri()."/assets/";
		} else
		{
			return static::$assets_path;
		}

	}
    //----------------------------------------
	public static function assets_url()
	{
		echo TP::assets();
	}
    //----------------------------------------
	public static function img($filename)
	{
		echo TP::assets()."img/".$filename;
	}
    //----------------------------------------
	public static function js($filename)
	{
		echo  '<script src="'.TP::assets().$filename.'.js" ></script>'."\n";
	}
    //----------------------------------------
	public static function css($filename)
	{
		echo  '<link href="'.TP::assets().$filename.'.css" rel="stylesheet">'."\n";
	}
    //----------------------------------------
	public static function plugin()
	{
		return TP::assets()."plugins/";
	}
    //----------------------------------------
	public static function plugin_url()
	{
		$tp = new TP();
		echo  $tp->plugin();
	}
    //----------------------------------------
	public static function commonCSS()
	{

		echo  '<link href="'.TP::plugin().'bootstrap/css/bootstrap.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'pace/pace.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'parsley/src/parsley.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'owl.carousel/owl.carousel.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'owl.carousel/owl.theme.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'font-awesome/css/font-awesome.min.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'select2/css/select2.min.css" rel="stylesheet">'."\n";
		echo  '<link href="'.TP::plugin().'popup/magnific-popup.css" rel="stylesheet">'."\n";








	}
    //----------------------------------------
	public static function commonJS()
	{
		echo  '<script src="'.TP::plugin().'jquery/jquery-2.1.4.min.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'bootstrap/js/bootstrap.min.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'pace/pace.min.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'parsley/dist/parsley.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'owl.carousel/owl.carousel.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'popup/jquery.magnific-popup.min.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'wow/wow.min.js" ></script>'."\n";
		echo  '<script src="'.TP::plugin().'select2/js/select2.min.js" ></script>'."\n";
		

	}

     //----------------------------------------
    //----------------------------------------
    //----------------------------------------

	public static function get_current_url($strip = true)
	{


		$filename = basename($_SERVER['PHP_SELF']);


	// filter function
		$filter = function($input) use($strip) {
			$input = urldecode($input);
			$input = str_ireplace(array(
				"\0", '%00', "\x0a", '%0a', "\x1a", '%1a'), '', $input);
			if ($strip) {
				$input = strip_tags($input);
			}
	    // or whatever encoding you use
			$input = htmlentities($input, ENT_QUOTES, 'utf-8');
			return trim($input);
		};

		$url = 'http'. (($_SERVER['SERVER_PORT'] == '443') ? 's' : '')
		.'://'. $_SERVER['SERVER_NAME'] . $filter($_SERVER['REQUEST_URI']);

		$exclude_filename = str_replace($filename, "", $url);
		return $exclude_filename;
	}

    //----------------------------------------

    //----------------------------------------
    //----------------------------------------
    //----------------------------------------





} // end of class