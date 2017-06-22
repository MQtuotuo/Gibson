<!--stepform function-->	
	$(function ()
	
        {
       
     	var form = $("#scheduleform").show();
 
        form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age-2").val()) < 18)
        {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
        {
            form.steps("next");
        }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        if (currentIndex === 2 && priorIndex === 3)
        {
            form.steps("previous");
        }
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {


        var form = $(this);

        var dates = $('#date').multiDatesPicker('getDates');
        var dates_in_string = '';
        for(d in dates) dates_in_string+= dates[d]+';';
//        alert(dates_in_string);
       // $('#altField1').val(dates_in_string);
        document.getElementById("altField1").value=dates_in_string;

        alert(dates_in_string);



        // Submit form input
        form.submit();
       //  window.location.href='mypoll.php';



    }
}).validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password-2"
        }
    }
});

});

<!--change menu-->

function changeMenu(){
	    document.getElementById("menu1").style.display = "none";
        document.getElementById("menu2").style.display = "inline";
		$('#signin').modal('hide');

};

<!--select date-->
$(function ()
           {		
			$('#date').multiDatesPicker({
	           altField: '#altField'
		  
			   	   
            });

               $('#date').multiDatesPicker({
                   altField: '#altField1'
               });
			 

});



