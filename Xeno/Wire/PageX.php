<?php //*** PageX ~ class » Yale™ Library - Yet Another Laravel Elevator © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace Yale\Xeno\Wire;

use Yale\Xeno\Http\RouteX;

abstract class PageX extends ComponentX
{
	// ◈ property
	protected $routeX;
	protected $viewX;
	protected $layoutX;



	// ◈ === setRouteX »
	protected function setRouteX(?string $route = null)
	{
		if (empty($route)) {
			$route = RouteX::current('name');
		}
		$this->routeX = $route;
	}



	// ◈ === setViewX »
	protected function setViewX($view, $theme = true)
	{
		if (!empty($view)) {
			$view = 'page.' . $view;
			$this->viewX = $this->iBladeX($view, $theme);
		}
	}



	// ◈ === setLayoutX »
	protected function setLayoutX($layout = 'page', $theme = true)
	{
		if (!empty($layout)) {
			$layout = 'layout.' . $layout;
			$this->layoutX = $this->iBladeX($layout, $theme);
		}
	}



	// ◈ === getViewX »
	protected function getViewX(?string $view = null)
	{
		if (empty($view)) {
			if (empty($this->viewX)) {
				if (!empty($this->moduleX)) {
					$view = $this->moduleX;
				} else {
					$view = strtolower($this->iClassX());
				}
				$this->setViewX($view);
			}
			return $this->viewX;
		}
		return $view;
	}



	// ◈ === getLayoutX »
	protected function getLayoutX(string|bool|null $layout = true)
	{
		if (empty($layout) || $layout === true) {
			if (empty($this->layoutX)) {
				$this->setLayoutX();
			}
			return $this->layoutX;
		} elseif ($layout === false) {
			return null;
		}
		return $layout;
	}



	// ◈ === iPageX »
	protected function iPageX(?string $view = null, array|object|null $record = null, string|bool|null $layout = true)
	{
		return $this->iRenderX($this->getViewX($view), $this->getLayoutX($layout), $record);
	}


}//> end of class ~ PageX