/**
 * File accordion.js.
 *
 * Creates an accordion effect for the Yasto SEO structured FAQ block.
 */
( function() {

	var questions = document.querySelectorAll( '.schema-faq-question' );

	function addToggle( el ) {
		var toggle = document.createElement( 'span' );
		toggle.innerHTML = '+';
		toggle.classList.add( 'faq-toggle' );
		el.appendChild( toggle );
	}

	/**
	 * Returns the event target.
	 *
	 * @param 		object 		event 		The event.
	 * @return 		object 		target 		The event target.
	 */
	function getEventTarget( event ) {

		event = event || window.event;

		return event.target || event.srcElement;

	} // getEventTarget()

	/**
	 * Returns the parent node with the requested class.
	 *
	 * This is recursive, so it will continue up the DOM tree
	 * until the correct parent is found.
	 *
	 * @param 		object 		el 				The node element.
	 * @param 		string 		className 		Name of the class to find.
	 * @return 		object 						The parent element.
	 */
	function getParent( el, className ) {

		var parent = el.parentNode;

		if ( '' !== parent.classList && parent.classList.contains( className ) ) {

			return parent;

		}

		return getParent( parent, className );

	} // getParent()

	/**
	 * Makes the FAQ answer visible.
	 * 
	 * @param 	{object} 	event 		The event.
	 */
	function expandAnswer( event ) {

		var target = getEventTarget( event );

		event.stopPropagation();
		event.cancelBubble = true;

		var parent = getParent( target, 'schema-faq-section' );
		var answer = parent.querySelector( '.schema-faq-answer' );
		var toggle = parent.querySelector( '.faq-toggle' );

		answer.classList.toggle( 'visible' );

		if ( answer.classList.contains( 'visible' ) ) {
			toggle.innerHTML = '-';
		} else {
			toggle.innerHTML = '+';
		}

	}

	for ( i = 0; i < questions.length; ++i ) {
		questions[i].addEventListener( 'click', expandAnswer );
		questions[i].addEventListener( 'touchstart', expandAnswer );

		addToggle( questions[i] );
	}

} )();