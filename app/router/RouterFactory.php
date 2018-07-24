<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		//$router[] = new Route('<presenter>/<action>', 'Admin:PostList:default');
		$router[] = new Route('[page/<page>]', 'Front:List:default'); // page > 1
		$router[] = new Route('<id \d+>', 'Front:Detail:default');
		$router[] = new Route('rss[!.xml]', 'Front:Export:rss');
		$router[] = new Route('admin', 'Admin:PostList:default');
		$router[] = new Route('admin/add', 'Admin:PostEdit:add');
		$router[] = new Route('prihlasit', 'Admin:Sign:in');
		$router[] = new Route('odhlasit', 'Admin:Sign:out');
		$router[] = new Route('<presenter>/<action>', 'Front:List:default');
		return $router;
	}
}
