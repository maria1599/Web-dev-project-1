
var pics = [
	"images/crossing.jpg",
	"images/city.jpg",
	"images/laneway.jpg",
	"images/building.jpg",
	"images/bridge.jpg",
];

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

