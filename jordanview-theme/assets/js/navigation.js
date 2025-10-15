(function () {
const navToggle = document.querySelector('.nav-toggle');
const navigation = document.querySelector('.primary-navigation');

if (!navToggle || !navigation) {
return;
}

navToggle.addEventListener('click', () => {
const isOpen = navigation.classList.toggle('is-open');
navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
});
})();
