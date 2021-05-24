var final_page = Number(document.querySelectorAll('.page-link')[7].innerHTML)
if (final_page >= 3) 
{
	var href_autopage = document.URL.split("/")		
	if (href_autopage[5] >= 2) 
	{
		var pages_select = document.querySelectorAll('.pages-number')[2].innerHTML
		document.querySelectorAll('.pages-number')[0].innerHTML = href_autopage[5]
		document.querySelectorAll('.pages-number')[1].innerHTML = Number(href_autopage[5]) + 1
		document.querySelectorAll('.pages-number')[2].innerHTML = Number(href_autopage[5]) + 2		
	}

	function next_page()
	{
		document.querySelectorAll('.pages-number')[0].innerHTML = Number(document.querySelectorAll('.pages-number')[0].innerHTML) + 1
		document.querySelectorAll('.pages-number')[1].innerHTML = Number(document.querySelectorAll('.pages-number')[1].innerHTML) + 1
		document.querySelectorAll('.pages-number')[2].innerHTML = Number(document.querySelectorAll('.pages-number')[2].innerHTML) + 1

		//Href pages

		href[5] = "";
		for (var i = 0; i < 3; i++) 
		{
		document.querySelectorAll('.pages-number')[i].href = href.toString().replace(/,/g,'/') + document.querySelectorAll('.pages-number')[i].innerHTML
		}

		//End Href pages

	}
	function previous_page()
	{
		if (Number(document.querySelectorAll('.pages-number')[0].innerHTML) > 1) 
		{
		document.querySelectorAll('.pages-number')[0].innerHTML = Number(document.querySelectorAll('.pages-number')[0].innerHTML) - 1
		document.querySelectorAll('.pages-number')[1].innerHTML = Number(document.querySelectorAll('.pages-number')[1].innerHTML) - 1
		document.querySelectorAll('.pages-number')[2].innerHTML = Number(document.querySelectorAll('.pages-number')[2].innerHTML) - 1

		//Href pages

		href[5] = "";
		for (var i = 0; i < 3; i++) 
		{
		document.querySelectorAll('.pages-number')[i].href = href.toString().replace(/,/g,'/') + document.querySelectorAll('.pages-number')[i].innerHTML
		}

		//End Href pages

		}
	}
	function first_page()
	{
		document.querySelectorAll('.pages-number')[0].innerHTML = 1
		document.querySelectorAll('.pages-number')[1].innerHTML = 2
		document.querySelectorAll('.pages-number')[2].innerHTML = 3

		//Href pages

		href[5] = "";
		for (var i = 0; i < 3; i++) 
		{
		document.querySelectorAll('.pages-number')[i].href = href.toString().replace(/,/g,'/') + document.querySelectorAll('.pages-number')[i].innerHTML
		}

		//End Href pages

	}
	function finally_page()
	{
		document.querySelectorAll('.pages-number')[0].innerHTML = final_page - 2
		document.querySelectorAll('.pages-number')[1].innerHTML = final_page - 1
		document.querySelectorAll('.pages-number')[2].innerHTML = final_page

		//Href pages

		href[5] = "";
		for (var i = 0; i < 3; i++) 
		{
		document.querySelectorAll('.pages-number')[i].href = href.toString().replace(/,/g,'/') + document.querySelectorAll('.pages-number')[i].innerHTML
		}

		//End Href pages

	}	
}
else if (final_page == 1)
{
	document.querySelectorAll('.pages-number')[0].innerHTML = final_page
	document.querySelectorAll('.pages-number')[1].hidden = true
	document.querySelectorAll('.pages-number')[2].hidden = true	
}
else if (final_page == 2)
{
	document.querySelectorAll('.pages-number')[0].innerHTML = final_page - 1
	document.querySelectorAll('.pages-number')[1].innerHTML = final_page
	document.querySelectorAll('.pages-number')[2].hidden = true	
}
else
{
	document.querySelectorAll('.pages-number')[0].innerHTML = 1
	document.querySelectorAll('.pages-number')[1].hidden = true
	document.querySelectorAll('.pages-number')[2].hidden = true		
}

//Href pages

var href = document.URL.split("/")
href[5] = "";
for (var i = 0; i < 3; i++) 
{
document.querySelectorAll('.pages-number')[i].href = href.toString().replace(/,/g,'/') + document.querySelectorAll('.pages-number')[i].innerHTML
}

//End Href pages

// View to id = pageination when reload pages
if (document.URL !== "http://localhost/shop/show-goods-all-all/1") 
{
	if (document.URL == document.querySelectorAll('.pages-number')[0].href ||
		document.URL == document.querySelectorAll('.pages-number')[1].href
		|| document.URL == document.querySelectorAll('.pages-number')[2].href) 
	{
		document.getElementById('pageination').scrollIntoView();	
	}	
}

