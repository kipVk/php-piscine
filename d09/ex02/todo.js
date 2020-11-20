var cookie_prefix = "td_cookie_";
var cookies = document.cookie.split(";");

window.onload = function ()
{
	var cookie_value;
	for (var i = 1; i <= cookies.length; i++)
	{
		if (cookies[i - 1].includes(cookie_prefix, 0))
		{
			cookie_value = cookies[i - 1].split("=")[1];
			add_todo(cookie_value);
		}
	}
};

function add_todo(todo)
{
	var new_todo_div = document.createElement("div");
	new_todo_div.classList.add("todo_elem");
	new_todo_div.innerHTML += todo;
	var parent_div = document.getElementById("ft_list");
	var todo_num = parent_div.getElementsByTagName('*').length;
	new_todo_div.setAttribute("id", todo_num);
	parent_div.insertBefore(new_todo_div, parent_div.firstChild);
	new_todo_div.setAttribute("onclick", "delete_todo(this)");
	setCookie(cookie_prefix + new_todo_div.id, todo);
}

function add_new_todo()
{
	var new_todo = prompt("Write your next TODO");
	if (new_todo != null && new_todo != "")
	{
		add_todo(new_todo);
	}
}

function setCookie(cookie_name, cookie_value)
{
	var d = new Date();
	var cookie_time = 1 * 3600 * 1000;
	d.setTime(d.getTime() + cookie_time);
	var expires = "expires=" + d.toUTCString();
	document.cookie = cookie_name + "=" + cookie_value + ";" + expires;
}

function delete_todo(todo)
{
	if (confirm("Do you want to remove the item?"))
	{	
		todo.remove();
		document.cookie = cookie_prefix + todo.id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	}
}

