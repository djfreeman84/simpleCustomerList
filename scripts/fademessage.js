fade = document.getElementById('fademessage');
if(fade != null){

	console.log(fade.innerHTML);

	setInterval(function(){
		opacity = fade.style.opacity;
		//console.log(opacity);
		if(opacity > 0){
			opacity -= .02;		
			fade.style.opacity = opacity;
		}
	}, 100);
}