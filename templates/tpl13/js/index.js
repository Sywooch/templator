function toggleMenu(event) {
	var toggler = event.currentTarget,
		menu = document.getElementById('menu');

	// if has class
	if (menu.className.indexOf('expanded') > -1) {
		toggler.className = toggler.className.replace(' active', '');
		menu.className = menu.className.replace(' expanded', '');
	} else {
		toggler.className += ' active';
		menu.className += ' expanded';
	}
}

document.addEventListener("DOMContentLoaded", function() {
	document.getElementById('menu_toggler').addEventListener("click", toggleMenu);
});