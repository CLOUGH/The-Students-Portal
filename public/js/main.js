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
});