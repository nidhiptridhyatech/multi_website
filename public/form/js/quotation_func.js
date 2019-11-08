	/*  Wizard */
	jQuery(function ($) {
		"use strict";
		$("#wizard_container").wizard({
			stepsWrapper: "#wrapped",
			submit: ".submit",
			beforeSelect: function (event, state) {
				if ($('input#website').val().length != 0) {
					return false;
				}
				if (!state.isMovingForward)
					return true;
				var inputs = $(this).wizard('state').step.find(':input');
				return !inputs.length || !!inputs.valid();
			}
		}).validate({
			errorPlacement: function (error, element) {
				if (element.is(':radio') || element.is(':checkbox')) {
					error.insertBefore(element.next());
				} else {
					error.insertAfter(element);
				}
			}
		});
		//  progress bar
		$("#progressbar").progressbar();
		$("#wizard_container").wizard({
			afterSelect: function (event, state) {
				$("#progressbar").progressbar("value", state.percentComplete);
				$("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
			}
		});
		// Validate select
		$('#wrapped').validate({
			ignore: [],
			rules: {
				select: {
					required: true
				}
			},
			errorPlacement: function (error, element) {
				if (element.is('select:hidden')) {
					error.insertAfter(element.next('.nice-select'));
				} else {
					error.insertAfter(element);
				}
			}
		});

		$('#wrapped').submit(function(){

			$.ajax({
			headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
   			 },
			url: '/mail',
			type: 'POST',
			data: new FormData( this ),
	      processData: false,
	      contentType: false,
			success: function (data) {
				
                ga('send', {
                'hitType' : 'pageview',
                'page' : '/danke' // Virtual page (aka, does not actually exist) that you can now track in GA Goals as a destination page.
                });
                $('#coverContact').html('<h2>Vielen Dank!</h3><p>Wir haben Ihre Anfrage erhalten und werden uns kurzfristig bei Ihnen melden.</p>');
                $('#bottom-wizard').html('<a href="http://tiefel-raumgestaltung.de.dedi156.your-server.de">Zur Website</a>');
                $('#loader_form').delay(350).fadeOut('slow');
			},
			error: function(data)
            { 
               
              console.log(data);
               $('#loader_form').delay(350).fadeOut('slow');

            }

		});


		return false;

		});


	});


// Summary 
function getVals(formControl, controlType) {
	switch (controlType) {

		case 'question_1':
			// Get name for set of checkboxes
			var checkboxName = $(formControl).attr('name');

			// Get all checked checkboxes
			var value = [];
			$("input[name*='" + checkboxName + "']").each(function () {
				// Get all checked checboxes in an array
				if (jQuery(this).is(":checked")) {
					value.push($(this).val());
				}
			});
			$("#question_1").text(value.join(", "));
			break;

		case 'additional_message':
			// Get the value for a textarea
			var value = $(formControl).val();
			$("#additional_message").text(value);
			break;
            
         case 'fileupload':
			// Get the value for a textarea
			var value = $(formControl).val();
			$("#fileupload").text(value);
			break;
        
        case 'budget':
			// Get the value for a textarea
			var value = $(formControl).val();
			$("#budget").text(value);
			break;
	}
}