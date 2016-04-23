@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="alert alert-info">
         We at iDevelopment have a zero tolerance for any kind of hacking/spam/DDos attacks from our network.<br />
         This form is to report behavior which, directly or indirectly, may disrupt the Internet experience of other users. We act on it if necessary.<br />
        </div>
<div id='progress'><div id='progress-complete'></div></div>
        <form action="{{ url('abuse/register') }}" method="post" id="AbuseForm" class="form-horizontal">
        {!! csrf_field() !!}
            <div class="panel panel-default">
                <div class="panel-heading">Report Abuse</div>
                <div class="panel-body">

                <fieldset>
                <legend>Personal information</legend>
                 <div class="form-group">
                  <label for="first_name" class="col-md-3 control-label">First name <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="first_name" name="first_name" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="last_name" class="col-md-3 control-label">Last name <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="last_name" name="last_name" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="company" class="col-md-3 control-label">Company</label>
                  <div class="col-md-6">
                   <input type="text" id="company" name="company" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="email" class="col-md-3 control-label">Email <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="email" id="email" name="email" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="phone" class="col-md-3 control-label">Phone <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="phone" name="phone" class="form-control">
                 </div>
                </div>

                <div class="form-group">
                  <label for="mobile" class="col-md-3 control-label">Mobile</label>
                  <div class="col-md-6">
                   <input type="text" id="mobile" name="mobile" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="postcode" class="col-md-3 control-label">Postcode <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="postcode" name="postcode" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="address" class="col-md-3 control-label">Address <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="address" name="address" class="form-control">
                 </div>
                </div>                

                 <div class="form-group">
                  <label for="city" class="col-md-3 control-label">City <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="city" name="city" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="state" class="col-md-3 control-label">State / Province <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="state" name="state" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="country" class="col-md-3 control-label">Country <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <select name="country" id="country" class="form-control">
                       <option ></option>
                   </select>
                 </div>
                </div> 
                </fieldset>

                <fieldset>
                <legend>Abuse information</legend>
                 <div class="form-group">
                  <label for="type" class="col-md-3 control-label">Type <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <select id='type' name="type" class="form-control">
                     <option value=""></option>
                     <option value="spam">Spam</option>
                     <option value="hacking">Hacking</option>
                    </select>
                 </div>
                </div>             
             
            <div style="display:none;" id="spam">
                 <div class="form-group">
                  <label for="ip" class="col-md-3 control-label">Please enter the IP address from where the spam was sent  <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <input type="text" id="ip" name="SpamSourceIP" class="form-control">
                 </div>
                </div>

                 <div class="form-group">
                  <label for="date" class="col-md-3 control-label">Date and time which the spam was received <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                  <input type="date" id="date" name="date" class="form-control">
                 </div>
                </div>                

                 <div class="form-group">
                  <label for="header" class="col-md-3 control-label">Headers of the spam e-mail <strong class="text-danger">*</strong></label>
                  <div class="col-md-6">
                   <textarea id="header" name="mail_header" rows="10" class="form-control"></textarea>
                 </div>
                </div>
            </div>

    <div style="display:none;" id="hacking">
    <div class="form-group">
   <label for="source_ip" class="col-md-3 control-label">Please enter the IP address from where the hack (attempt) occurred<strong class="text-danger">*</strong></label>
 <div class="col-md-6">
   <input type="ip" id="source_ip" name="source_ip" class="form-control">
  </div>
 </div>

<div class="form-group">
 <label for="source_port" class="col-md-3 control-label">Source port fo the hack (attempt) <strong class="text-danger">*</strong></label>
   <div class="col-md-6">
    <input type="text" id="source_port" name="source_port" class="form-control">
   </div>
 </div>

 <div class="form-group">
  <label for="ip" class="col-md-3 control-label">IP address of servers that are subject to hack (attempt)
   <strong class="text-danger">*</strong></label>
    <div class="col-md-6">
     <input type="text" id="ip" name="ip" class="form-control">
    </div>
  </div>

  <div class="form-group">
   <label for="destination_port" class="col-md-3 control-label">Destination port that is subject to hack (attempt)
   <strong class="text-danger">*</strong></label>
    <div class="col-md-6">
     <input type="text" id="destination_port" name="destination_port" class="form-control">
    </div>
  </div>

</div>
</fieldset>

<input id="SaveAccount" type="submit" class="btn btn-primary" value="Submit" />

</div>
</div>            
        
</form>
<script>
$(document).ready(function(){
    $("#AbuseForm").formToWizard({ 
        submitButton: 'SaveAccount',
        nextBtnClass: 'btn btn-primary',
        prevBtnClass: 'btn btn-default',
        buttonTag:    'button', 
    progress: function (i, count) {
      $('#progress-complete').width(''+(i/count*100)+'%');
    }
  });


    $('#type').on('change', function() {
      if ( this.value == 'spam')
      {
        $("#hacking").hide();
        $("#spam").show();
      }
      else  if ( this.value == 'hacking')
      {
          $("#spam").hide();
        $("#hacking").show();
      } 
       else  
      {
        $("#spam").hide();
        $("#hacking").hide();
      }
    });
});

</script>
@endsection
