jQuery(document).ready(function(){

/**
* TODO:
	- add text when no questions is been shown
	- clic on openned accodion close it
*/

	var jQuery141 = $.noConflict(true);

	/*Make search*/
  jQuery('.sfaq-filters__input').keyup(function () {
      var expression = false;
      var value = jQuery(this).val();
      var finder = "";
      if (value.indexOf("\"") > -1 && value.lastIndexOf("\"") > 0) {
          finder = value.substring(eval(value.indexOf("\"")) + 1, value.lastIndexOf("\""));
          expression = true;
      }
      jQuery('.b-question').each(function () {
          var title = jQuery(this).data('question');
          if (expression) {
              if (jQuery(this).text().toLowerCase().search(finder.toLowerCase()) == -1) {
				  // hide
				  jQuery(this).slideUp();
              } else {
				  //show
                  jQuery(this).slideDown();
              }
          } else {
              if (title.toLowerCase().indexOf(value.toLowerCase()) < 0) {
				  //hide
                  jQuery(this).slideUp();
              } else {
				  //show
                  jQuery(this).slideDown();
              }
          }
      });
  });

  jQuery('#filters').on('click', '.sfaq-filters__button', function() {


		buttonFilter = jQuery(this).data('filter');

		jQuery('.sfaq-filters__button').removeClass('sfaq-filters__button--active');
		jQuery(this).addClass('sfaq-filters__button--active');


		// if button all is clicked... show all questions
		if (jQuery(this).data('filter') === 'all') {

			jQuery('.b-question').each(function () {
				jQuery(this).slideDown(); // show
			});
		}

		// if other button is clicked
		else{

			jQuery('.b-question').each(function () {

				// console.log(jQuery(this).data('question') );

				var categories = jQuery(this).data('categories');
				var hide = false;

				// console.log(categories);
				// console.log(categories.length);

				//percorre todas as categorias que essa pergunta tem
				for (i = 0; i < categories.length; i++) {
					// console.log( ' categoria '+ i + ' = ' + categories[i] );

					// se essa questão não tem a categoria, esconde essa questão
					if ( buttonFilter !== categories[i] ){
						hide = true;
					}
					// se essa questão tem a categoria selecionada, não esconde essa questão
					else{
						hide = false;
					}

					// se essa questão precisa ser escondida sai do loop
					if (hide === false) {
						break;
					}
				}

				if ( hide ) {

					if (jQuery(this).css("display") == "block"){
						jQuery(this).slideUp(); // hide
					}
				}
				else{
					jQuery(this).slideDown(); // show
				}
			});
		}
	});

	/**
	*
	*/

	var animTime = 300;
	var clickPolice = false;

	jQuery(document).on('touchstart click', '.b-question', function(){

		if(!clickPolice){

			clickPolice = true;

			var currIndex = jQuery(this).index('.b-question'),
			targetHeight = jQuery('.b-question__content-inner').eq(currIndex).outerHeight();

			jQuery('.b-question .b-question__title').removeClass('b-question__title--selected');
			jQuery(this).find('.b-question__title').addClass('b-question__title--selected');

			jQuery('.b-question__content').stop().animate({ height: 0 }, animTime);
			jQuery('.b-question__content').eq(currIndex).stop().animate({ height: targetHeight }, animTime);

			setTimeout(function(){ clickPolice = false; }, animTime);
		}
	});
});
