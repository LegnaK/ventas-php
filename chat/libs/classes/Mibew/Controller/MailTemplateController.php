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

namespace Mibew\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Contains actions which are related with mail templates.
 */
class MailTemplateController extends AbstractController
{
    /**
     * Renders list a of all mail templates which are available in the system.
     *
     * @param Request $request Incoming request.
     * @return Rendered page content.
     */
    public function indexAction(Request $request)
    {
        $operator = $this->getOperator();
        $page = array();

        // Build list of available locales
        $all_locales = get_available_locales();
        $locales_with_label = array();
        foreach ($all_locales as $id) {
            $locale_info = get_locale_info($id);
            $locales_with_label[] = array(
                'id' => $id,
                'name' => ($locale_info ? $locale_info['name'] : $id)
            );
        }
        $page['locales'] = $locales_with_label;

        // Get selected locale.
        $lang = $this->extractLocale($request);

        $page['stored'] = $request->query->has('stored');
        $page['formaction'] = $this->generateUrl('mail_templates');
        $page['mailTemplates'] = $this->getMailTemplatesList($lang);
        $page['formlang'] = $lang;
        $page['title'] = getlocal('Mail templates');
        $page['menuid'] = 'mail_templates';

        $page = array_merge($page, prepare_menu($operator));

        return $this->render('mail_templates', $page);
    }

    /**
     * Builds a page with form for mail template settings.
     *
     * @param Request $request Incoming request.
     * @return string Rendered page content.
     */
    public function showEditFormAction(Request $request)
    {
        set_csrf_token();

        $operator = $this->getOperator();
        $lang = $this->extractLocale($request);
        $template_name = $request->attributes->get('name');

        $page = array(
            // Use errors list stored in the request. We need to do so to have
            // an ability to pass the request from the "submitEditForm" action.
            'errors' => $request->attributes->get('errors', array()),
        );

        $template = $this->loadMailTemplate($template_name, $lang);

        // Use values from the request or the default ones if they are not
        // available.
        $page['formsubject'] = $request->request->get('subject', $template['subject']);
        $page['formbody'] = $request->request->get('body', $template['body']);

        $page['formname'] = $template_name;
        $page['formlang'] = $lang;
        $page['formaction'] = $this->generateUrl(
            'mail_template_edit',
            array('name' => $template_name)
        );
        $page['title'] = getlocal('Mail templates');
        $page['menuid'] = 'mail_templates';

        $page = array_merge($page, prepare_menu($operator));

        return $this->render('mail_template_edit', $page);
    }

    /**
     * Processes submitting of the form which is generated in
     * {@link \Mibew\Controller\MailTemplateController::showFormAction()}
     * method.
     *
     * @param Request $request Incoming request.
     * @return string Rendered page content.
     */
    public function submitEditFormAction(Request $request)
    {
        csrf_check_token($request);

        $name = $request->attributes->get('name');
        $lang = $this->extractLocale($request);
        $errors = array();

        $subject = $request->request->get('subject');
        if (!$subject) {
            $errors[] = no_field('Mail subject');
        }

        $body = $request->request->get('body');
        if (!$body) {
            $errors[] = no_field('Mail body');
        }

        if (count($errors) != 0) {
            // On or more errors took place. We cannot continue the saving
            // process. Just attach errors to the request and rerender the edit
            // form.
            $request->attributes->set('errors', $errors);

            return $this->showEditFormAction($request);
        }

        // Save the template and redirect the operator to the page with mail
        // templates list.
        mail_template_save($name, $lang, $subject, $body);
        $redirect_to = $this->generateUrl(
            'mail_templates',
            array(
                'lang' => $lang,
                'stored' => true,
            )
        );

        return $this->redirect($redirect_to);
    }

    /**
     * Builds list of mail templates.
     *
     * @param string $locale Locale code which will be used for templates
     *   loading.
     * @return array List of mail templates available in the system.
     */
    protected function getMailTemplatesList($locale)
    {
        return array(
            $this->loadMailTemplate('user_history', $locale),
            $this->loadMailTemplate('password_recovery', $locale),
            $this->loadMailTemplate('leave_message', $locale),
        );
    }

    /**
     * Loads mail template.
     *
     * It's just a wrapper for {@link mail_template_load()} function which
     * throws an exception if a template cannot be loaded.
     *
     * @param string $name Machine name of the template
     * @param string $locale Locale code which should be used for template
     *   loading.
     * @return array Mail template.
     * @throws \RuntimeException If the template cannot be loaded.
     */
    protected function loadMailTemplate($name, $locale)
    {
        $template = mail_template_load($name, $locale);

        if (!$template) {
            throw new \RuntimeException(sprintf('Cannot load "%s" mail template', $name));
        }

        return $template;
    }

    /**
     * Extracts locale code from the request.
     *
     * @param Request $request
     * @return string Locale code for the selected locale.
     */
    protected function extractLocale(Request $request)
    {
        $lang = $request->isMethod('POST')
            ? $request->request->get('lang')
            : $request->query->get('lang');

        $all_locales = get_available_locales();
        $correct_locale = !empty($lang)
            && preg_match("/^[\w-]{2,5}$/", $lang)
            && in_array($lang, $all_locales);
        if (!$correct_locale) {
            $lang = in_array(get_current_locale(), $all_locales)
                ? get_current_locale()
                : $all_locales[0];
        }

        return $lang;
    }
}
