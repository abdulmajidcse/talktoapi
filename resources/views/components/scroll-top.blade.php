<div>
    <div id="scrollTop"><a href=""><i class="fas fa-angle-up"></i></a></div>
    @push('script')
        <script>
            $('#scrollTop').click(function(e){
                e.preventDefault();
                $('html,body').animate({
                    scrollTop : 0
                }),200;
             });
          $('#scrollTop').fadeOut();
            $(window).scroll(function(){
                var count = $(this).scrollTop();

                if(count < 100){
                    $('#scrollTop').fadeOut();
                }
                else{
                    $('#scrollTop').fadeIn();
                }
            });
        </script>
    @endpush
</div>
