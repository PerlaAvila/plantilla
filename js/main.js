$(document).ready(function(){

	// Add smooth scrolling a los links
          $("a").on('click', function(event) {

            if (this.hash !== "") {
              event.preventDefault();

              var hash = this.hash;

              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 800, function(){
           
                window.location.hash = hash;
              });
            } 
          });


        //regresa al top page  
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        // ayax para forma de contacto
         $('#contact-form-1').submit(function(){
  		var url = 'form-handler-nodb.php';

  		$.ajax({
  			type: 'POST',
  			url: url,
  			data: $('#contact-form-1').serialize(),
  			success: function(data)
  			{

  				$('.contact-frm').html(data) && $('.contact-frm').show() && $('#contact-form-1').hide();
  			}
  		});

  		return false;
  });

});