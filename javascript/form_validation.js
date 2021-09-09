
//Función que valida el formulario. Esta es la validación clientside para mostrar los errores en pantalla (Otra vez, sólo los que son validables por ambos cliente y servidor)
function validarForm(event){

    //Frenamos el submit para realizar la validación
    event.preventDefault();

    //Añadimos una clase de formulario validado para el CSS
    event.target.classList.add("form_validated");

    if(event.target.checkValidity()){
        //Si cada elemento del formulario cumple la validación (estipulada en los atributos de cada elemento) entonces se hace el submit
    	event.target.submit();
    }else{
        //Vacia el div error de los errores anteriores (si ha habido un submit anteriormente, para que no se concatenen)
    	event.target.querySelector('.error').innerHTML = "";
        //Obtiene todos los campos inputs del formulario
    	var inputs = event.target.elements;
    	for (var i = 0; i < inputs.length; i++) {
            //Por cada elemento inputs, si no cumple la validación (estipulada en los atributos del elemento)
    		if(!(inputs[i].checkValidity())){
                //Obtiene el mensaje de error definido en su atributo data-error
    			var error = inputs[i].dataset.error;
                //Se lo añade al div error para que se muestre en la web
    			event.target.querySelector('.error').innerHTML += error + "<br>";
    		}
    }
    }
    
}

document.querySelectorAll('.form_validation').forEach(function (form) {
    //Por cada formulario obtenido le añadimos el atributo novalidate para que nuestra función pueda validarlo.
	form.setAttribute('novalidate', 'true');
    //Le añadimos una callback al formulario que se ejecutará cuando se haga el submit
    form.addEventListener('submit', validarForm);
});