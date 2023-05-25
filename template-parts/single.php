<div class="bg-primary w-full h-24"></div>
<section id="banner" class="mx-auto relative">
  <div class="relative text-white pb-10" data-aos="zoom-out">
    <div class="h-96 w-full bg-cover bg-no-repeat" data-background="<?php echo get_the_post_thumbnail_url(); ?>"></div>
  </div>
  <div class="relative mx-auto max-w-6xl px-5 mx-5" data-aos="fade-up">
    <h2 class="mb-5 relative text-3xl  font-bold mb-8 z-10"><?php the_title(); ?></h2>
    <div class="mb-10"><?php the_content(); ?></div>
  </div>
</section>

<section id="about" class="mx-auto relative">
  <div class="relative bg-primary text-white pt-20 pb-10">
    <div class="container max-w-6xl px-5 mx-auto" data-aos="fade-right">
      <h4 class="relative z-10 text-secondary">How To</h4>
      <h2 class="relative text-3xl text-white font-bold mb-8 z-10">Book Us</h2>
      <div class="w-full md:w-3/5">
        <div class="px-5">
          <ol class="relative border-l border-gray-200 z-10">    
            <?php foreach (get_field("how_to")["steps"] as $key => $item): ?>      
              <li class="mb-10 ml-6">            
                <span class="mt-1 absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-4 ring-white">
                  <span class="w-3 h-3 rounded-full bg-secondary"></span>
                </span>
                <p class="mb-4 text-base font-normal text-white">
                  <?php echo $item["step"] ?>
                </p>
              </li>
            <?php endforeach ?>   
          </ol>
        </div>
        <div class="w-full flex justify-center relative z-10">
          <?php if (get_field('book_wa_message')['use_default_message']): ?>
            <a target="_blank" href="<?php booknow(get_the_title() . ' ' . get_the_permalink(), true ) ?>" class="w-full inline-block text-white bg-secondary font-bold px-8 py-5 mr-5">Book Now</a>
          <?php else: ?>
            <a target="_blank" href="<?php booknow(get_field('book_wa_message')['custome_message'], false ) ?>" class="w-full inline-block text-white bg-secondary font-bold px-8 py-5 mr-5">Book Now</a>
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="slider-banner absolute right-0 top-0 w-full md:w-2/5 h-full bg-gray-200 bg-cover bg-no-repeat" 
      data-background="<?php echo get_field("how_to")["image"]["url"] ?>"
      data-aos="fade-left"
    >
      <div class="flex h-full">
        <img class="h-full" src="<?php echo get_template_directory_uri() ?>/assets/img/about.svg">
      </div>  
    </div>
  </div>
</section>
 
<?php if (get_field("services")): ?>
  <section id="books" class="container max-w-6xl px-5 mx-auto pt-20 pb-10 relative bg-white overflow-hidden">
    <div class="w-full flex justify-center">
      <h2 class="relative text-3xl font-bold mb-10 z-10">Photo of Our Services</h2>
    </div>
    <div class="block md:flex gap-8 relative justify-center" style="outline: none;" data-aos="fade-up">
      <?php foreach (get_field("services") as $key => $service): ?>
        <div class="px-3 w-full mb-5">
          <div class="rounded shadow-md text-center bg-primary w-full">
            <img 
              class="w-full rounded-t" 
              src="<?php echo $service['image']['url'] ?>" 
              srcset="<?php echo $service['image']['url'] ?> 2x"
              alt="<?php the_title() ?>"
            > 
            <div class="p-6 flex flex-col justify-between">
              <p class="text-sm font-light mb-5 text-white" style="min-height: 56px;">
                <?php echo $service["description"] ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>
<?php endif ?>

<section id="books" class="container max-w-6xl px-5 mx-auto pt-20 pb-20 relative bg-white overflow-hidden">
  <div class="w-full flex justify-center">
    <h2 class="relative text-3xl font-bold mb-10 z-10">Related Services</h2>
  </div>
  <div class="block md:flex gap-8 relative justify-center"
    style="outline: none;" 
    data-aos="fade-up"
  >
    <?php $args = array( 'posts_per_page' => 3 , 'orderby' => 'rand')?>
    <?php $query = new WP_Query($args); ?>
    <?php if ( $query->have_posts() ) : ?>
      <?php while ( $query->have_posts() ) : $query->the_post() ?>
        <div class="px-3 w-full mb-5">
          <div class="rounded shadow-md text-center bg-primary w-full">
            <img 
              class="w-full rounded-t" 
              src="<?php echo get_the_post_thumbnail_url($post->id, 'step-book'); ?>" 
              srcset="<?php echo get_the_post_thumbnail_url($post->id, 'step-book'); ?> 2x"
              alt="<?php the_title() ?>"
            > 
            <div class="p-6 flex flex-col justify-between">
              <h4 class="text-white text-lg mb-3 font-semibold"><?php the_title() ?></h4>
              <p class="text-sm font-light mb-5 text-white" style="min-height: 56px;"><?php echo get_field('blurb') ?></p>
              <div class="flex items-center justify-around">
                <?php if (get_field('book_wa_message')['use_default_message']): ?>
                  <a target="_blank" href="<?php booknow(get_the_title() . ' ' . get_the_permalink(), true ) ?>" class="w-full inline-block text-white bg-secondary font-bold px-5 py-3 mr-5">Book Now</a>
                <?php else: ?>
                  <a target="_blank" href="<?php booknow(get_field('book_wa_message')['custome_message'], false ) ?>" class="w-full inline-block text-white bg-secondary font-bold px-5 py-3 mr-5">Book Now</a>
                <?php endif ?>
                <a href="<?php the_permalink() ?>" class="w-full inline-block  text-black bg-white px-5 py-3">See Detail</a>
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