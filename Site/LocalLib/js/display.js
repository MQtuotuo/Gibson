$(function(){

	function Add(){
		$("#table tbody").append(
			"<tr>"+
			"<td><input type='text'/></td>"+
			"<td><input type='checkbox'/></td>"+
			"<td><input type='checkbox'/></td>"+
			"<td><img src='../images/disk.png' class='btnSave'><img src='../images/delete.png' class='btnDelete'/></td>"+
			"</tr>");
	
		$(".btnSave").bind("click", Save);		
		$(".btnDelete").bind("click", Delete);
	};

	function Edit(){
		var par = $(this).parent().parent(); //tr
		var tdNome = par.children("td:nth-child(1)");
		var tdDate1 = par.children("td:nth-child(2)");
		var tdDate2 = par.children("td:nth-child(3)");
		var tdBotoes = par.children("td:nth-child(4)");

		tdNome.html("<input type='text' id='txtNome' value='"+tdNome.html()+"'/>");
		tdDate1.html("<input type='checkbox' id='txtDate1' value='"+tdDate1.val()+"'/>");
		tdDate2.html("<input type='checkbox' id='txtDate2' value='"+tdDate2.val()+"'/>");
		tdBotoes.html("<img src='../images/disk.png' class='btnSave'/>");

		$(".btnSave").bind("click", Save);
		$(".btnEdit").bind("click", Edit);
		$(".btnDelete").bind("click", Delete);
	};

	function Save(){
		var par = $(this).parent().parent(); //tr
		var tdNome = par.children("td:nth-child(1)");
		var tdDate1 = par.children("td:nth-child(2)");
		var tdDate2 = par.children("td:nth-child(3)");
		var tdBotoes = par.children("td:nth-child(4)");

		tdNome.html(tdNome.children("input[type=text]").val());
		tdDate1.val(tdDate1.children("input[type=checkbox]").val());
		tdDate2.val(tdDate2.children("input[type=checkbox]").val());
		tdBotoes.html("<img src='../images/delete.png' class='btnDelete'/><img src='../images/pencil.png' class='btnEdit'/>");

		$(".btnEdit").bind("click", Edit);
		$(".btnDelete").bind("click", Delete);
	};

	function Delete(){
		var par = $(this).parent().parent(); //tr
		par.remove();
	};

	$(".btnEdit").bind("click", Edit);
	$(".btnDelete").bind("click", Delete);
	$("#btnAdd").bind("click", Add);			

});