export default function CheckValiditas(inputs) {

	function checkValid(input, pesan) {
		if(!input.validity.valid) {
			input.style.border = "1px solid #ff0000";
			input.style.boxShadow = "0 0 1px #ff0000";
			pesan.style.color = "#ff0000";
			if (input.value == 0) {
				input.style.border = "1px solid rgb(226 232 240)";
				input.style.boxShadow = "0 0 0 0";
			}
		} else {
			input.style.border = "1px solid #00ff00";
			input.style.boxShadow = "0 0 1px #00ff00";
			pesan.style.color = "#00ff00";
		}	
	}
	
	inputs.forEach((input) => {
	    input.addEventListener('keyup', function() {
	      let pesan = this.parentElement.querySelector('p');

	      // CHECK VALIDITAS
	      if(!this.validity.valid) {
	        pesan.innerHTML = (this.name != "email" && this.name != "nisn") ? `Minimal ${this.getAttribute("minlength")} Huruf/Angka!` : `Masukkan ${this.name} Yang Valid!`;
	        checkValid(this, pesan);
	      } else {
	        pesan.innerHTML = "Valid";
	        checkValid(this, pesan);
	      }

	      // CHECK VALUE
	      if(this.value.length > 0) {
	        this.classList.add('check-value');
	      } else {
	        this.classList.remove('check-value');
	        pesan.innerHTML = "";
	      }

	    });
	});
}