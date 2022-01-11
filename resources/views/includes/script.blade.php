<script src="{{ url('frontend/libraries/jquery/jquery-3.4.1.min.js') }}"></script>
<script>
    $('a').click(function (e) {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 1000);
    });
</script>
<script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>