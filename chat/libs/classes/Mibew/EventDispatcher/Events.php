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

namespace Mibew\EventDispatcher;

/**
 * This class contains a list of events that are present in the system.
 */
final class Events
{
    /**
     * A ban is created.
     *
     * This event is triggered after a ban has been created. An associative
     * array with the following items is passed to the event handlers:
     *  - "ban": an instance of {@link \Mibew\Ban} class.
     */
    const BAN_CREATE = 'banCreate';

    /**
     * A ban is updated.
     *
     * This event is triggered after a ban is saved. An associative array with
     * the following items is passed to the event handlers:
     *  - "ban": an instance of {@link \Mibew\Ban}, the state of the ban after
     *    the update.
     *  - "original_ban": an instance of {@link \Mibew\Ban}, the state of the
     *    ban before the update.
     */
    const BAN_UPDATE = 'banUpdate';

    /**
     * A ban is deleted.
     *
     * This event is triggered after a ban has been deleted. An associative
     * array with the following items is passed to the event handlers:
     *  - "id": int, deleted ban ID.
     */
    const BAN_DELETE = 'banDelete';

    /**
     * Cron is run.
     *
     * This event is triggered when cron is run. It provides an ability for
     * plugins to perform custom maintenance actions.
     */
    const CRON_RUN = 'cronRun';

    /**
     * A group is created.
     *
     * This event is triggered after a group has been created. An associative
     * array with the following items is passed to the event handlers:
     *  - "group": group's array.
     */
    const GROUP_CREATE = 'groupCreate';

    /**
     * A group is updated.
     *
     * This event is triggered after a group is saved. An associative array with
     * the following items is passed to the event handlers:
     *  - "group": array, the state of the group after update.
     *  - "original_group": array, the state of the group before update.
     */
    const GROUP_UPDATE = 'groupUpdate';

    /**
     * A group is deleted.
     *
     * This event is triggered after a group has been deleted. An associative
     * array with the following items is passed to the event handlers:
     *  - "id": int, deleted group ID.
     */
    const GROUP_DELETE = 'groupDelete';

    /**
     * Group's operators set is updated.
     *
     * This event is triggered after a set of operators related with a group has
     * been changed. An associative array with the following items is passed to
     * the event handlers:
     *  - "group": group's array.
     *  - "original_operators": array, list of operators IDs before the update.
     *  - "operators": array, list of operators IDs after the update.
     */
    const GROUP_UPDATE_OPERATORS = 'groupUpdateOperators';

    /**
     * An invitation is created.
     *
     * This event is triggered after an invitation has been created. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "invitation": an instance of {@link \Mibew\Thread} class.
     */
    const INVITATION_CREATE = 'invitationCreate';

    /**
     * An invitation is accepted.
     *
     * This event is triggered after an invitation has been accepted by a
     * visitor. An associative array with the following items is passed to the
     * event handlers:
     *  - "invitation": an instance of {@link \Mibew\Thread} class.
     */
    const INVITATION_ACCEPT = 'invitationAccept';

    /**
     * An invitation is rejected.
     *
     * This event is triggered after an invitation has been rejected by a
     * visitor. An associative array with the following items is passed to the
     * event handlers:
     *  - "invitation": an instance of {@link \Mibew\Thread} class.
     */
    const INVITATION_REJECT = 'invitationReject';

    /**
     * An invitation is ignored.
     *
     * This event is triggered after an invitation has been ignored by a
     * visitor and automatically closed by the system. An associative array with
     * the following items is passed to the event handlers:
     *  - "invitation": an instance of {@link \Mibew\Thread} class.
     */
    const INVITATION_IGNORE = 'invitationIgnore';

    /**
     * An operator cannot be authenticated.
     *
     * This event is triggered if an operator cannot be authenticated by the
     * system. It provides an ability for plugins to implement custom
     * authentication logic. An associative array with the following items is
     * passed to the event handlers:
     *  - "operator": array, if a plugin has extracted operator from the request
     *    it should set operator's data to this field.
     *  - "request": {@link \Symfony\Component\HttpFoundation\Request},
     *    incoming request. Can be used by a plugin to extract an operator.
     */
    const OPERATOR_AUTHENTICATE = 'operatorAuthenticate';

    /**
     * An operator logged in.
     *
     * This event is triggered after an operator logged in using system login
     * form. An associative array with the following items is passed to the
     * event handlers:
     *  - "operator": array of the logged in operator info;
     *  - "remember": boolean, indicates if system should remember operator.
     */
    const OPERATOR_LOGIN = 'operatorLogin';

    /**
     * An operator logged out.
     *
     * This event is triggered after an operator is logged out.
     */
    const OPERATOR_LOGOUT = 'operatorLogout';

    /**
     * An operator is created.
     *
     * This event is triggered after an operator has been created. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "operator": operator's array.
     */
    const OPERATOR_CREATE = 'operatorCreate';

    /**
     * An operator is updated.
     *
     * This event is triggered after an operator is saved. An associative array
     * with the following items is passed to the event handlers:
     *  - "operator": array, the state of the operator after update.
     *  - "original_operator": array, the state of the operator before update.
     */
    const OPERATOR_UPDATE = 'operatorUpdate';

    /**
     * An operator is deleted.
     *
     * This event is triggered after an operator has been deleted. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "id": int, deleted operator ID.
     */
    const OPERATOR_DELETE = 'operatorDelete';

    /**
     * CSS assets are attached to a page.
     *
     * This event is triggered before CSS assets are attached to a page. It
     * provides an ability for plugins to add custom CSS files (or inline
     * styles) to a page. An associative array with the following items is
     * passed to the event handlers:
     *  - "request": {@link \Symfony\Component\HttpFoundation\Request}, a
     *    request instance. CSS files will be attached to the requested page.
     *  - "css": array of assets. Each asset can be either a string with
     *    relative URL of a CSS file or an array with "content", "type" and
     *    "weight" items. See
     *    {@link \Mibew\Asset\AssetManagerInterface::getCssAssets()} for details
     *    of their meaning. Modify this array to add or remove additional CSS
     *    files.
     */
    const PAGE_ADD_CSS = 'pageAddCss';

    /**
     * JavaScript assets are attached to a page.
     *
     * This event is triggered before JavaScript assets are attached to a page.
     * It provides an ability for plugins to add custom JavaScript files (or
     * inline scripts) to a page. An associative array with the following items
     * is passed to the event handlers:
     *  - "request": {@link \Symfony\Component\HttpFoundation\Request}, a
     *    request instance. JavaScript files will be attached to the requested
     *    page.
     *  - "js": array of assets. Each asset can be either a string with
     *    relative URL of a JavaScript file or an array with "content",
     *    "type" and "weight" items. See
     *    {@link \Mibew\Asset\AssetManagerInterface::getJsAssets()} for details
     *    of their meaning. Modify this array to add or remove additional
     *    JavaScript files.
     */
    const PAGE_ADD_JS = 'pageAddJs';

    /**
     * Options of JavaScript plugins are attached to a page.
     *
     * This event is triggered before options of JavaScript plugins are attached
     * to a page. It provides an ability for plugins to pass some data to the
     * client side. An associative array with the following items is passed to
     * the event handlers:
     *  - "request": {@link \Symfony\Component\HttpFoundation\Request}, a
     *    request instance. Plugins will work at the requested page.
     *  - "plugins": associative array, whose keys are plugins names and values
     *    are plugins options. Modify this array to add or change plugins
     *    options.
     */
    const PAGE_ADD_JS_PLUGIN_OPTIONS = 'pageAddJsPluginOptions';

    /**
     * Access for resource is denied.
     *
     * This event is triggered if the access for resource is denied. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "request": {@link Symfony\Component\HttpFoundation\Request}, incoming
     *    request object.
     *  - "response": {@link Symfony\Component\HttpFoundation\Response}, if a
     *    plugin wants to send a custom response to the client it should attach
     *    a response object to this field.
     */
    const RESOURCE_ACCESS_DENIED = 'resourceAccessDenied';

    /**
     * Resource is not found.
     *
     * This event is triggered if a resource is not found. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "request": {@link Symfony\Component\HttpFoundation\Request}, incoming
     *    request object.
     *  - "response": {@link Symfony\Component\HttpFoundation\Response}, if a
     *    plugin wants to send a custom response to the client it should attach
     *    a response object to this field.
     */
    const RESOURCE_NOT_FOUND = 'resourceNotFound';

    /**
     * Routes collection is loaded and ready to use.
     *
     * This event is triggered after all routes are loaded. It provides an
     * ability for plugins to alter routes collection before it will be used. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "routes" an instance of
     *    {@link Symfony\Component\Routing\RouteCollection} class.
     */
    const ROUTES_ALTER = 'routesAlter';

    /**
     * A function was called at client side "thread" application.
     *
     * This event is triggered when an API a function is called at client side
     * in the "thread" application, but the system is not aware of this function.
     *
     * Plugins can implement custom API functions by attaching handlers to the
     * event. If a plugin wants to return some results, it should use "results"
     * element of the event arguments array (see below).
     *
     * An associative array with the following items is passed to the event
     * handlers:
     *   - "function": string, name of the function that was called.
     *   - "arguments": associative array of arguments that was passed to the
     *     function.
     *   - "results": array, list of function results.
     *
     * Here is an example of the event handler:
     * <code>
     * public function callHandler(&$function)
     * {
     *     // Check that the function we want to implement is called.
     *     if ($function['function'] == 'microtime') {
     *         // Check some function's arguments.
     *         $as_float = empty($function['arguments']['as_float'])
     *             ? false
     *             : $function['arguments']['as_float'];
     *         // Invoke the function and return the results.
     *         $function['results']['time'] = microtime($as_float);
     *     }
     * }
     * </code>
     */
    const THREAD_FUNCTION_CALL = 'threadFunctionCall';

    /**
     * A thread is created.
     *
     * This event is triggered after a thread has been created. An associative
     * array with the following items is passed to the event handlers:
     *  - "thread": an instance of {@link \Mibew\Thread}.
     */
    const THREAD_CREATE = 'threadCreate';

    /**
     * Thread is updated.
     *
     * This event is triggered after a thread is saved. An associative array
     * with the following items is passed to the event handlers:
     *  - "thread": an instance of {@link \Mibew\Thread}, state of the thread
     *    after the update.
     *  - "original_thread": an instance of {@link \Mibew\Thread}, state of the
     *    thread before the update.
     */
    const THREAD_UPDATE = 'threadUpdate';

    /**
     * A thread is deleted.
     *
     * This event is triggered after a thread has been deleted. An associative
     * array with the following items is passed to the event handlers:
     *  - "id": int, deleted thread ID.
     */
    const THREAD_DELETE = 'threadDelete';

    /**
     * A thread is closed.
     *
     * This event is triggered after a thread has been closed. An associative
     * array with the following items is passed to the event handlers:
     *  - "thread": an instance of {@link \Mibew\Thread}.
     */
    const THREAD_CLOSE = 'threadClose';

    /**
     * A message is posted.
     *
     * This event is triggered before a message has been posted to thread. It
     * provides an ability for plugins to alter message, its kind or options. An
     * associative array with the following items is passed to the event
     * handlers:
     *  - "thread": an instance of {@link \Mibew\Thread}.
     *  - "message_kind": int, message kind.
     *  - "message_body": string, message body.
     *  - "message_options": associative array, list of options passed to
     *    {@link \Mibew\Thread::postMessage()} method as the third argument.
     */
    const THREAD_POST_MESSAGE = 'threadPostMessage';

    /**
     * Related with a thread messages are loaded.
     *
     * This event is triggered after messages related with a thread are loaded.
     * It provides an ability for plugins to alter messages set. An associative
     * array with the following items is passed to the event handlers:
     *  - "thread": an instance of {@link \Mibew\Thread}.
     *  - "messages": array, list of messages. Each message is an associative
     *    array. See {@link \Mibew\Thread::getMessages()} return value for
     *    details of its structure.
     */
    const THREAD_GET_MESSAGES_ALTER = 'threadGetMessagesAlter';

    /**
     * Threads list is ready to be sent to client.
     *
     * This event is triggered before the threads list is sent to the "users"
     * client side application. It provide an ability to alter the list. A
     * plugin can attach some fields to each thread or completeley replace the
     * whole list. An associative array with the following items is passed to
     * the event handlers:
     *   - "threads": array of threads data arrays.
     */
    const USERS_UPDATE_THREADS_ALTER = 'usersUpdateThreadsAlter';

    /**
     * Load custom on site visitors list.
     *
     * This event is triggered before the list of on site visitors is loaded for
     * sending to the "users" client side application. It provide an ability for
     * plugins to load, sort and limit visitors list. An associative array with
     * the following items is passed to the event handlers:
     *   - "visitors": array of visitors data arrays. Each visitor array must
     *     contain at least the following keys: "id", "userName", "userAgent",
     *     "userIp", "remote", "firstTime", "lastTime", "invitations",
     *     "chats", "invitationInfo". If there are no visitors an empty array
     *     should be used.
     *
     * If the "visitors" item was not set by a plugin the default system loader
     * will be used.
     */
    const USERS_UPDATE_VISITORS_LOAD = 'usersUpdateVisitorsLoad';

    /**
     * On site visitors list is ready to be sent to client.
     *
     * This event is triggered before the on site visitors list is sent to the
     * "users" client application. It provide an ability to alter the list.
     * A plugin can attach some fields to each visitor or completeley replace
     * the whole list. An associative array with the following items is passed
     * to the event handlers:
     *   - "visitors": array of visitors data arrays.
     */
    const USERS_UPDATE_VISITORS_ALTER = 'usersUpdateVisitorsAlter';

    /**
     * A function was called at client side "users" application.
     *
     * This event is triggered when an API a function is called at client side
     * in the "users" application, but the system is not aware of this function.
     *
     * Plugins can implement custom API functions by attaching handlers to the
     * event. If a plugin wants to return some results, it should use "results"
     * element of the event arguments array (see below).
     *
     * An associative array with the following items is passed to the event
     * handlers:
     *   - "function": string, name of the function that was called.
     *   - "arguments": associative array of arguments that was passed to the
     *     function.
     *   - "results": array, list of function results.
     *
     * Here is an example of the event handler:
     * <code>
     * public function callHandler(&$function)
     * {
     *     // Check that the function we want to implement is called.
     *     if ($function['function'] == 'microtime') {
     *         // Check some function's arguments.
     *         $as_float = empty($function['arguments']['as_float'])
     *             ? false
     *             : $function['arguments']['as_float'];
     *         // Invoke the function and return the results.
     *         $function['results']['time'] = microtime($as_float);
     *     }
     * }
     * </code>
     */
    const USERS_FUNCTION_CALL = 'usersFunctionCall';

    /**
     * Visitor is created.
     *
     * This event is triggered when a visitor is tracked by the widget for the
     * first time. An associative array with the following items is passed to
     * the event handlers:
     *   - "visitor": array, list of visitor's info. See returned value of
     *     {@link track_get_visitor_by_id()} function for details of its
     *     structure.
     */
    const VISITOR_CREATE = 'visitorCreate';

    /**
     * Visitor is tracked by the system.
     *
     * This event is triggered every time a visitor is tracked by the widget. An
     * associative array with the following items is passed to the event
     * handlers:
     *   - "visitor": array, list of visitor's info. See returned value of
     *     {@link track_get_visitor_by_id()} function for details of its
     *     structure.
     */
    const VISITOR_TRACK = 'visitorTrack';

    /**
     * Old visitors are deleted.
     *
     * This event is triggered after old visitors are deleted. An associative
     * array with the following items is passed to the event handlers:
     *   - "visitors": array, list of removed visitors' IDs.
     */
    const VISITOR_DELETE_OLD = 'visitorDeleteOld';
}
