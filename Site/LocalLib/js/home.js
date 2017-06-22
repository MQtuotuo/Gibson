<!--modal change function-->

<!--validation function-->
$(document).ready(function() {
    $("#emailform").validate();
    $("#signupform").validate();
});
<!--get ans set email function-->


function toggle(hideid,showid) {
    $("#"+hideid).modal('hide');
    $("#"+showid).modal('show');
}

function show(){

    alert("hello");
}