
function add_new_todo()
{
	var new_todo = prompt("Write your next TODO");
	var new_todo_div = document.createElement("div");
	new_todo_div.classList.add("todo_elem");
	new_todo_div.innerHTML += new_todo;
	var parent_div = document.getElementById("ft_list");
	parent_div.insertBefore(new_todo_div, parent_div.firstChild);
	new_todo_div.setAttribute("onclick", "delete_todo(this)");
}

function delete_todo(todo)
{
	if (confirm("Do you want to remove the item?"))
		todo.remove();
}