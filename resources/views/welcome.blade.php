@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Current Outages
                 <span class="pull-right clickable"><i class="fa fa-arrow-down"></i></span></div>
               <div class="panel-body">
        <div class="timeline timeline-left gray-blue">
            
            <div class="timeline-block">
                <div class="timeline-icon timeline-icon-hide-border"><i class="fa fa-bell-o fa-lg text-danger"></i></div>
                <div class="timeline-content">
                    <h2><a href="#">Master portal down</a></h2>
                    <p>Since this morning we are having trouble with the customer portal. our engineers are investigating. </p>
                    <div class="timeline-date">2016-04-17</div>
                </div>
            </div>
                       
           
            <div class="timeline-block">
                <div class="timeline-icon timeline-icon-hide-border"><i class="fa fa-bell-o fa-lg text-danger"></i></div>
                <div class="timeline-content">
                    <h2><a href="#">Monthly hosting panel update</a></h2>
                    <p>For the current moment we are updating our hosting servers, due to this intervention you are not able to manage your hosting settings in the customer portal. </p>
                    <div class="timeline-date">2016-04-17</div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Current Maintenance
                <span class="pull-right clickable"><i class="fa fa-arrow-down"></i></span></div>


                <div class="panel-body">
        <div class="timeline timeline-left gray-blue">
            
            <div class="timeline-block">
                <div class="timeline-icon timeline-icon-hide-border"><i class="fa fa-info-circle fa-lg text-info"></i></div>
                <div class="timeline-content">
                    <h2><a href="#">Monthly hosting panel update</a></h2>
                    <p>For the current moment we are updating our hosting servers, due to this intervention you are not able to manage your hosting settings in the customer portal. </p>
                    <div class="timeline-date">2016-04-17</div>
                </div>
            </div>
                       
           
            <div class="timeline-block">
                <div class="timeline-icon timeline-icon-hide-border"><i class="fa fa-info-circle fa-lg text-info"></i></div>
                <div class="timeline-content">
                    <h2><a href="#">Non Impacting Network Maintenance - Software Upgrade</a></h2>
                    <p>We will perform software upgrade on one of the distribution routers. </p>
                    <div class="timeline-date">2016-04-17</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

    <script type="text/javascript">
        $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-arrow-down').addClass('fa fa-arrow-up');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-arrow-up').addClass('fa fa-arrow-down');
    }
})
    </script>
@endsection
