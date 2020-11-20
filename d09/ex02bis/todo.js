var cookie_prefix = "tdCookie_";
var cookies = document.cookie.split(";");

$(document).ready(function ()
{
	var cookie_value;
	var todo_id;
	for (var i = 1; i <= cookies.length; i++)
	{
		if (cookies[i - 1].includes(cookie_prefix, 0))
		{
			todo_id = cookies[i - 1].split("=")[0].split("_")[1];
			cookie_value = cookies[i - 1].split("=")[1];
			$.fn.add_todo(cookie_value, todo_id);
		}
	}
});

$.fn.add_todo = function(todo, todo_id)
{
	var $new_todo = jQuery("<div class='todo_elem' id='" + todo_id + "'>"
		+ todo + "</div>");
	$("#ft_list").prepend($new_todo);
	$.fn.setCookie(cookie_prefix + todo_id, todo);
}

$("#ft_list").on("click", "div", function (event) {
	if (confirm("Do you want to remove the item?"))
	{	
		this.remove();
		document.cookie = cookie_prefix + this.id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	}
});

$('#new_todo_btn').click(function()
{
	var new_todo = prompt("Write your next TODO");
	if (new_todo != null && new_todo != "")
	{
		$.fn.add_todo(new_todo, Date.now());
	}
});

$.fn.setCookie = function(cookie_name, cookie_value)
{
	var d = new Date();
	var cookie_time = 1 * 3600 * 1000;
	d.setTime(d.getTime() + cookie_time);
	var expires = "expires=" + d.toUTCString();
	document.cookie = cookie_name + "=" + cookie_value + ";" + expires;
}