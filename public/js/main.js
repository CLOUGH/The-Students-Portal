function redirect(url)
{
	window.location.replace(url);
}
$(document).ready(function(){
	$(".search_list_row").hover(function(){
		$(this).css("cursor","pointer");
		$(this).css("cursor","hand");
	},function(){
		$(this).css("cursor","default");
	});

	//Enable the bootstrap tab feature to display different sections onclick
	$('#myTab a').click(function (e)
	{
		console.log('sddss')
		e.preventDefault();
		$(this).tab('show');
	})
	$('.toggle_course_scehdule').click(function()
	{
		var hidden_schedule=".hidden-schedule-table[id="+$(this).attr('id')+"]";
		if($(hidden_schedule).css('display')=='none')
		{
			$(hidden_schedule).show(400);
			$("a[id="+$(this).attr('id')+"] i").attr('class', 'icon-chevron-up');
		}
		else{
			$(hidden_schedule).hide(400);
			$("a[id="+$(this).attr('id')+"] i").attr('class', 'icon-chevron-down');
		}
	});
	$('.toggle_course_scehdule').click(function()
	{
		var hidden_schedule=".hidden-schedule-table[id="+$(this).attr('id')+"]";
		if($(hidden_schedule).css('display')=='none')
		{
			$(hidden_schedule).show(400);
			$("a[id="+$(this).attr('id')+"] i").attr('class', 'icon-chevron-up');
		}
		else{
			$(hidden_schedule).hide(400);
			$("a[id="+$(this).attr('id')+"] i").attr('class', 'icon-chevron-down');
		}
	});
	/*********************************************************************************************************
	Functions that are used to controll how the Academic Generation Page Behaves
	*********************************************************************************************************/

	//Disable the ablility to click  a tab link and navigate to the next tab except the fist tab (Discription)
	$.each($('.tab_link'),function()
	{	
		if($(this).parent().attr('id')!='tab1')
			$(this).bind('click', false);
		
	});
	//When the next or start button is click enable both link and tab 
	$('.academic_pages a').click(function (e){
		e.preventDefault();

		var display_div = "#tab"+$(this).attr("href").substring(1);
		$(display_div).removeClass("disabled");
		$(display_div+" .tab_link").first().unbind('click', false);
		$(display_div+" .tab_link").first().click();
	});

	//if the student id is change diable the ablitity to navigate to the next tab
	//thus forcing the user to regenerate back over the page through the next button
	$('[name=student_id]').change(function()
	{
		$.each($('.tab_link'),function()
		{	
			if($(this).parent().attr('id').substring(3)>2)
				$(this).bind('click', false);
				$(this).addClass("disabled");
		});
		//$("#tab3").addClass("disabled");
		//$("#tab3 .tab_link").first().bind('click', false);
	});
});

