<link rel="stylesheet" href="<?= base_url() ?>js/calendar/components/bootstrap2/css/bootstrap-responsive.css">
<link rel="stylesheet" href="<?= base_url() ?>js/calendar/css/calendar.css">
<!--<script type="text/javascript" src="<?= base_url() ?>js/calendar/components/jquery/jquery.min.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/calendar/components/underscore/underscore-min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/calendar/components/bootstrap2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/calendar/components/jstimezonedetect/jstz.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/calendar/js/calendar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/calendar/js/app.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.bpopup.min.js"></script>
<script type="text/javascript">
    function eventcomplete(eid) {
        window.location = "<?= base_url(); ?>calender/complete/" + eid;
    }

    function eventedit(eid) {
        window.location = "<?= base_url(); ?>calender/edit/" + eid;
    }
    
    function eventattendance(eid) {
        window.location = "<?= base_url(); ?>calender/attendance/index/" + eid;
    }


    function eventdelete(eid) {
        window.location = "<?= base_url(); ?>calender/delete/" + eid;
    }

    function l(v) {
        console.log(v);
    }
    $(document).ready(function () {
        $('complete-event').click(function () {
            var complete = confirm('Complete this event');
            if (!complete)
                return false;
            var id = $(this).attr('event-id');
            l(id);
            $.ajax({
                type: 'POST',
                url: 'calender/complete',
                data: {id: id},
                success: function (response) {
                    l(response);
                },
            });
            //            return false;
        });
    });
</script>
