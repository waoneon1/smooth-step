<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smooth_Step
 */

?>

	<?php $footer = get_field('footer', 'option'); ?>
  <footer id="footer" class="bg-primary">
    <div class="relative container mx-auto max-w-6xl px-5 pt-20 pb-20">
      <div class="block md:flex">
        <div class="w-full md:w-9/12 md:pr-20 mb-10">
          <h4 class="relative text-2xl text-white font-semibold mb-5">Payment Method</h4>
          <p class="text-white mb-5 pr-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="flex gap-8 justify-start py-5">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/payment.png"
                srcset="<?php echo get_template_directory_uri() ?>/assets/img/payment@2x.png 2x">
          </div>
        </div>
        <div class="w-full md:w-3/12">
          <h4 class="relative text-2xl text-white font-semibold mb-5">Contact Us</h4>
          <ul class="flex gap-5 text-white">
            <li class="rounded-full">
              <a target="_blank" href="mailto:<?php echo get_field('email', 'option') ?>">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/social/gm.svg" style="width: 40px; height: 40px;">
              </a>
            </li>
            <li class="rounded-full">
              <?php $msg  = "Hi i need your help" ?>
              <a target="_blank" href="<?php echo 'https://api.whatsapp.com/send?phone='.get_field('no_whatsapp', 'option').'&text='.$msg; ?>">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/social/wa.svg" style="width: 40px; height: 40px;">
              </a>
            </li>
            <li class="rounded-full">
              <a target="_blank" href="<?php echo get_field('instagram', 'option')['url'] ?>">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/social/ig.svg" style="width: 40px; height: 40px;">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
    AOS.init({
      duration: 1200,
      once: true,
      offset: 200
    });

		/*
     * Replace all SVG images with inline SVG
     */
    $('img.svg').each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');

      jQuery.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');

          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
          if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
              $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
          }

          // Replace image with new SVG
          $img.replaceWith($svg);

      }, 'xml');
    });

    /*
     * Replace all data-background
     */
    (function() {   
      var element = document.body.querySelectorAll('[data-background]');
      for (var i in element) if (element.hasOwnProperty(i)) {
        let img = element[i].getAttribute('data-background');
        element[i].style.backgroundImage = `url(${img})`;
      }
    })();

    /*
     * Header
     */ 
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
      $("header").addClass("bg-white/80");
      $("header").addClass("shadow");
    }

    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll >= 10) {
        $("header").addClass("bg-white/80");
        $("header").addClass("shadow");
        // $("header div").removeClass("md:my-4");
      } else {
        $("header").removeClass("bg-white/80");
        $("header").removeClass("shadow");
        // $("header div").addClass("md:my-4");
      }
    });

    // mobile burger click
    $(".js-navmobile-btn").on( "click", function() {
      $(".js-header").toggleClass('bg-white/80');
      $(".js-navmobile").toggleClass('active');
      $("body").toggleClass('fixed');
    });
    $(".js-nav").on( "click", function(e) {
      e.preventDefault()
      $(this).parent().find(".js-navchild").toggle();
      $(this).toggleClass('active')
    });

    // tab
    $(".js-tab-btn").on( "click", function(e) {
      e.preventDefault();
      const id = $(this).attr('href');
      // tab btn
      $('.js-tab-btn.active').removeClass(['active', 'text-secondary']).addClass('text-paragraph')
      $(this).removeClass('text-paragraph').addClass(['active', 'text-secondary'])
      // tab content
      $('.js-tab').addClass('hidden').removeClass('flex items-start flex-col sm:grid gap-8 sm:grid-cols-2 md:grid-cols-4 text-left mt-10 mb-20')
      $('.js-tab'+id).removeClass('hidden').addClass('flex items-start flex-col sm:grid gap-8 sm:grid-cols-2 md:grid-cols-4 text-left mt-10 mb-20');
    }); 


	});
</script>


</body>
</html>
