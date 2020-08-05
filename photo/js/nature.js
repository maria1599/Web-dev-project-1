var pics =[
	"images/ocean1.png",
	"images/falls2.jpg",
	"images/ruralfringe.jpg",
	"images/goldensunset.jpg",
	"images/waterfalls.jpg",
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