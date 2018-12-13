jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        txtphone: {
          required: true,
          minlength: 11,
          maxlength: 11
        },
        txtemail: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        upass1: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
		
        txtcourseofsudy: {
          required: true,
                }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    
    $("#").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time, You would be contacted shortly.</h2>');
         }, 1000);
        return false;
      }
    });
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });
				
		$('.state').ready(function(){
        $.ajax({
                url: 'states.php',
                type: 'get',
                dataType: 'json',
                success:function(states){
                    $stateObj = $('.state')
                    states.forEach(function(state){
                        $stateObj.append("<option value='"+state.id+"'>"+state.name+"</option>");
                    })
                }
            });
        });
		 $(".state").change(function(){
            var state_id = $(".state").val();         

            $.ajax({
                url: 'lga.php',
                type: 'POST',
                data: {state_id:state_id},
                dataType: 'json',
                success:function(response){

                  // var len= process($.makeArray(response)).length;
                     var len = response.length;

                    $("#drplga").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['local_id'];
                        var name = response[i]['local_name'];

                        $("#drplga").append("<option value='"+id+"'>"+name+"</option>");

                    }
                }
            });
        });
    function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
		$('#txtcourseofsudy').ready(function(){
        $.ajax({
                url: 'course_of_study.php',
                type: 'post',
              //  data: {state:state_id},
                dataType: 'json',
                success:function(response){

                    var len = response.length;

                   // $('.state').empty();
                    for( var i = 0; i<len; i++){
                        var course = response[i]['course'];
                        var course = response[i]['course'];

                        $('#txtcourseofsudy').append("<option value='"+course+"'>"+course+"</option>");

                    }
                }
            });
        });	
		
$('#txtuniedu').ready(function(){
        $.ajax({
                url: 'university.php',
                type: 'post',
              //  data: {state:state_id},
                dataType: 'json',
                success:function(response){

                    var len = response.length;

                   // $('.state').empty();
                    for( var i = 0; i<len; i++){
                        var university = response[i]['university'];
                        var university = response[i]['university'];

                        $('#txtuniedu').append("<option value='"+university+"'>"+university+"</option>");

                    }
                }
            });
        });					
	$('.datepicker').datepicker({
		 startView: 2,
         autoclose: 'True',
         format: "yyyy-mm-dd"
                });	
  $("input[name=txtprienddate]").change(function(){						
       var startDate = $("input[name=txtpristartdate]").val();
       var endDate = $("input[name=txtprienddate]").val();
       if (startDate != '' && endDate !='') {
           if (Date.parse(startDate) > Date.parse(endDate)) {
               $("input[name=txtprienddate]").val('');			   
               alert("Start date should not be greater than end date");
           }
            return false;
   }
 
					  });
  $("input[name=txtsecenddate]").change(function(){						
       var startDate = $("input[name=txtsecstartdate]").val();
       var endDate = $("input[name=txtsecenddate]").val();
       if (startDate != '' && endDate !='') {
           if (Date.parse(startDate) > Date.parse(endDate)) {
               $("input[name=txtsecenddate]").val('');			   
               alert("Start date should not be greater than end date");
           }
             return false;
   }
 
					  });
  $("input[name=txtunienddate]").change(function(){						
       var startDate = $("input[name=txtunistartdate]").val();
       var endDate = $("input[name=txtunienddate]").val();
       if (startDate != '' && endDate !='') {
           if (Date.parse(startDate) > Date.parse(endDate)) {
               $("input[name=txtunienddate]").val('');			   
               alert("Start date should not be greater than end date");
           }
             return false;
   }
 
					  });
				
                $('#basicform').on('submit', function(e){
                    //Stop the form from submitting itself to the server.
                    e.preventDefault();
					if (v.form()) {
                   var seltitle = $('#seltitle').val();
				    var txtsurname = $('#txtsurname').val();
					 var txtfirstname = $('#txtfirstname').val();
					  var txtothernames = $('#txtothernames').val();
					   var Dob = $('#datepicker1').val();
					   	var radmaritalstat = $("input[name='radmaritalstats']:checked"). val();
						 var txtnationality = $('#txtnationality').val();
						  var state = $('#state').val();
						   var drplga = $('#drplga').val();
						   var txtCofResidence = $('#txtCofResidence').val();
						    var txtSofResidence = $('#txtSofResidence').val();
							 var txtcity = $('#txtcity').val();
							  var txtemail = $('#txtemail').val();
							   var txtphone = $('#txtphone').val();
							    var txtHouseAddress = $('#txtHouseAddress').val();
								 var drppreexperience = $('#drppreexperience').val();
								  var drpprejoblocation = $('#drpprejoblocation').val();
								   var txtpreworkexp = $('#txtpreworkexp').val();
								    var txtpriedu = $('#txtpriedu').val();
									var txtpristartdate = $("input[name=txtpristartdate]").val();
									 var txtprienddate = $("input[name=txtprienddate]").val();
									 var txtpriqualiobt = $('#txtpriqualiobt').val();
									  var txtsecedu = $('#txtsecedu').val();
									  var txtsecstartdate = $("input[name=txtsecstartdate]").val();
									   var txtsecenddate = $("input[name=txtsecenddate]").val();
									   var txtsecqualiobt = $('#txtsecqualiobt').val();
									    var txtuniedu = $('#txtuniedu').val();
										 var txtcourseofsudy = $('#txtcourseofsudy').val();
										  var txtunistartdate = $("input[name=txtunistartdate]").val();
									      var txtunienddate = $("input[name=txtunienddate]").val();
										  var txtuniqualiobt = $('#txtuniqualiobt').val();
										  var txtadditionalQuali = $('#txtadditionalQuali').val();
										  var txtskills = $('#txtskills').val();
										  var txthobby = $('#txthobby').val();
					 $.ajax({
                        type: "POST",
                        url: 'submission.php',
                        data: {seltitle: seltitle, txtsurname: txtsurname, txtfirstname: txtfirstname, txtothernames: txtothernames, Dob: Dob, radmaritalstat: radmaritalstat, txtnationality: txtnationality, state: state, drplga: drplga, txtSofResidence: txtSofResidence,txtCofResidence: txtCofResidence, txtcity: txtcity, txtemail: txtemail, txtphone: txtphone, txtHouseAddress: txtHouseAddress, drppreexperience: drppreexperience, drpprejoblocation: drpprejoblocation,txtpreworkexp: txtpreworkexp,txtpriedu: txtpriedu,txtpristartdate: txtpristartdate,txtprienddate: txtprienddate,txtpriqualiobt: txtpriqualiobt,txtsecedu: txtsecedu,txtsecstartdate: txtsecstartdate,txtsecenddate: txtsecenddate,txtsecqualiobt: txtsecqualiobt,txtuniedu: txtuniedu,txtcourseofsudy: txtcourseofsudy,txtunistartdate: txtunistartdate,txtsecenddate: txtsecenddate,txtunienddate: txtunienddate,txtuniqualiobt: txtuniqualiobt,txtadditionalQuali: txtadditionalQuali,txtskills: txtskills,txthobby: txthobby},
                        success: function(data){
                          alert(data);
                       }
					
					 					 });           
               
					
			
	}
	 });
	});

 