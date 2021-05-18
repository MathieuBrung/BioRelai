<?php

	abstract class Dispatcher{

		static function dispatch($controllerName)
		{
			$require = "controllers/controller" . ucfirst($controllerName) . ".php";
			return $require ;
		}

	}

