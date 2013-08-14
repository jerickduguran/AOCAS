$.fn.jqGrid.gcrossFilterToolbar = function(p){  
		p = $.extend({
			autosearch: true,
			searchOnEnter : true,
			beforeSearch: null,
			afterSearch: null,
			beforeClear: null,
			afterClear: null,
			searchurl : '',
			stringResult: false,
			groupOp: 'AND',
			defaultSearch : "bw",
			searchOperators : false,
			operandTitle : "Click to select search operation.",
			operands : { "eq" :"==", "ne":"!","lt":"<","le":"<=","gt":">","ge":">=","bw":"^","bn":"!^","in":"=","ni":"!=","ew":"|","en":"!@","cn":"~","nc":"!~","nu":"#","nn":"!#"}
		}, $.jgrid.search , p  || {});
		return this.each(function(){
			var $t = this;
			if(this.ftoolbar) { return; }
			var triggerToolbar = function() {
				var sdata={}, j=0, v, nm, sopt={},so,range_type=0;
				$.each($t.p.colModel,function(){
					var $elem = $("#gs_"+$.jgrid.jqID(this.name), (this.frozen===true && $t.p.frozenColumns === true) ?  $t.grid.fhDiv : $t.grid.hDiv);
					nm = this.index || this.name;
					if(p.searchOperators ) {
						so = $elem.parent().prev().children("a").attr("soper") || p.defaultSearch;
					} else {
						so  = (this.searchoptions && this.searchoptions.sopt) ? this.searchoptions.sopt[0] : this.stype==='select'?  'eq' : p.defaultSearch;
					}
					v = this.stype === "custom" && $.isFunction(this.searchoptions.custom_value) && $elem.length > 0 && $elem[0].nodeName.toUpperCase() === "SPAN" ?
						this.searchoptions.custom_value.call($t, $elem.children(".customelement:first"), "get") :
						$elem.val();
					
					/******************************************************					
						ADDED FOR RANGE TYPE FIELD
						AUTHOR	:	Jerick Y. Duguran
						DATE	:	May 2013	
						TODO	: 	IF TYPE IS RANGE, a new parameter is created base on the column field used: column 1 is XXX so a new parameter is created named XXX_2.
								 
					******************************************************/
					
					if(this.stype == 'range'){ 
						v2 = $("#gs_"+$.jgrid.jqID(this.name+'_2'), (this.frozen===true && $t.p.frozenColumns === true) ?  $t.grid.fhDiv : $t.grid.hDiv).val();
						if(v) {
							sdata[nm] = v;
							sdata[nm+"_2"] = v2;
							sdata['rangefield_'+range_type] = nm;
							sopt[nm] = so;
							sopt[nm+"_2"] = so;
							sopt['rangefield_'+range_type] = nm;
							j++;
						} else {
							try {
								delete $t.p.postData[nm];
								delete $t.p.postData[nm+"_2"];
								delete $t.p.postData['rangefield_'+range_type];
							} catch (z) {}
						} 
						if(v2) {
							sdata[nm] = v;
							sdata[nm+"_2"] = v2;
							sdata['rangefield_'+range_type] = nm;
							sopt[nm] = so;
							sopt[nm+"_2"] = so;
							sopt['rangefield_'+range_type] = nm;
							j++;
						} else {
							try {
								delete $t.p.postData[nm];
								delete $t.p.postData[nm+"_2"];
								delete $t.p.postData['rangefield_'+range_type];
							} catch (z) {}
						}
						range_type++;
					}else{
						if(v || so==="nu" || so==="nn") {
							sdata[nm] = v;
							sopt[nm] = so;
							j++;
						} else {
							try {
								delete $t.p.postData[nm];
							} catch (z) {}
						}
					}
				});
				if(range_type > 0){
					sdata['range'] = range_type;
					sopt['range'] = range_type;
				}else{
					delete $t.p.postData['rangefield_'+range_type];
				}
				//END OF ADDITIONAL CUSTOMFIELDS;
				
				var sd =  j>0 ? true : false;
				if(p.stringResult === true || $t.p.datatype === "local") {
					var ruleGroup = "{\"groupOp\":\"" + p.groupOp + "\",\"rules\":[";
					var gi=0;
					$.each(sdata,function(i,n){
						if (gi > 0) {ruleGroup += ",";}
						ruleGroup += "{\"field\":\"" + i + "\",";
						ruleGroup += "\"op\":\"" + sopt[i] + "\",";
						n+="";
						ruleGroup += "\"data\":\"" + n.replace(/\\/g,'\\\\').replace(/\"/g,'\\"') + "\"}";
						gi++;
					});
					ruleGroup += "]}";
					$.extend($t.p.postData,{filters:ruleGroup});
					$.each(['searchField', 'searchString', 'searchOper'], function(i, n){
						if($t.p.postData.hasOwnProperty(n)) { delete $t.p.postData[n];}
					});
				} else {
					$.extend($t.p.postData,sdata);
				}
				var saveurl;
				if($t.p.searchurl) {
					saveurl = $t.p.url;
					$($t).jqGrid("setGridParam",{url:$t.p.searchurl});
				}
				var bsr = $($t).triggerHandler("jqGridToolbarBeforeSearch") === 'stop' ? true : false;
				if(!bsr && $.isFunction(p.beforeSearch)){bsr = p.beforeSearch.call($t);}
				if(!bsr) { $($t).jqGrid("setGridParam",{search:sd}).trigger("reloadGrid",[{page:1}]); }
				if(saveurl) {$($t).jqGrid("setGridParam",{url:saveurl});}
				$($t).triggerHandler("jqGridToolbarAfterSearch");
				if($.isFunction(p.afterSearch)){p.afterSearch.call($t);}
			},
			clearToolbar = function(trigger){
				var sdata={}, j=0, nm;
				trigger = (typeof trigger !== 'boolean') ? true : trigger;
				$.each($t.p.colModel,function(){
					var v, $elem = $("#gs_"+$.jgrid.jqID(this.name),(this.frozen===true && $t.p.frozenColumns === true) ?  $t.grid.fhDiv : $t.grid.hDiv);
					if(this.searchoptions && this.searchoptions.defaultValue !== undefined) { v = this.searchoptions.defaultValue; }
					nm = this.index || this.name;
					switch (this.stype) {
						case 'select' :
							$elem.find("option").each(function (i){
								if(i===0) { this.selected = true; }
								if ($(this).val() === v) {
									this.selected = true;
									return false;
								}
							});
							if ( v !== undefined ) {
								// post the key and not the text
								sdata[nm] = v;
								j++;
							} else {
								try {
									delete $t.p.postData[nm];
								} catch(e) {}
							}
							break;
						case 'text':
							$elem.val(v);
							if(v !== undefined) {
								sdata[nm] = v;
								j++;
							} else {
								try {
									delete $t.p.postData[nm];
								} catch (y){}
							}
							break;
						case 'custom':
							if ($.isFunction(this.searchoptions.custom_value) && $elem.length > 0 && $elem[0].nodeName.toUpperCase() === "SPAN") {
								this.searchoptions.custom_value.call($t, $elem.children(".customelement:first"), "set", v);
							}
							break;
						/******************************************************
							
							ADDED FOR RANGE TYPE FIELD
							AUTHOR	:	JERICK Y. DUGURAN
							DATE	:	MAY 2013
							
						******************************************************/
						
						case 'range': 
							var v2;
							var nm2 = this.name+"_2";
							
							if(this.searchoptions && this.searchoptions.defaultValue2 !== undefined) {
								v2 = this.searchoptions.defaultValue2; 
							}
				
							$("#gs_"+$.jgrid.jqID(this.name),(this.frozen===true && $t.p.frozenColumns === true) ?  $t.grid.fhDiv : $t.grid.hDiv).val(v);
							$("#gs_"+$.jgrid.jqID(this.name+"_2"),(this.frozen===true && $t.p.frozenColumns === true) ?  $t.grid.fhDiv : $t.grid.hDiv).val(v2);
							if(v !== undefined) {
								sdata[nm] = v;
								j++;
							} else {
								try {
									delete $t.p.postData[nm]; 
								} catch (y){}
							} 
							if(v2 !== undefined) {
								sdata[nm2] = v2;
								j++;
							} else {
								try {
									delete $t.p.postData[nm2]; 
								} catch (y){}
							} 
							try { 
									delete $t.p.postData['range']; 
									delete $t.p.postData[/^rangefield/i]; 
								} catch (y){}
							break;
					}
				});
				var sd =  j>0 ? true : false;
				if(p.stringResult === true || $t.p.datatype === "local") {
					var ruleGroup = "{\"groupOp\":\"" + p.groupOp + "\",\"rules\":[";
					var gi=0;
					$.each(sdata,function(i,n){
						if (gi > 0) {ruleGroup += ",";}
						ruleGroup += "{\"field\":\"" + i + "\",";
						ruleGroup += "\"op\":\"" + "eq" + "\",";
						n+="";
						ruleGroup += "\"data\":\"" + n.replace(/\\/g,'\\\\').replace(/\"/g,'\\"') + "\"}";
						gi++;
					});
					ruleGroup += "]}";
					$.extend($t.p.postData,{filters:ruleGroup});
					$.each(['searchField', 'searchString', 'searchOper'], function(i, n){
						if($t.p.postData.hasOwnProperty(n)) { delete $t.p.postData[n];}
					});
				} else {
					$.extend($t.p.postData,sdata);
				}
				var saveurl;
				if($t.p.searchurl) {
					saveurl = $t.p.url;
					$($t).jqGrid("setGridParam",{url:$t.p.searchurl});
				}
				var bcv = $($t).triggerHandler("jqGridToolbarBeforeClear") === 'stop' ? true : false;
				if(!bcv && $.isFunction(p.beforeClear)){bcv = p.beforeClear.call($t);}
				if(!bcv) {
					if(trigger) {
						$($t).jqGrid("setGridParam",{search:sd}).trigger("reloadGrid",[{page:1}]);
					}
				}
				if(saveurl) {$($t).jqGrid("setGridParam",{url:saveurl});}
				$($t).triggerHandler("jqGridToolbarAfterClear");
				if($.isFunction(p.afterClear)){p.afterClear();}
			},
			toggleToolbar = function(){
				var trow = $("tr.ui-search-toolbar",$t.grid.hDiv),
				trow2 = $t.p.frozenColumns === true ?  $("tr.ui-search-toolbar",$t.grid.fhDiv) : false;
				if(trow.css("display") === 'none') {
					trow.show(); 
					if(trow2) {
						trow2.show();
					}
				} else { 
					trow.hide(); 
					if(trow2) {
						trow2.hide();
					}
				}
			},
			buildRuleMenu = function( elem, left, top ){
				$("#sopt_menu").remove();

				left=parseInt(left,10);
				top=parseInt(top,10) + 18;

				var fs =  $('.ui-jqgrid-view').css('font-size') || '11px';
				var str = '<ul id="sopt_menu" class="ui-search-menu" role="menu" tabindex="0" style="font-size:'+fs+';left:'+left+'px;top:'+top+'px;">',				
				cm = $t.p.colModel[parseInt( $(elem).attr("colindex") )],
				selected = $(elem).attr("soper"), selclass,
				aoprs = [], i, ina, options = $.extend({}, cm.searchoptions);
				if(!options.sopt) {
					options.sopt = [];
					options.sopt[0]= cm.stype==='select' ?  'eq' : p.defaultSearch;
				}
				$.each(p.odata, function() { aoprs.push(this.oper); });
				for ( i = 0 ; i < options.sopt.length; i++) {
					ina = $.inArray(options.sopt[i],aoprs);
					if(ina !== -1) {
						selclass = selected === p.odata[ina].oper ? "ui-state-highlight" : "";
						str += '<li class="ui-menu-item '+selclass+'" role="presentation"><a href="#" class="ui-corner-all g-menu-item" tabindex="0" role="menuitem" value="'+p.odata[ina].oper+'" oper="'+p.operands[p.odata[ina].oper]+'"><table cellspacing="0" cellpadding="0" border="0"><tr><td width="25px">'+p.operands[p.odata[ina].oper]+'</td><td>'+ p.odata[ina].text+'</td></tr></table></a></li>';
					}
				}
				str += "</ul>";
				$('body').append(str);
				$("#sopt_menu").addClass("ui-menu ui-widget ui-widget-content ui-corner-all");
				$("#sopt_menu > li > a").hover(
					function(){ $(this).addClass("ui-state-hover"); },
					function(){ $(this).removeClass("ui-state-hover"); }
				).click(function( e ){
					var v = $(this).attr("value"),
					oper = $(this).attr("oper");
					$($t).triggerHandler("jqGridToolbarSelectOper", [v, oper, elem]);
					$("#sopt_menu").hide();
					$(elem).text(oper).attr("soper",v);
					if(p.autosearch===true){
						var inpelm = $(elem).parent().next().children()[0];
						if( $(inpelm).val() || v==="nu" || v ==="nn") {
							triggerToolbar();
						}
					}
				});
			};
			// create the row
			var tr = $("<tr class='ui-search-toolbar' role='rowheader'></tr>");
			var timeoutHnd;
			$.each($t.p.colModel,function(colindex){
				var cm=this, soptions, surl, self, select = "", sot="=", so,
				th = $("<th role='columnheader' class='ui-state-default ui-th-column ui-th-"+$t.p.direction+"'></th>"),
				thd = $("<div style='position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;'></div>"),
				stbl = $("<table class='ui-search-table' cellspacing='0'><tr><td class='ui-search-oper'></td><td class='ui-search-input'></td></tr></table>");
				if(this.hidden===true) { $(th).css("display","none");}
				this.search = this.search === false ? false : true;
				if(this.stype === undefined) {this.stype='text';}
				soptions = $.extend({},this.searchoptions || {});
				if(this.search){
					if(p.searchOperators) {
						so  = (soptions.sopt) ? soptions.sopt[0] : cm.stype==='select' ?  'eq' : p.defaultSearch;
						for(var i = 0;i<p.odata.length;i++) {
							if(p.odata[i].oper === so) {
								sot = p.operands[so] || "";
								break;
							}
						}
						var st = soptions.searchtitle != null ? soptions.searchtitle : p.operandTitle;
						select = "<a href='#' title='"+st+"' style='padding-right: 0.5em;' soper='"+so+"' class='soptclass' colindex='"+colindex+"'>"+sot+"</a>";
					}
					$("td:eq(0)",stbl).append(select);
					switch (this.stype)
					{
					case "select":
						surl = this.surl || soptions.dataUrl;
						if(surl) {
							// data returned should have already constructed html select
							// primitive jQuery load
							self = thd;
							$.ajax($.extend({
								url: surl,
								dataType: "html",
								success: function(res) {
									if(soptions.buildSelect !== undefined) {
										var d = soptions.buildSelect(res);
										if (d) {
											$("td:eq(1)",stbl).append(d);
											$(self).append(stbl);
										}
									} else {
										$("td:eq(1)",stbl).append(res);
										$(self).append(stbl);
									}
									if(soptions.defaultValue !== undefined) { $("select",self).val(soptions.defaultValue); }
									$("select",self).attr({name:cm.index || cm.name, id: "gs_"+cm.name});
									if(soptions.attr) {$("select",self).attr(soptions.attr);}
									$("select",self).css({width: "100%"});
									// preserve autoserch
									$.jgrid.bindEv.call($t, $("select",self)[0], soptions);
									if(p.autosearch===true){
										$("select",self).change(function(){
											triggerToolbar();
											return false;
										});
									}
									res=null;
								}
							}, $.jgrid.ajaxOptions, $t.p.ajaxSelectOptions || {} ));
						} else {
							var oSv, sep, delim;
							if(cm.searchoptions) {
								oSv = cm.searchoptions.value === undefined ? "" : cm.searchoptions.value;
								sep = cm.searchoptions.separator === undefined ? ":" : cm.searchoptions.separator;
								delim = cm.searchoptions.delimiter === undefined ? ";" : cm.searchoptions.delimiter;
							} else if(cm.editoptions) {
								oSv = cm.editoptions.value === undefined ? "" : cm.editoptions.value;
								sep = cm.editoptions.separator === undefined ? ":" : cm.editoptions.separator;
								delim = cm.editoptions.delimiter === undefined ? ";" : cm.editoptions.delimiter;
							}
							if (oSv) {	
								var elem = document.createElement("select");
								elem.style.width = "100%";
								$(elem).attr({name:cm.index || cm.name, id: "gs_"+cm.name});
								var so, sv, ov, key, k;
								if(typeof oSv === "string") {
									so = oSv.split(delim);
									for(k=0; k<so.length;k++){
										sv = so[k].split(sep);
										ov = document.createElement("option");
										ov.value = sv[0]; ov.innerHTML = sv[1];
										elem.appendChild(ov);
									}
								} else if(typeof oSv === "object" ) {
									for (key in oSv) {
										if(oSv.hasOwnProperty(key)) {
											ov = document.createElement("option");
											ov.value = key; ov.innerHTML = oSv[key];
											elem.appendChild(ov);
										}
									}
								}
								if(soptions.defaultValue !== undefined) { $(elem).val(soptions.defaultValue); }
								if(soptions.attr) {$(elem).attr(soptions.attr);}
								$.jgrid.bindEv.call($t, elem , soptions);
								$("td:eq(1)",stbl).append( elem );
								$(thd).append(stbl);
								if(p.autosearch===true){
									$(elem).change(function(){
										triggerToolbar();
										return false;
									});
								}
							}
						}
						break;
					case "text":
						var df = soptions.defaultValue !== undefined ? soptions.defaultValue: "";

						$("td:eq(1)",stbl).append("<input type='text' style='width:100%;padding:0px;' name='"+(cm.index || cm.name)+"' id='gs_"+cm.name+"' value='"+df+"'/>");
						$(thd).append(stbl);

						if(soptions.attr) {$("input",thd).attr(soptions.attr);}
						$.jgrid.bindEv.call($t, $("input",thd)[0], soptions);
						if(p.autosearch===true){
							if(p.searchOnEnter) {
								$("input",thd).keypress(function(e){
									var key = e.charCode || e.keyCode || 0;
									if(key === 13){
										triggerToolbar();
										return false;
									}
									return this;
								});
							} else {
								$("input",thd).keydown(function(e){
									var key = e.which;
									switch (key) {
										case 13:
											return false;
										case 9 :
										case 16:
										case 37:
										case 38:
										case 39:
										case 40:
										case 27:
											break;
										default :
											if(timeoutHnd) { clearTimeout(timeoutHnd); }
											timeoutHnd = setTimeout(function(){triggerToolbar();},500);
									}
								});
							}
						}
						break;
					case "custom":
						$("td:eq(1)",stbl).append("<span style='width:95%;padding:0px;' name='"+(cm.index || cm.name)+"' id='gs_"+cm.name+"'/>");
						$(thd).append(stbl);
						try {
							if($.isFunction(soptions.custom_element)) {
								var celm = soptions.custom_element.call($t,soptions.defaultValue !== undefined ? soptions.defaultValue: "",soptions);
								if(celm) {
									celm = $(celm).addClass("customelement");
									$(thd).find(">span").append(celm);
								} else {
									throw "e2";
								}
							} else {
								throw "e1";
							}
						} catch (e) {
							if (e === "e1") { $.jgrid.info_dialog($.jgrid.errors.errcap,"function 'custom_element' "+$.jgrid.edit.msg.nodefined,$.jgrid.edit.bClose);}
							if (e === "e2") { $.jgrid.info_dialog($.jgrid.errors.errcap,"function 'custom_element' "+$.jgrid.edit.msg.novalue,$.jgrid.edit.bClose);}
							else { $.jgrid.info_dialog($.jgrid.errors.errcap,typeof e==="string"?e:e.message,$.jgrid.edit.bClose); }
						}
						break;
						
						
						/**************************************************************						
							ADDED BY :  NETBOOSERASIA PH (J.Y.D)
							DATE     :  JULY 17,2012							
							
						**************************************************************/
						
						case 'range': 	
						
							//DEFAULT VALUE FOR FIELD 1
							var df = soptions.defaultValue !== undefined ? soptions.defaultValue: "";
							
							// DEFAULT VALUE FOR FIELD 2
							var df2 = soptions.defaultValue2 !== undefined ? soptions.defaultValue2: "";
							
							//FIELD 1 ELEMENT
							$(thd).append("<input type='text' style='width:95%;padding:0px;' name='"+(cm.index || cm.name)+"' id='gs_"+cm.name+"' value='"+df+"'/>");
							
							//FIELD 2 ELEMENT
							$(thd).append("<br/><input type='text' style='width:95%;padding:0px;' name='"+(cm.index || cm.name)+"_2' id='gs_"+cm.name+"_2' value='"+df2+"'/>");
						
							if(soptions.attr) {$("input",thd).attr(soptions.attr);}
							
							//INPUT INIT FOR THE FIRST 
							if(soptions.dataInit !== undefined) { soptions.dataInit($("input",thd)[0]);}
							
							//INPUT INIT FOR THE SECOND 
							if(soptions.dataInit !== undefined) { soptions.dataInit($("input",thd)[1]);} 
							
							//ADD EVENT FOR THE FIRST INPUT FOR RANGE (DEFAULT)
							if(soptions.dataEvents !== undefined) { bindEvents($("input",thd)[0], soptions.dataEvents); }
							
							//ADD EVENT FOR THE SECOND INPUT FOR RANGE
							if(soptions.dataEvents !== undefined) { bindEvents($("input",thd)[1], soptions.dataEvents); }
							
							if(p.autosearch===true){
								if(p.searchOnEnter){
									$("input",thd).keypress(function(e){
										var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
										if(key == 13){
											triggerToolbar();
											return false;
										}
										return this;
									});
								} else {
									$("input",thd).keydown(function(e){
										var key = e.which;
										switch (key) {
											case 13:
												return false;
											case 9 :
											case 16:
											case 37:
											case 38:
											case 39:
											case 40:
											case 27:
												break;
											default :
												if(timeoutHnd) { clearTimeout(timeoutHnd); }
												timeoutHnd = setTimeout(function(){triggerToolbar();},500);
										}
									});
								}
							} 
						break;
					}
				}
				$(th).append(thd);
				$(tr).append(th);
				if(!p.searchOperators) {
					$("td:eq(0)",stbl).hide();
				}
			});
			$("table thead",$t.grid.hDiv).append(tr);
			if(p.searchOperators) {
				$(".soptclass").click(function(e){
					var offset = $(this).offset(),
					left = ( offset.left ),
					top = ( offset.top);
					buildRuleMenu(this, left, top );
				});
			}
			this.ftoolbar = true;
			this.triggerToolbar = triggerToolbar;
			this.clearToolbar = clearToolbar;
			this.toggleToolbar = toggleToolbar;
		});
}