var slideIndex = 0;
var currentSlideIndex = 0;
var slideArray = [];

function Slide(banner, links) {
    this.banner = banner;
    this.links = links;
    this.id = "slide" + slideIndex;
    slideIndex++;
    slideArray.push(this);
}

var shipping = new Slide(
    banner = "https://mcdn.nhanh.vn/store/7239/bn/freeship_website_01.png",
    links = "/shipping.html"
);

var store = new Slide(
    banner = "https://mcdn.nhanh.vn/store/7239/bn/lg22.jpg",
    links = "/store.html"
);

function buildSlider() {
    var myHTML;
    for (var i = 0; i < slideArray.length; i++) {
        myHTML +=
            "<a href='" + slideArray[i].links + "' id='" +
            slideArray[i].id +
            "' class='singleSlide' style='background-image:url(" +
            slideArray[i].banner +
            ");'>" +
            "</a>";
    }
    document.getElementById("mySlider").innerHTML = myHTML;
    document.getElementById("slide" + currentSlideIndex).style.left = 0;
}

buildSlider();

function prevSlide() {
    var nextSlideIndex;
    if (currentSlideIndex === 0) {
        nextSlideIndex = slideArray.length - 1;
    } else {
        nextSlideIndex = currentSlideIndex - 1;
    }

    document.getElementById("slide" + nextSlideIndex).style.left = "-100%";
    document.getElementById("slide" + currentSlideIndex).style.left = 0;

    document
        .getElementById("slide" + nextSlideIndex)
        .setAttribute("class", "singleSlide slideInLeft");
    document
        .getElementById("slide" + currentSlideIndex)
        .setAttribute("class", "singleSlide slideOutRight");

    currentSlideIndex = nextSlideIndex;
}

function nextSlide() {
    var nextSlideIndex;
    if (currentSlideIndex === slideArray.length - 1) {
        nextSlideIndex = 0;
    } else {
        nextSlideIndex = currentSlideIndex + 1;
    }

    document.getElementById("slide" + nextSlideIndex).style.left = "100%";
    document.getElementById("slide" + currentSlideIndex).style.left = 0;

    document
        .getElementById("slide" + nextSlideIndex)
        .setAttribute("class", "singleSlide slideInRight");
    document
        .getElementById("slide" + currentSlideIndex)
        .setAttribute("class", "singleSlide slideOutLeft");

    currentSlideIndex = nextSlideIndex;
}
setInterval(function () {
    nextSlide()
}, 4000);