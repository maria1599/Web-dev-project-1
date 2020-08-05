var pics =[
	"images/petra.JPG",
	"images/aaron.JPG",
	"images/danica.JPG",
	"images/nic.JPG",
	"images/malith.JPG",
];

function init() {
	

	var btn = document.querySelector("button");
	var img = document.querySelector("img");
	var counter = 1;
	btn.addEventListener("click", function(){
		if (counter === 5) {
			counter = 0;
		}
		img.src= pics[counter]
		counter = counter +1;
	});
}
window.onload = init;