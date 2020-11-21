ft_list = $('#ft_list');
$(document).ready(function ()
{
	$.fn.fill_todo();
});

$.fn.fill_todo = function ()
{
	ft_list.empty();
	$.ajax({
		method: 'GET',
		url: 'select.php'
	})
	.done(function(data)
	{
		ft_list.empty();
		data = jQuery.parseJSON(data);
		jQuery.each(data, function(id, value)
		{
			$.fn.add_todo(value, id, false);
		});
	})
	.fail(function (msg) {
		alert('ERROR: ' + msg);
	});
}

$.fn.add_todo = function(todo, todo_id, is_new)
{
	let new_todo = jQuery("<div class='todo_elem' id='" + todo_id + "'>"
		 + todo + "</div>");
	ft_list.prepend(new_todo);
	if (is_new)
		$.ajax({
			method: 'GET',
			url: 'insert.php?id=' + todo_id + '&value=' + todo
		})
		.fail(function (msg) {
			alert('ERROR: ' + msg);
		});
}

$("#ft_list").on("click", "div", function delete_todo(event) {
	if (confirm("Do you want to remove the item?"))
	{	
		$.ajax({
			method: 'GET',
			url: 'delete.php?id=' + this.id,
		})
		.done(function ()
		{
			$.fn.fill_todo();
		})
		.fail(function (msg) {
			alert('ERROR: ' + msg);
		});
	}
});

$('#new_todo_btn').click(function()
{
	let new_todo = prompt("Write your next TODO");
	if (new_todo != null && new_todo != "")
	{
		$.fn.add_todo(new_todo, Date.now(), true);
	}
});