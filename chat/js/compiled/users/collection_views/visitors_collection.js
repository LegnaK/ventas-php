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
!function(e,i,t){e.Views.VisitorsCollection=e.Views.CompositeBase.extend({template:i.templates["users/visitors_collection"],itemView:e.Views.Visitor,itemViewContainer:"#visitors-container",emptyView:e.Views.NoVisitors,className:"visitors-collection",collectionEvents:{sort:"render"},itemViewOptions:function(i){var t=e.Objects.Models.page;return{tagName:t.get("visitorTag"),collection:i.get("controls")}},initialize:function(){window.setInterval(t.bind(this.updateTimers,this),2e3),this.on("composite:collection:rendered",this.updateTimers,this)},updateTimers:function(){e.Utils.updateTimers(this.$el,".timesince")}})}(Mibew,Handlebars,_);