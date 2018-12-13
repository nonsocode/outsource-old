<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>form</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
<style type="text/css">
 
</style>
	
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
	<a class="navbar-brand pull-left" href="/">
	<img src="Admin/TOC-Full-Logo.png" alt="Company_logo"style="width:auto;height:45px;" >
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
      <h3 class="panel-title">Complete this form in 3 quick steps!</h3>
    </div>
    <div class="panel-body">
      <form name="basicform" id="basicform"  method="post" action="">
       
      <div id="sf1" class="frm">
          <fieldset>
            <legend>Step 1 of 3 Personal Details</legend>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="seltitle">Title: </label>
              <div class="col-lg-2">
               <select class="form-control" id="seltitle" name="seltitle" >
                                <option>--select--</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>

                            </select>
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="txtsurname">Surname <span style="color:red;">*</span>: </label>
              <div class="col-lg-6">
			  <input type="text" placeholder="Surname" id="txtsurname" name="txtsurname" class="form-control" autocomplete="off" required="required">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>
       <div class="form-group">
              <label class="col-lg-2 control-label" for="txtfirstname">First Name: </label>
              <div class="col-lg-6">
                <input type="text" placeholder="First Name" id="txtfirstname" name="txtfirstname" class="form-control" autocomplete="off">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="txtothernames">Other Names: </label>
              <div class="col-lg-6">
                <input type="text" placeholder="other Names" id="txtothernames" name="txtothernames" class="form-control" autocomplete="off">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>
             <div class="form-group">
			 <label class="col-lg-2 control-label" for="txtdateofbirth">Date of Birth <span style="color:red;">*</span>: </label>
              <div class="col-lg-2">
			   <div class='input-group date' id='datetimepicker1'>
                    <input type="text" name="txtdateofbirth" class="form-control datepicker" placeholder="Click" id="datepicker1" >
                  
                </div>              
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>
             <div class="form-group">
              <label class="col-lg-2 control-label" for="radmaritalstats">Marital Status: </label>
              <div class="col-lg-8">
			   <div class="radio-inline, col-lg-12">
                <label class=" control-label"> <input type="radio"  id="radmaritalstat" name="radmaritalstats" value="Single">  Single</label>				
                <label class=" control-label"> <input type="radio" id="radmaritalstat" name="radmaritalstats" value="married">  Married</label>
				</div>
              </div>
            </div>
			

            <div class="clearfix" style="height: 10px;clear: both;"></div>
              <div class="form-group">
              <label class="col-lg-2 control-label" for="txtnationality">Nationality: </label>
              <div class="col-lg-6">
                <input type="text" placeholder="Nationality" id="txtnationality" name="txtnationality" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>
          <div class="form-group">
              <label class="col-lg-2 control-label" for="drpstate">State of Origin: </label>
              <div class="col-lg-6">
               <select class="form-control state" id="state"  name="drpstate" >
                                <option>--select--</option>
                                   </select>
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>
                <div class="form-group">
              <label class="col-lg-2 control-label" for="drplga">Local Government Area: </label>
              <div class="col-lg-6">
               <select class="form-control" id="drplga" name="drplga">
                                <option>--select--</option>
                                   </select>
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>


            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend>Step 2 of 3 Contact Details</legend>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="txtCofResidence">Country of Residence: </label>
              <div class="col-lg-6">
             <input type="text" placeholder="Contry of residence" id="txtCofResidence" name="txtCofResidence" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>
			<div class="form-group">
              <label class="col-lg-2 control-label" for="txtSofResidence">State of Residence: </label>
              <div class="col-lg-6">
			  <select class="form-control state"  id="txtSofResidence" name="txtSofResidence" >
                                <option>--select--</option>
                                   </select>
              </div>          
              </div>
           
            <div class="clearfix" style="height: 10px;clear: both;"></div>
			
			<div class="form-group">
              <label class="col-lg-2 control-label" for="txtcity">City: </label>
              <div class="col-lg-6">
             <input type="text" placeholder="City" id="txtcity" name="txtcity" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>
                <div class="form-group">
              <label class="col-lg-2 control-label" for="txtemail">Email Address <span style="color:red;">*</span>: </label>
              <div class="col-lg-6">
                <input type="text" placeholder="Email Address" id="txtemail" name="txtemail" class="form-control" autocomplete="off">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="txtphone">Phone Number <span style="color:red;">*</span>: </label>
              <div class="col-lg-6">
                <input type="text" placeholder="Phone Number" id="txtphone" name="txtphone" class="form-control" autocomplete="off">
              </div>
            </div>
         <div class="clearfix" style="height: 10px;clear: both;"></div>
                <div class="form-group">
              <label class="col-lg-2 control-label" for="txtHouseAddress">House Address: </label>
              <div class="col-lg-6">
                <input type="text" placeholder="House Address" id="txtHouseAddress" name="txtHouseAddress" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>
       <div class="form-group">
              <label class="col-lg-2 control-label" for="drppreexperience">Have you worked in a call center before: </label>
              <div class="col-lg-6">
               <select class="form-control" id="drppreexperience" name="drppreexperience">
                                <option>--select--</option>
								<option>No</option>
								<option>Yes</option>
								
                                   </select>
              </div>
              </div>
			  <div class="clearfix" style="height: 10px;clear: both;"></div>
			         <div class="form-group">
              <label class="col-lg-2 control-label" for="drpprejoblocation">Preferred job location: </label>
              <div class="col-lg-6">
               <select class="form-control" id="drpprejoblocation" name="drpprejoblocation" >
                                <option>--select--</option>
								<option>Kaduna</option>
								<option>Abuja</option>
								<option>Lagos</option>
								
								
                                   </select>
              </div>
              </div>
           

            <div class="clearfix" style="height: 10px;clear: both;"></div>          
               <div class="form-group">
                    <label for="txtpreworkexp" class="col-lg-2 form-control-label">Previous work Experince(brief Narrative)</label>
					<div class="col-lg-6">
                    <textarea row="4" class="form-control" id="txtpreworkexp" name="txtpreworkexp" placeholder="Previous work experience"></textarea>
                </div>
				</div>
                  <div class="clearfix" style="height: 10px;clear: both;"></div>	
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>
 
        <div id="sf3" class="frm col-md-12" style="display: none;">
 <fieldset>
            <legend>Step 3 of 3 Academic Qualification</legend>           
			
                   <div class="form-group">
                        <label for="txtpriedu" class="col-lg-2 control-label" readonly>Primary School</label>
						 <div class="col-lg-6">
                        <input type="text" class="form-control" id="txtpriedu" placeholder="Name of Institution" name="txtpriedu" value="" >
                    </div>
					</div>
					 <div class="clearfix" style="height: 10px;clear: both;"></div>      
					
					  <div class ="form-group">
                        <label for="txtpristartdate" class="col-lg-2 form-control-label"> State Date</label>
						<div class="col-lg-2">
						 <div class="input-group input-append date" class ="dateRangePicker">
                <input type="text" name="txtpristartdate" class="form-control datepicker" placeholder="click"  id="datepicker">
               
            </div>
					
                    </div>
                     </div>	
            <div class="clearfix" style="height: 10px;clear: both;"></div>    					 
					  <div class="form-group">
                        <label for="txtprienddate" class="col-lg-2 form-control-label">Primary End Date</label>
						<div class="col-lg-2">
						  <div class="input-group input-append date" class ="dateRangePicker">
                            <input type="text" class="form-control datepicker" placeholder="click"  name="txtprienddate" />
                    
                      </div>
                        <!-- <input type="text" class="form-control" id="txtprienddate" placeholder="End Date" name="txtprienddate" value="">-->
                    </div> 
					</div>
					 <div class="clearfix" style="height: 10px;clear: both;"></div>    
                     <div class="form-group">
                        <label for="txtpriqualiobt" class="col-lg-2 form-control-label">Grade</label>
						<div class="col-lg-6">
                         <input type="text" class="form-control" id="txtpriqualiobt" placeholder="Enter your Grade" name="txtpriqualiobt" value="">
                    </div>	
                     </div>	
                     <div class="clearfix" style="height: 10px;clear: both;"></div>					 
					
					 <legend>Secondary Education</legend>
					 
					<div class="form-group">
                        <label for="txtsecedu" class="col-lg-2 form-control-label" readonly>Secondary School</label>
						<div class="col-lg-6">
                        <input type="text" class="form-control" id="txtsecedu" placeholder="Name of Institution" name="txtsecedu" value="" >
                    </div>
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>		
					<div class="form-group">
                        <label for="txtsecstartdate" class="col-lg-2 form-control-label"> State Date</label>
						<div class="col-lg-2">
						 <div class="input-group input-append date" id="dateRangePicker">
                     <input type="text" class="form-control datepicker" name="txtsecstartdate" placeholder="click"  />
                 
                  </div>
                       <!--  <input type="text" class="form-control" id="txtsecstartdate" placeholder="State Date" name="txtsecstartdate" value="">-->
                    </div> 
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>		
					 <div class="form-group">
                        <label for="txtsecenddate" class="col-lg-2 form-control-label">Secondary End Date</label>
						<div class="col-lg-2">
						 <div class="input-group input-append date" id="dateRangePicker">
                            <input type="text" class="form-control datepicker" name="txtsecenddate" placeholder="click"  />
                     
                      </div>
                        
                    </div>
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					
					<div class="form-group">
                        <label for="txtsecqualiobt" class="col-lg-2 form-control-label">Grade </label>
						<div class="col-lg-6">
                         <input type="text" class="form-control" id="txtsecqualiobt" placeholder="Enter your Grade" name="txtsecqualiobt" value="">
                    </div>
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					
					   <legend>Tertiary Institution</legend>					   
					    
					  <div class="clearfix" style="height: 10px;clear: both;"></div> 
					 <div class="form-group">
                        <label for="txtuniedu" class="col-lg-2 form-control-label" readonly>University Attended</label>
						<div class="col-lg-6">
						 <select class="form-control" id="txtuniedu" name="txtuniedu" >
                                <option>--select--</option>
								<option value ="Others_institution">Others</option>
                                   </select>                      
                    </div>
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="form-group">
                        <label for="txtcourseofsudy" class="col-lg-2 form-control-label" readonly>Course of Study</label>
						<div class="col-lg-6">
						 <select class="form-control" id="txtcourseofsudy" name="txtcourseofsudy" >
                                <option>--select--</option>
								<option value ="Others_course">Others</option>
                                   </select>
              </div>
                       <!-- <input type="text" class="form-control" id="txtcourseofsudy" placeholder="Select course of study" name="txtcourseofsudy" value="" >-->
                    </div>
					
						<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="form-group">
                        <label for="txtunistartdate" class="col-lg-2 form-control-label">Start Date</label>
						<div class="col-lg-2">
						 <div class="input-group input-append date" id="dateRangePicker">
                            <input type="text" class="form-control datepicker" name="txtunistartdate" placeholder="click" />
                                 </div>
                         <!--<input type="text" class="form-control" id="txtunistartdate" placeholder="State Date" name="txtunistartdate" value="">-->
                    </div>
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="form-group">
                        <label for="txtunienddate" class="col-lg-2 form-control-label">End Date</label>
						<div class="col-lg-2">
                        
						 <div class="input-group input-append date" id="dateRangePicker">
                            <input type="text" class="form-control datepicker" name="txtunienddate" placeholder="click" />
                 
                      </div>
                    </div> 
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					
					<div class="form-group">
                        <label for="txtuniqualiobt" class="col-lg-2 form-control-label">Grade </label>
						<div class="col-lg-2">
						<select class="form-control"  id="txtuniqualiobt" placeholder="University Qualification" name="txtuniqualiobt" value="">
                                <option>--select--</option>
								<option>NCE</option>
								<option>BSC</option>
								<option>Diploma</option>
								<option>HND</option>
								<option>ND</option>
								<option>NBA</option>
								</select>                        
                    </div>
                     </div>
                    <div class="clearfix" style="height: 10px;clear: both;"></div>					
					
						<div class="form-group">
                        <label for="txtadditionalQuali" class="col-lg-2 form-control-label">Additional Qualification </label>
						<div class="col-lg-6">
                        <textarea row="2" class="form-control" id="txtadditionalQuali" name="txtadditionalQuali" placeholder="Additional Qualification"></textarea>
               					</div>
                                </div>
                      <div class="clearfix" style="height: 10px;clear: both;"></div>								
											
						<div class="form-group">
                    <label for="txtskills" class="col-lg-2 form-control-label">Skills</label>
					<div class="col-lg-6">
                    <textarea row="4" class="form-control" id="txtskills" name="txtskills" placeholder="Enter Your Skill Seperated by a Comma"></textarea>
                </div> 
                   </div>  				
				   <div class="clearfix" style="height: 10px;clear: both;"></div>			 
						
					<div class="form-group">
                    <label for="txthobby" class="col-lg-2 form-control-label">Hobby</label>
					<div class="col-lg-6">
                    <textarea row="4" class="form-control" id="txthobby" name="txthobby" placeholder="Enter Your Hobby Seperated by a Comma"></textarea>
                </div>
				</div>
                  <div class="clearfix" style="height: 10px;clear: both;"></div>		    					
				   <div class="form-group">             
                <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
               <!-- <button type="submit" class="btn btn-primary open3"  name="log_application">Submit </button> -->
				<button onclick="myFunction()" type="submit" name="log_application" class="btn btn-primary" id="log_application">Submit</button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
             
            </div>					

           </fieldset>
		</form>  
  </div>
</div>
</div>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript" src="logapp.js"></script>
    

