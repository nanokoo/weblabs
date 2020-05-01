function init_shopping_cart(name)
{
	document.getElementById('name_container').innerHTML =
		'<h2>' + name + ' Shopping Cart</h2>';

	refresh_shopping_list();
}

// Remove an item from the individual shopping list and refresh the table
function remove_item(name)
{
	var shopping_list = JSON.parse(localStorage.getItem(get_cookie("name")));

	delete shopping_list[name];

	localStorage.setItem(get_cookie("name"), JSON.stringify(shopping_list));
	refresh_shopping_list();
}


function refresh_shopping_list()
{
	var shopping_list = JSON.parse(localStorage.getItem(get_cookie("name")));

	if (typeof shopping_list == "undefined")
	{
		localStorage.setItem(get_cookie("name"), '{}')
		shopping_list = JSON.parse(localStorage.getItem(get_cookie("name")));
	}

	var table = document.getElementById('items_table');
	var inner = "<tr><th>Number</th><th>Name</th><th>Quantity</th></tr>";
	var i = 1;
	for (var key in shopping_list) {
    if (shopping_list.hasOwnProperty(key))
		{
				key_ph = "'" + key + "'";
        inner = inner + '<tr onclick="remove_item(' + key_ph + ')"><td>' + i + "." +
					"</td><td>" + key + "</td><td>" + shopping_list[key] + "</td></tr>";
    }
		i++;
	}
	table.innerHTML = inner;
}


function add_new_item()
{
	var item_name = document.getElementById('item_name').value;
	var item_q = document.getElementById('item_quantity').value;
	if (item_name == "" || item_q == "")
	{
		alert("Specify both the name and quantity of the item to add it!");
		return;
	}
	if (localStorage.getItem(get_cookie("name")))
	{
		var json_s_list = JSON.parse(localStorage.getItem(get_cookie("name")));
		if (json_s_list.hasOwnProperty(item_name))
		{
			json_s_list[item_name] = Number(json_s_list[item_name]) + Number(item_q);
		}
		else
		{
			json_s_list[item_name] = Number(item_q);
		}
		localStorage.setItem(get_cookie("name"), JSON.stringify(json_s_list));
		refresh_shopping_list();
	}
	else
	{
		var shopping_list = '{}';
		shopping_list = JSON.parse(shopping_list);
		shopping_list[item_name] = item_q;

		localStorage.setItem(get_cookie("name"), JSON.stringify(shopping_list));
		refresh_shopping_list();
	}

	document.getElementById('item_name').value = "";
	document.getElementById('item_quantity').value = "";
}


function get_cookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


function check_shopping_info()
{
  var name = get_cookie("name");
  if (name != "")
	{
    init_shopping_cart(name);
  }
	else
	{
    name = prompt("Please enter your name:", "");
    if (name != "" && name != null)
		{
      document.cookie = "name=" + name + ";";
			init_shopping_cart(name);
    }
		else
		{
			check_shopping_info();
		}
  }
}
