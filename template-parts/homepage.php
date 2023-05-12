<section id="banner" class="mx-auto relative overflow-hidden">
  <div class="relative bg-primary text-white pt-40 pb-20">
    <div class="container max-w-6xl px-5 mx-auto relative z-40">
      <h1 class="relative text-6xl font-bold mb-5 uppercase z-10" data-aos="fade-right"><?php echo get_field("top_title"); ?></h1>
     	<p class="text-2xl font-light mb-20" data-aos="fade-right"><?php echo get_field("top_description") ?></p>
      <a href="#books" class="inline-block bg-secondary px-10 py-5 text-2xl font-bold" data-aos="fade-right">Book Now</a>
    </div>
    <div class="slider-banner absolute right-0 top-0 w-full md:w-1/2 h-full bg-gray-200 bg-cover bg-no-repeat" 
      data-background="<?php echo get_template_directory_uri() ?>/assets/img/photo1.jpg"
      data-aos="fade-left"
    >
      <div class="flex h-full">
        <img class="h-full" src="<?php echo get_template_directory_uri() ?>/assets/img/banner-combine.svg">
      </div>  
    </div>
  </div>
</section>

<section id="books" class="mx-auto pt-20 pb-20 relative bg-white overflow-hidden" data-aos="fade-up">
    <div class="gap-8 relative"
      data-flickity='{ "pageDots": true, "initialIndex": 1, "wrapAround": true }'
      style="outline: none;" 
    >
      <!-- "cellAlign": "left"  -->
      <?php $args = array( 'posts_per_page' => 4 )?>
      <?php $query = new WP_Query($args); ?>
      <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post() ?>
          <div class="px-3 w-full md:w-1/3">
            <div class="rounded shadow-md text-center bg-primary w-full p-6">
              <img 
                class="w-full rounded-t" 
                src="<?php echo get_the_post_thumbnail_url($post->id, 'step-book'); ?>" 
                srcset="<?php echo get_the_post_thumbnail_url($post->id, 'step-book'); ?> 2x"
                alt="<?php the_title() ?>"
              > 
              <div class="mt-5 flex flex-col justify-between">
                <h4 class="text-base mb-5 text-white" style="min-height: 56px;"><?php echo get_field('blurb') ?></h4>
                <div class="flex items-center justify-around">
                  <?php if (get_field('book_wa_message')['use_default_message']): ?>
                    <a target="_blank" href="<?php booknow(get_the_title() . ' ' . get_the_permalink(), true ) ?>" class="w-full inline-block text-white bg-secondary font-bold px-8 py-5 mr-5">Book Now</a>
                  <?php else: ?>
                    <a target="_blank" href="<?php booknow(get_field('book_wa_message')['custome_message'], false ) ?>" class="w-full inline-block text-white bg-secondary font-bold px-8 py-5 mr-5">Book Now</a>
                  <?php endif ?>
                  <a href="<?php the_permalink() ?>" class="w-full inline-block  text-black bg-white px-8 py-5">See Detail</a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      <?php else : ?>
        <p>- No Content -</p>
      <?php endif ?>
    </div>
</section>

<section id="advantages" class="bg-primary relative bg-no-repeat bg-cover data-background-advantage">
  <div class="block absolute h-full bg-primary w-2/4">
    <img class="hidden md:block absolute h-full" style="right: -210px;" src="<?php echo get_template_directory_uri() ?>/assets/img/angled-shape-overlay.svg">
  </div>
  <div class="relative container pt-20 pb-20 max-w-6xl px-5 mx-auto z-10">
    <h2 class="relative text-3xl text-white font-bold mb-8 z-10" data-aos="fade-right"><?php echo get_field("our_advantages")["title"] ?></h2>
   	<p class="text-white mb-5 text-lg font-light max-w-xl" data-aos="fade-right"><?php echo get_field("our_advantages")["description"] ?></p>
    <a href="" class="inline-block text-white bg-secondary text-lg px-10 py-4 font-bold mb-5" data-aos="fade-right">Watch how we do it</a>
    <div class="block md:flex mt-10 gap-8" data-aos="fade-up">
   		<?php foreach (get_field("our_advantages")["items"] as $key => $item): ?>
   			<div class="w-full bg-white rounded shadow p-5 relative mb-5">
   				<?php if ($item["image"]): ?>
	   				<img class="w-16 h-16 mb-3" src="<?php echo $item["image"]["sizes"]["thumbnail"] ?>">
	   			<?php else: ?>
	   				<div class="absolute w-16 h-16 bottom-0 right-0 rounded-full inline-block bg-gray-200"></div>
	   			<?php endif ?>
	   			<div class="relative z-10">
            <h4 class="font-semibold mb-3"><?php echo $item["title"] ?></h4>
            <p class="font-light"><?php echo $item["description"] ?></p>   
          </div>
   			</div>
   		<?php endforeach ?>
   	</div>
  </div>
</section>

<section id="about" class="mx-auto relative">
  <div class="relative bg-primary text-white pt-20 pb-20">
    <div class="container max-w-6xl mx-auto px-5">
      <h4 class="relative z-10 text-secondary">Our Story</h4>
      <h2 class="relative text-3xl text-white font-bold mb-8 z-10" data-aos="fade-right"><?php echo get_field("our_story")["title"] ?></h2>
      
      <p class="text-lg font-light mb-20 relative z-10 w-full md:w-2/5" data-aos="fade-right"><?php echo get_field("our_story")["description"] ?></p>
    </div>
    <div class="slider-banner absolute right-0 top-0 w-full md:w-3/5 h-full bg-gray-200 bg-cover bg-no-repeat" 
      data-background="<?php echo get_template_directory_uri() ?>/assets/img/advantage.jpg"
    >
      <div class="flex h-full">
        <img class="h-full" src="<?php echo get_template_directory_uri() ?>/assets/img/about.svg">
      </div>  
    </div>
  </div>
</section>

<?php
    $responseIg = New IGFeedAPI;
    $responseIg->init('me/media', 'thumbnail_url,id,media_type,media_url,username,timestamp,permalink,children,caption', [], 16 );
    $responseIg->get();

    $ig = $responseIg->get_response_assoc();
    //$ig['data'] = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
    
?>
<section id="social" class="container max-w-6xl mx-auto mt-20 mb-20 px-5" data-aos="fade-up">
  <h4 class="relative z-10 text-gray-400">Our Social Media</h4>
  <h2 class="text-3xl text-primary font-bold mb-8">Instagram</h2>
  <!-- List Leaders -->
  <div class="mt-10 items-start overflow-hidden w-full relative" 
      data-flickity='{ "wrapAround": true, "pageDots": true}'
      style="min-width: 240px;outline: none;" 
  >
      <?php foreach ( $ig['data'] as $key => $item): ?>
        <div class="flex slider-list relative">
          <div>
            <div class="w-60 h-60 mx-3 bg-blue-100 rounded-xl overflow-hidden text-body text-left shadow-md relative">
              <?php if ($item['media_type'] == 'VIDEO'): ?>
                  <div class="bg-white h-full w-full bg-cover bg-no-repeat" data-background="<?php echo $item['thumbnail_url'] ?>"></div>
              <?php elseif ($item['media_url']): ?>
                  <div class="bg-white h-full w-full bg-cover bg-no-repeat" data-background="<?php echo $item['media_url'] ?>"></div>
              <?php else: ?>
                  <div class="bg-white h-full w-full bg-cover bg-no-repeat" data-background="https://dummyimage.com/270x270/e3e3e3/fff.png"></div>
              <?php endif; ?>
            </div>
            <div class="mx-3 w-60 pt-3 text-gray-300 text-xs"><?php echo isset($item['caption']) ? $item['caption'] : '' ?></div>
          </div>
        </div>
      <?php endforeach ?>
  </div>
  <p class="text-paragraph mb-10">
    <?php echo get_field("our_social_media")["description"] ?>
  </p>
  <div class="flex justify-center">
    <a target="_blank" href="<?php echo get_field("instagram", "option")["url"] ?>" class="inline-block text-white bg-secondary text-lg px-10 py-4 font-bold mb-5">
      <?php echo get_field("instagram", "option")["title"] ?>
    </a>
  </div>

   
</section>