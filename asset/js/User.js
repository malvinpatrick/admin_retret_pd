$(document).ready(function(){
	$('#profile-form-link').click(function(e) {
		$("#profile-form").delay(100).fadeIn(100);
 		$("#pasang-form-rumah").fadeOut(100);
		$('#pasang-form-link-rumah').removeClass('active');
		$("#pasang-form-apartment").fadeOut(100);
		$('#pasang-form-link-apartment').removeClass('active');
		$("#update-form").fadeOut(100);
		$('#update-form-link').removeClass('active');
		$("#logout-form").fadeOut(100);
		$('#logout-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#pasang-form-link-rumah').click(function(e) {
		$("#pasang-form-rumah").delay(100).fadeIn(100);
		$("#pasang-form-apartment").fadeOut(100);
		$('#pasang-form-link-apartment').removeClass('active');
 		$("#profile-form").fadeOut(100);
		$('#profile-form-link').removeClass('active');
		$("#update-form").fadeOut(100);
		$('#update-form-link').removeClass('active');
		$("#logout-form").fadeOut(100);
		$('#logout-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#pasang-form-link-apartment').click(function(e) {
		$("#pasang-form-apartment").delay(100).fadeIn(100);
		$("#pasang-form-rumah").fadeOut(100);
		$('#pasang-form-link-rumah').removeClass('active');
 		$("#profile-form").fadeOut(100);
		$('#profile-form-link').removeClass('active');
		$("#update-form").fadeOut(100);
		$('#update-form-link').removeClass('active');
		$("#logout-form").fadeOut(100);
		$('#logout-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#update-form-link').click(function(e) {
		$("#update-form").delay(100).fadeIn(100);
 		$("#pasang-form-rumah").fadeOut(100);
		$('#pasang-form-link-rumah').removeClass('active');
		$("#pasang-form-apartment").fadeOut(100);
		$('#pasang-form-link-apartment').removeClass('active');
		$("#profile-form").fadeOut(100);
		$('#profile-form-link').removeClass('active');
		$("#logout-form").fadeOut(100);
		$('#logout-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#logout-form-link').click(function(e) {
		$("#logout-form").delay(100).fadeIn(100);
 		$("#pasang-form-rumah").fadeOut(100);
		$('#pasang-form-link-rumah').removeClass('active');
		$("#pasang-form-apartment").fadeOut(100);
		$('#pasang-form-link-apartment').removeClass('active');
		$("#update-form").fadeOut(100);
		$('#update-form-link').removeClass('active');
		$("#profile-form").fadeOut(100);
		$('#profile-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	/*$('#rumah').change(function(e) {
		if(this.checked){
			$("#rumah-form").delay(100).fadeIn(100);
			$("#apartment-form").fadeOut(100);
			$("#rumah-form").css("display", "block");
			$("#apartment-form").css("display", "none");
			e.preventDefault();
		}
	});
	$('#apartment').change(function(e) {
		if(this.checked){
			$("#apartment-form").delay(100).fadeIn(100);
			$("#rumah-form").fadeOut(100);
			$("#rumah-form").css("display", "none");
			$("#apartment-form").css("display", "block");
			alert("assadsa");
			e.preventDefault();
		}
	});
	$('input[type=radio][name=optradio]').change(function() {
		if (this.value == 'rumah') {
			$("#rumah-form").css("display", "block");
			$("#apartment-form").css("display", "none");
		}
		else if (this.value == 'apartment') {
			$("#rumah-form").css("display", "none");
			$("#apartment-form").css("display", "block");
		}
	});*/
	
});
