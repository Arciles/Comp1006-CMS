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

$('.confirmation').on('click', function(){
	return confirm('Are you sure you wanna delete this record?');
});
