/**
 * Created by esattahaibis on 2016-03-20.
 */

if (document.getElementById("confirm")){
	document.getElementById("confirm").addEventListener("change", function () {
		var password = document.getElementById("password").value;
		var warning = document.getElementById("warning");
		if (password === ""){
			warning.style.display = "none";
		}else if (password === this.value) {
			warning.style.display = "none";
		}else{
			warning.style.display = "inherit";
		}
	});
}

/*$('#adminNav a').click(function (e) {
	e.preventDefault();
	$(this).tab('show');
});*/

$('.confirmation').on('click', function(){
	return confirm('Are you sure you wanna delete this record?');
});


$(function(){
	if (!Modernizr.inputtypes.date) {
		// If not native HTML5 support, fallback to jQuery datePicker
		$('input[type=date]').datepicker({
				// Consistent format with the HTML5 picker
				dateFormat : 'yy-mm-dd'
			},
			// Localization
			$.datepicker.regional['it']
		);
	}
});