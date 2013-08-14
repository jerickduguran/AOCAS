<?php $module = SfContext::getInstance()->getRequest()->getParameter("module",rand(1234,100000));?>
<a href="<?php echo url_for("library/new");?>" class="buttons"><?php echo image_tag("icons/add.png");?>Add </a>
	<a href="" class="buttons">Print</a>
	<a href="" class="buttons">Import</a>
	<a href="" class="buttons"> Export</a>   
		 

<div class="search">
	<input type="text" class="searchbox"/>
	<a href="" class="buttons">Search</a>
</div>	 
<div style="margin-top:20px;">
	<table id="<?php echo $module;?>_list"><tr><td/></tr></table> 
	<div id="<?php echo $module;?>_pager"></div> 
</div>

<script type="text/javascript">
$(function(){ 
  $("#<?php echo $module;?>_list").jqGrid({
    url:'<?php echo url_for("library/lists");?>',
    datatype: 'json',
    mtype: 'GET',
    colNames:['Code','Name','Email', 'City','Status','Created At','Updated At'],
    colModel :[  
      {name:'code', index:'code', width:55 }, 
      {name:'name', index:'name', width:90 }, 
      {name:'email', index:'email', width:80, align:'right'}, 
      {name:'city', index:'city', width:80, align:'right' }, 
      {name:'status', index:'status', width:80, align:'right',stype: 'select', searchoptions: {dataUrl: "<?php echo url_for("library/getstatuslists");?>"}}, 
      {name:'created_at', index:'created_at', width:80, align:'right'}, 
      {name:'updated_at',index:'updated_at', width:133, align: "center", enableClear: true, stype: "range",
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
		}
    ],
    pager: '#<?php echo $module;?>_pager',
    rowNum:10,
    rowList:[10,20,30,40,50,100,1000],
    sortname: 'code',
    sortorder: 'ASC',
	multiselect: true,
	height: 	 221,
	width:       1000,
    viewrecords: true,
    gridview: true,
    caption: 'General Library'
  }); 
	jQuery("#<?php echo $module;?>_list").jqGrid('navGrid','#<?php echo $module;?>_pager',{view:false,search:false,add: false,edit: false,del:false});  
	jQuery("#<?php echo $module;?>_list").jqGrid('gcrossFilterToolbar',{stringResult: false,searchOnEnter : false});
}); 
</script>