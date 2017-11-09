function validateEmail(email) { 
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

$(function(){		
	$("#forgotpassword").click(function(){
		swal({
			title: "Password Recovery",
			text: "Please enter the email address associated with your account.",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true,
			animation: "slide-from-top",
			inputPlaceholder: "Email" 
		}, function(inputValue){
			if (inputValue === false) return false;
			if (inputValue === "") {
				swal.showInputError("Masukkan alamat email anda!");
				return false
			}
			if (!validateEmail(inputValue)) {
				swal.showInputError("Alamat email tidak valid!");
				return false
			}
			//swal("Nice!", "You wrote: " + inputValue, "success");
			$.ajax({
				url : "../../include/doforgotpassword.php",
				type : "post",
				data : {
					inputValue : inputValue
				},
				success : function(x){
					if(x.trim() == "GAGAL")
					{
						setTimeout(function(){
							swal("Info", "Alamat email tidak terdaftar.", "warning")
						}, 2000);
					}
					else
					{
						setTimeout(function(){
							swal("Sukses", "Password telah di reset dan dikirim ke alamat email anda.", "success")
						}, 2000);
					}
					
				}
			});
		});
	});
});