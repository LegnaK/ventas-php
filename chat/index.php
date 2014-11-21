<?php
/*
 * This file is a part of Mibew Messenger.
 *
 * Copyright 2005-2014 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// Initialize libraries
require_once(dirname(__FILE__) . '/libs/init.php');

use Mibew\Application;
use Mibew\Authentication\AuthenticationManager;
use Mibew\Routing\RouteCollectionLoader;
use Mibew\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Config\FileLocator;

// Prepare router
$file_locator = new FileLocator(array(MIBEW_FS_ROOT));
$router = new Router(new RouteCollectionLoader($file_locator));
$router->setOption(
    'route_collection',
    RouteCollectionLoader::ROUTES_CORE | RouteCollectionLoader::ROUTES_PLUGINS
);

// Prepare files cache
$cache_driver = new \Stash\Driver\FileSystem();
$cache_driver->setOptions(array('path' => MIBEW_FS_ROOT . '/cache'));
$cache = new \Stash\Pool($cache_driver);

$application = new Application($router, new AuthenticationManager());
$application->setCache($cache);

// Process request
$request = Request::createFromGlobals();
$response = $application->handleRequest($request);

// Send response to the user
$response->send();
