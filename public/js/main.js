$(document).ready(function() {
	$('#add-sugar-button').click(function() {
		$('#add-sugar-form').slideToggle();
		$('#add-sugar-button').slideToggle();
	});
	$('.delete-input').click(function(e) {
		$('.delete-input').parent().slideToggle();
		$('#add-sugar-button').slideToggle();
	});
	$('input[type="datetime-local"]').setNow();

	$('td.value').each(function() {
		sugar = $(this).html();
		if (sugar < 70)
			$(this).parent().addClass("danger");
		else if (sugar > 140)
			$(this).parent().addClass("warning");
	});

	$('tr').hover(function() {
		$(this).find('.close').show();
	}, function() {
		$(this).find('.close').hide();
	});


});






//Function found here: https://gist.github.com/ryanburnette/8803238
$.fn.setNow = function (onlyBlank) {
  var now = new Date($.now())
    , year
    , month
    , date
    , hours
    , minutes
    , seconds
    , formattedDateTime
    ;

  year = now.getFullYear();
  month = now.getMonth().toString().length === 1 ? '0' + (now.getMonth() + 1).toString() : now.getMonth() + 1;
  date = now.getDate().toString().length === 1 ? '0' + (now.getDate()).toString() : now.getDate();
  hours = now.getHours().toString().length === 1 ? '0' + now.getHours().toString() : now.getHours();
  minutes = now.getMinutes().toString().length === 1 ? '0' + now.getMinutes().toString() : now.getMinutes();
  //seconds = now.getSeconds().toString().length === 1 ? '0' + now.getSeconds().toString() : now.getSeconds();
  formattedDateTime = year + '-' + month + '-' + date + 'T' + hours + ':' + minutes;

  if ( onlyBlank === true && $(this).val() ) {
    return this;
  }

  $(this).val(formattedDateTime);

  return this;
}

$(function () {
    // Handler for .ready() called.
    $('input[type="datetime"]').setNow();

});
