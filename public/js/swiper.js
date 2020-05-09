var swiper = new Swiper('.swiper-container', {
	slidesPerView: 5,
	spaceBetween: 20,
	slidesOffsetBefore: 50,
	// slidesPerGroup: 3,
	// loop: true,
	loopFillGroupWithBlank: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});

var swiper_mobile = new Swiper('.swiper-container-mobile', {
	slidesPerView: 2,
	spaceBetween: 20,
	slidesOffsetBefore: 20,
	// slidesPerGroup: 3,
	// loop: true,
	loopFillGroupWithBlank: true,
	// pagination: {
	//     el: '.swiper-pagination',
	//     clickable: true,
	// },
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});