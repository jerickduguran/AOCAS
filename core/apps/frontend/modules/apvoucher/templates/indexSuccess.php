<?php slot("content_title");?>
	Accounts Payable Voucher Lists
<?php end_slot();?>

<?php $module = SfContext::getInstance()->getRequest()->getParameter("module",rand(1234,100000));?>
	<a href="javascript:initAddApVoucher();" class="buttons"><?php echo image_tag("icons/add.png");?>New Voucher</a>
	<a href="javascript:void(0);" class="buttons" id="print"><?php echo image_tag("icons/add.png");?>Print</a>
	<a href="javascript:void(0);" class="buttons" id="import"><?php echo image_tag("icons/add.png");?>Import</a>
	<a href="javascript:void(0);" class="buttons" id="export"><?php echo image_tag("icons/add.png");?>Export</a>   
		 

<div class="search">
	<input type="text" class="searchbox"/>
	<a href="" class="buttons">Search</a>
</div>	 
<div class="content">	
	<div style="margin-top:20px;">
		<table id="<?php echo $module;?>_list"><tr><td/></tr></table> 
		<div id="<?php echo $module;?>_pager"></div> 
		<form method="POST" target="_blank"  id="<?php echo $module;?>_export"> 
			<div id="additional_params"></div>
		</form>	
	</div>
</div>
 
 

<script type="text/javascript">
$(function(){ 
  $("#<?php echo $module;?>_list").jqGrid({
    url:'<?php echo url_for("apvoucher/lists");?>',
    datatype: 'json',
    mtype: 'GET',
    colNames:['ID','Book','Voucher Number','Total Amount','Currency','Due Date','Status','Created At','Action'],
    colModel :[  
      {name:'id', index:'id', width:30 },   
      {name:'book_id', index:'book_id', width:30, align: "left" },    
      {name:'voucher_number', index:'voucher_number', width:65, align: "left" },    
      {name:'total_amount', index:'total_amount', width:65, align: "right" },    
      {name:'currency_id', index:'currency_id', width:55 },    
      {name:'due_date', index:'due_date', width:70, align:'center', stype: "range",
				searchoptions: {
					dataInit: function (elem) {   	 								
						//Init Datepicker for this element
						$(elem).datepicker({
							changeYear: true,
							changeMonth: true,  
							dateFormat: 'mm/dd/yy',	  
							showButtonPanel: true,
							beforeShow: function(elm){  
								//PUT THIS CODE IF DATA TYPE IS DATE AND FIELD TYPE IS "range"
								var target_element;
								var target_id = $(elm).attr('id');
								
								if(target_id.match(/_2$/i))
								{  											
									target_element = target_id.replace(/_2$/i,''); 												
									return {
									  minDate: $("#"+target_element).datepicker("getDate")
									};
								}else
								{ 																				
									target_element = target_id+"_2"; 												
									return {
									  maxDate: $("#"+target_element).datepicker("getDate")
									};
								}
							},
							onSelect: function() {
								if (this.id.substr(0, 3) === "gs_") {  
										$("#<?php echo $module;?>_list")[0].triggerToolbar(); 
								}  
							}    
						}); 
					}
				}
			}, 
			{name:'status', index:'status', width:55, align:'center', }, 
			{name:'created_at', index:'created_at', width:70, align:'center', stype: "range",
				searchoptions: {
					dataInit: function (elem) {   	 								
						//Init Datepicker for this element
						$(elem).datepicker({
							changeYear: true,
							changeMonth: true,  
							dateFormat: 'mm/dd/yy',	  
							showButtonPanel: true,
							beforeShow: function(elm){  
								//PUT THIS CODE IF DATA TYPE IS DATE AND FIELD TYPE IS "range"
								var target_element;
								var target_id = $(elm).attr('id');
								
								if(target_id.match(/_2$/i))
								{  											
									target_element = target_id.replace(/_2$/i,''); 												
									return {
									  minDate: $("#"+target_element).datepicker("getDate")
									};
								}else
								{ 																				
									target_element = target_id+"_2"; 												
									return {
									  maxDate: $("#"+target_element).datepicker("getDate")
									};
								}
							},
							onSelect: function() {
								if (this.id.substr(0, 3) === "gs_") {  
										$("#<?php echo $module;?>_list")[0].triggerToolbar(); 
								}  
							}    
						}); 
					}
				}
			},  
		{name: 'action', width:68,align:'center', sortable:false,search: false, enableClear: true}
    ],
    pager: '#<?php echo $module;?>_pager',
    rowNum:10,
    rowList:[10,20,30,40,50,100,1000],
    sortname: 'symbol',
    sortorder: 'ASC',
	multiselect: true,
	height: 	 221,
	width:       1000,
    viewrecords: true,
    gridview: true,
    caption: '&nbsp;',
	gridComplete: function()
	{
		var ids = jQuery("#<?php echo $module;?>_list").jqGrid('getDataIDs');
		for(var i=0;i < ids.length;i++)
		{ 
			var cl = ids[i]; 
				ve = '<a title="View" href="<?php echo url_for('apvoucher/show?id=');?>'+cl+'"><?php echo image_tag('grid_show_icon.png',array('style'=>'width:15px;height:15px;'));?></a>';
				be = '<a title="Edit" href="<?php echo url_for('apvoucher/edit?id=');?>'+cl+'"><?php echo image_tag('grid_edit_icon.png',array('style'=>'width:15px;height:15px;'));?></a>';
				db = '<a title="Delete" id="delete" href="javascript:remove('+cl+')"><?php echo image_tag('grid_delete_icon.png',array('style'=>'width:15px;height:15px;'));?></a>';
				
				jQuery("#<?php echo $module;?>_list").jqGrid('setRowData',ids[i],{action:' '+ve+ '  '+ be+ '  ' +db});
		}   
	}, 
	loadComplete: function(res)
	{  
		prepareExport();
	
	}
  }); 
	jQuery("#<?php echo $module;?>_list").jqGrid('navGrid','#<?php echo $module;?>_pager',{view:false,search:false,add: false,edit: false,del:false});  
	jQuery("#<?php echo $module;?>_list").jqGrid('gcrossFilterToolbar',{stringResult: false,searchOnEnter : false});

	//trigger for export
	$("#export").click(function(){
		$("form#<?php echo $module;?>_export").submit();
	});
}); 


function prepareExport()
{ 	 
	var postData = jQuery("#<?php echo $module;?>_list").jqGrid('getGridParam', 'postData');		
	var _filters = $('<div></div>');
	
	$.each(postData, function(key, value) { 
	  _filters.append('<input type="hidden" name="'+key+'" value="'+encodeURIComponent(value)+'"/>');
	}); 
	
	var frm 	= $('form#<?php echo $module;?>_export').attr('action','<?php echo url_for("apvoucher/export?");?>');  
	frm.find('#additional_params').html('').append(_filters);
}

function initAddApVoucher()
{
	$.ajax({
			url: '<?php echo url_for("apvoucher/initCreateapvoucher");?>',
		    type: 'json', 
			method: 'POST',
			success: function(resp){
				var _resp =  eval("("+resp+")");				
				if(_resp.has_data){ 
					$(".init_create_voucher_popup").html(_resp.data);
					$('.init_create_voucher_popup .init_add_ap_voucher').bPopup({modalColor: '#C821A1',modalClose: false,closeClass:'btnBack'},  function() {
						$(".init_add_ap_voucher").css("height","248px;");						
						$(".datepicker_s").datepicker({dateFormat: "MM d, yy"});
						$(".btnPrint").click(function(){
							$("form#form_create_ap_voucher").submit();
						});
					});	
				}else{
					alert('Please reload page!');
				}				
			}
		});
}
</script> 
				
<div style="display:none;">
	<div class="init_create_voucher_popup"></div>
</div>