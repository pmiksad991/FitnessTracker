<footer id="footer">
		<div class="col-lg-12">&copy; Fittrack <p>Stranica izrađena kao projekt za Edunova - škola za informatiku i menadžment u Osijeku - Škola stranih jezika Osijek.<p></div>
		</footer>
		 <script>

  $(document).ready(function() {

   var docHeight = $(window).height();
   var footerHeight = $('#footer').height();
   var footerTop = $('#footer').position().top + footerHeight +60;

   if (footerTop < docHeight) {
    $('#footer').css('margin-top', (docHeight - footerTop) + 'px');
   }
  });
 </script>