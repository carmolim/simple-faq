<article class="b-question" data-question="<?php the_title(); ?>" data-categories='<?php echo sfaq_question_terms_array(); ?>'>
	<div class="b-question__head">
		<h2 class="b-question__title"><?php the_title(); ?></h2>
	</div>
	<div class="b-question__content">
	  <div class="b-question__content-inner">
	    <p><?php the_content(); ?></p>
	  </div>
	</div>
</article>
