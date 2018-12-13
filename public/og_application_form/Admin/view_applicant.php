<?php

  include '../action.php';

if($_SESSION['login'] == '' or  $_SESSION['name'] == ''){

header("location:index.php");

}

@$name =  $_SESSION['name'];



if (isset($_REQUEST['id'])){

 extract($_REQUEST);

 $id = $_GET['id'];

 @$action =$_GET['name'];

 $txtsrch_From = $_GET['txtsrch_From'];

 @$txtsrch_To =$_GET['txtsrch_To'];

 //echo"$id. <br/>";

 //echo"$action";

	$application_Log->UpdateAction($id,$action);

	               }

if (isset($_REQUEST['q'])){

 extract($_REQUEST);



 $application_Log->logOut();

  }		

?>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>view applicant</title>



    <!-- Bootstrap -->

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="bootstrap/html5shiv.js"></script>

      <script src="bootstrap/respond.min.js"></script>

    <![endif]-->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="bootstrap/js/jquery-1.11.1.min.js"></script>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />



<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>



	

  </head>

<body>

 <nav class="navbar navbar-success" role="navigation">

	<div class="container">

	<div class="navbar-header">

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-container">

	<span class="sr-only">Show and Hide the Navigation</span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>

	</button>

	<a class="navbar-brand pull-left" href="www.outsource.ng">

	<img src="TOC-Full-Logo.png" alt="Company_logo"style="width:300px;height:45px;" >

	</a>	

	</div>

	<div class="collapse navbar-collapse" id="navbar-container">

	  <div class="container-fluid">

	  <ul class= "nav navbar-nav">

	   

   </ul>

   </div>

  </div>

  </div>

	</nav>



<div class="container" style="padding-left: 0px; padding-right: 15px;">

 <div class="panel panel-primary">

    <div class="panel-heading">

      <h3 class="panel-title"><div class="form-group">

                 <div class="container">

<div class="col-md-12">

  <form class="form-inline"  action="" method="post"  name ="search_record" id="search_record">

    <div class="form-group">

     	  <select class="form-control"  id="location" name="location">

                                <option>--select State--</option>

                                   </select>

	 <select class="form-control"  id="discipline" name="discipline">

                                <option>--select Course--</option>

                                   </select>

								     <select class="form-control"  id="status" name="status">

                                <option value =''>--category--</option>

								<option value='NoAnswer'>No Answer</option>

								<option value ='Fresh'>Fresh</option>

								<option value='Nocredentials'>No credential</option>

								<option value='Uninterested'>Not Interested</option>

								<option value='Invited'>Invited</option>

                                   </select>

	<input type="text" class="form-control datepicker" placeholder="Start Date"  name="txtsrch_From" />

	<input type="text" class="form-control datepicker" placeholder="End Date"  name="txtsrch_To" />

	 <button type="submit" class="btn btn-primary" name="search_record"><i class="glyphicon glyphicon-search"></i></button>

	  <button type="submit" class="btn btn-primary" name="report">      

	<span class="glyphicon glyphicon-book"></span> Generate Report

        </button>

       </div>

    </div>

	<span class="badge pull_right danger"><?php echo 'Welcome '.  $name; ?></span>

	 <span class="badge pull-right"><a style="color:white;"  href="?q=logout">Logout</a></span>

  </form>



  

</div>

</div> 

			</h3>

    </div>

    <div class="panel-body">

<?php





if(isset($_POST['search_record'])){	

   $location = $_POST['location'];

   $discipline = $_POST['discipline'];

  // echo $location."</br>";

   // echo $discipline;

  	$search_record = new Applicant();

    $search_record->search_applicant($location, $discipline);

}elseif (isset($_REQUEST['report'])){

 extract($_REQUEST);

 @$txtsrch_From = $_POST['txtsrch_From'];

 @$txtsrch_To = $_POST['txtsrch_To'];

 @$txt_status = $_POST['status'];

 if($txt_status == ''){

	

 $application_Log->report($txtsrch_From, $txtsrch_To);

 }else{

	 

	$application_Log->report_specifics($txtsrch_From, $txtsrch_To,$txt_status); 

 }

  }else{

	$view_records = new Applicant();

$view_records->get_applicant_entry();  

  }				     

 

	



?>

</div>

</div>

</div>

</div>

</div>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

	 <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../bootstrap/js/jquery-1.9.0.js"></script>

   <script src="../bootstrap/js/bootstrap.js"></script>

   <script src="../bootstrap/js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="../jquery.validate.js"></script>

<script type="text/javascript">

    jQuery().ready(function() {

 $.ajax({

                url: 'location.php',

                type: 'post',

               dataType: 'json',

                success:function(response){



                    var len = response.length;

                   // $('.state').empty();

                    for( var i = 0; i<len; i++){

					    var id = response[i]['id'];	

                       var name = response[i]['state_name'];

                        $('#location').append("<option value='"+id+"'>"+name+"</option>");



                    }

                }

            });	

					 

			 $("#location").change(function(){

            var id = $("#location").val();         



            $.ajax({

                url: 'course.php',

                type: 'POST',

                data: {id:id},

                dataType: 'json',

                success:function(response){



                  // var len= process($.makeArray(response)).length;

                     var len = response.length;



                   $("#discipline").empty();

                    for( var i = 0; i<len; i++){

                        var course = response[i]['course'];

                    



                        $("#discipline").append("<option value='"+course+"'>"+course+"</option>");



                    }

                }

            });

        });

		

		$('.datepicker').datepicker({                   

					        startView: 2,

                      autoclose: 'True',					  

                    format: 'yyyy-mm-dd'                   

	             	 });

	    $("input[name=txtsrch_To]").change(function(){						

       var startDate = $("input[name=txtsrch_From]").val();

       var endDate = $("input[name=txtsrch_To]").val();

       if (startDate != '' && endDate !='') {

           if (Date.parse(startDate) > Date.parse(endDate)) {

               $("input[name=txtsrch_To]").val('');			   

               alert("Start date should not be greater than end date");

           }

       

       return false;

   }

 

					  });



       

	});

</script>

	</body>

</html>