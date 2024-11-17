<?php //*** IsX ~ FileX » Yale™ Library - Yet Another Laravel Elevator © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace Yale\Xeno\File;

use Yale\Anci\PathX;
use Yale\Anci\DebugX;
use Yale\Xeno\Data\StringX;
use Illuminate\Support\Facades\View;

class IsX
{
	// ◈ === public »
	public static function public($file)
	{
		return file_exists(PathX::public($file));
	}



	// ◈ === blade »
	public static function blade($blade)
	{
		return View::exists($blade);
	}


	// ◈ === wire »
	public static function wire($component, $class = null)
	{
		if(!$class){
			$class = $component;
		}
		// » get class name
		$class = StringX::afterAs($class, "\Livewire");
		$class = StringX::beforeAs($class, ".php");
		$class = 'App\\Livewire' . $class;

		if (!file_exists($component) || !class_exists($class)) {
			return DebugX::wire404(file: $component, wire: $class);
		}
		return $component;
	}

}//> end of class ~ IsX