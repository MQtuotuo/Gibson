$(function () {

    var carData = pollresult;
    var find = 'image';
    var re = new RegExp(find, 'g');

    var adminData = carData.replace(re, '<img src="/Site/Images/manage/delete.png" class="btnDelete"><img src="/Site/Images/manage/pencil.png" class="btnEdit">');
   // alert(adminData);
    function writeTable() {
        var trows = carData.split(';');
        for (var i = 0; i < trows.length; i++) {
            var str = null;
            var curr = trows[i].split(',');
            for (var k = 0; k < curr.length - 1; k++) {
                str = str + "<td>" + curr[k] + "</td>";

            }
            $("#table tbody").append(
                "<tr>" +
                str +
                "<td><img src='/Site/Images/manage/delete.png' class='btnDelete'><img src='/Site/Images/manage/pencil.png' class='btnEdit'></td>" + "</tr>");

        }
        $(".btnEdit").bind("click", Edit);
        $(".btnDelete").bind("click", Delete);

    }

    window.onload = function () {
        if (!carData) {

        } else {


            if (IS_ADMIN) {
                writeTable();  //write adminstrater data
            }
            else {

                document.getElementById("manage1").style.display = "none";
                writeTable();  //write client data
            }
        }
    };


    var str = "<td><input class='check' type='checkbox'/></td>";
    var string = "";
    column = column - 1;
    for (var i = 0; i < column; i++) {
        string = string + str;
    }

    var whostring = "<tr>" + "<td><input type='text'/></td>" + string + "<td><img src='/Site/Images/manage/disk.png' class='btnSave'><img src='/Site/Images/manage/delete.png' class='btnDelete'/></td>" + "</tr>";


    function Add() {

        $("#table tbody").append(
            whostring);

        $(".btnSave").bind("click", Save);
        $(".btnDelete").bind("click", Delete);
    };


    function Edit() {

        var saveplacenum = column + 2;
        var saveplace = "td:nth-child(" + saveplacenum + ")";


        var par = $(this).parent().parent(); //tr
        var tdNome = par.children("td:nth-child(1)");
        tdNome.html("<input type='text' id='txtNome' value='" + tdNome.html() + "'/>");

        for (var i = 0; i < column; i++) {
            var x = i + 2;

            tDate = par.children("td:nth-child(" + x + ")");
            tDate.html("<input type='checkbox'  value='" + tDate.val() + "'/>");

        }

        var tdBotoes = par.children(saveplace);
        tdBotoes.html("<img src='/Site/Images/manage/disk.png' class='btnSave'/>");

        $(".btnSave").bind("click", Save);
        //  $(".btnEdit").bind("click", Edit);
        $(".btnDelete").bind("click", Delete);

    };

    function Save() {
        var editplacenum = column + 2;
        var editplace = "td:nth-child(" + editplacenum + ")";
        var par = $(this).parent().parent(); //tr
        var tdNome = par.children("td:nth-child(1)");
        var tdDate1 = par.children("td:nth-child(2)");
        var tdDate2 = par.children("td:nth-child(3)");
        var tdDate3 = par.children("td:nth-child(4)");


        var tdBotoes = par.children(editplace);


        tdNome.html(tdNome.children("input[type=text]").val());
        tdDate1.html(+tdDate1.children("input[type=checkbox]").is(':checked'));
        tdDate2.html(+tdDate2.children("input[type=checkbox]").is(':checked'));
        tdDate3.html(+tdDate3.children("input[type=checkbox]").is(':checked'));

        tdBotoes.html("<img src='/Site/Images/manage/delete.png' class='btnDelete'/><img src='/Site/Images/manage/pencil.png' class='btnEdit'/>");

        $(".btnEdit").bind("click", Edit);
        $(".btnDelete").bind("click", Delete);

        if ($('.check').attr('checked')) {
            $("#txtAge").show();
        } else {
            $("#txtAge").hide();
        }

        Vote();
        document.getElementById('tblform').submit();
    };


    function Delete() {
        var par = $(this).parent().parent(); //tr
        par.remove();

        Vote();
        document.getElementById('tblform').submit();

    };


    function Vote() {

        var tablestring="";
        var table = document.getElementById('tbody');

        for (var r = 0, n = table.rows.length; r < n; r++) {
            for (var c = 0, m = table.rows[r].cells.length; c < m; c++) {
                if (c == 0) {
                    tablestring = tablestring + table.rows[r].cells[c].innerHTML;
                } else {
                    tablestring = tablestring + "," + table.rows[r].cells[c].innerHTML;
                }
            }
            if (r != n - 1) {
                tablestring = tablestring + ";";
            }
        }

        var tbltest = tablestring.substring(0);
        var find1 = '<img src="/Site/Images/manage/delete.png" class="btnDelete"><img src="/Site/Images/manage/pencil.png" class="btnEdit">';
        var re1 = new RegExp(find1, 'g');
        var tblresult = tbltest.replace(re1, "image");

        var number = table.rows.length;
         //alert(number);
        alert(tblresult);

        $('#tblRecord').val(tblresult);
        $('#tblRow').val(number);


    };

    $(".btnEdit").bind("click", Edit);
    $(".btnDelete").bind("click", Delete);
    $("#btnAdd").bind("click", Add);
    $("#btnVote").bind("click", Vote);


    <!--export to pdf-->
    $(function () {

        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
        $('#cmd').click(function () {
            var doc = new jsPDF();
            doc.fromHTML($('#table').html(), 15, 15, {
                'width': 170, 'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });
    });


});