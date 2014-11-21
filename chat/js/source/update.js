/*!
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

(function ($) {
    var loadNews = function () {
        if (typeof (window.mibewNews) == "undefined" || typeof (window.mibewNews.length) == "undefined") {
            return;
        }

        var str = "<div>";
        for (var i = 0; i < window.mibewNews.length; i++) {
            str += "<div class=\"news-title\"><a hre" + "f=\"" + window.mibewNews[i].link + "\">" + window.mibewNews[i].title + "</a>, <span class=\"small\">" + window.mibewNews[i].date + "</span></div>";
            str += "<div class=\"news-text\">" + window.mibewNews[i].message + "</div>";
        }
        $("#news").html(str + "</div>");
    }

    var loadVersion = function () {
        if (typeof (window.mibewLatest) == "undefined" || typeof (window.mibewLatest.version) == "undefined") {
            return;
        }

        var current = $("#current-version").html();

        if (current != window.mibewLatest.version) {
            if (current < window.mibewLatest.version) {
                $("#current-version").css("color", "red");
            }
            $("#latest-version").html(window.mibewLatest.version + ", Download <a href=\"" + window.mibewLatest.download + "\">" + window.mibewLatest.title + "</a>");
        } else {
            $("#current-version").css("color", "green");
            $("#latest-version").html(window.mibewLatest.version);
        }
    }

    $(function () {
        loadNews();
        loadVersion();
    });
})(jQuery);
