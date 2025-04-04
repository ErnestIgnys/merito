document.getElementById("contactForm").addEventListener("submit", function(event) {
	event.preventDefault();

	const name = document.getElementById('name').value.trim();
	const email = document.getElementById('email').value.trim();
	const message = document.getElementById('message').value.trim();

	const gender = document.querySelector('input[name="gender"]:checked')?.value || "Nie podane";

	const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(checkbox => checkbox.value).join(", ") || "Brak zainteresowania";



	clearErrors();

	let isValid = true;

	if(name.length < 2){
		displayError('name', 'Imie musi miec co najmniej 2 naki');
		isValid = false;
	}

	if(message.length < 5){
		displayError('message', 'Wiadomość musi miec co najmniej 5 naki');
		isValid = false;
	}

	if(phone.length =! 9){
		displayError('phone', 'Numer telefonu musi miec 9 znaków');
		isValid = false;
	}

	if(wiek > 120){
		displayError('wiek', 'Nie możesz miec wiecej niz 120 lat');
		isValid = false;
	}


	const emailPattern = /^[\s@]+@[^\s@]+\.[^\s@]+$/;
	if(!emailPattern.test(email)){
		displayError('email', 'Podaj poprawny adres e-mail');
		isValid = false;
	}

	if(isValid){
		const resultDiv = document.getElementById('result');
		resultDiv.innerHTML = `
		<h3>Podsumowanie</h3>
		<p><strong>Imie</strong> ${name}</p>
		<p><strong>E-mail</strong> ${email}</p>
		<p><strong>Płeć</strong> ${gender}</p>
		<p><strong>Zainteresowania</strong> ${interests}</p>
		<p><strong>Wiadomość</strong> ${message}</p>
		`
	}
});

	

function displayError(fieldId, message){
const field = document.getElementById(fieldId);
const errorDiv = document.createElement('div');
errorDiv.className = 'error-message';
errorDiv.textContent = message;
errorDiv.style.color = 'red';
field.parentNode.insertBefore(errorDiv, field.nextSibling)

}

function clearErrors(){
	const errors = document.getElementsByClassName('error-message');
	while(errors.length > 0){
		errors[0].parentNode.removeChild(errors[0]);
	}
}