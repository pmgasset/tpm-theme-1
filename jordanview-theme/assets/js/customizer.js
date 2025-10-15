(function (wp) {
if (!wp || !wp.customize) {
return;
}

wp.customize('jordanview_hero_title', function (value) {
value.bind(function (newValue) {
const title = document.querySelector('.hero-title');
if (title) {
title.textContent = newValue;
}
});
});

wp.customize('jordanview_hero_subtitle', function (value) {
value.bind(function (newValue) {
const subtitle = document.querySelector('.hero-subtitle');
if (subtitle) {
subtitle.textContent = newValue;
}
});
});

wp.customize('jordanview_hero_cta_label', function (value) {
value.bind(function (newValue) {
const button = document.querySelector('.hero-cta-primary');
if (button) {
button.textContent = newValue;
}
});
});

wp.customize('jordanview_booking_title', function (value) {
value.bind(function (newValue) {
const title = document.querySelector('.booking-card h2');
if (title) {
title.textContent = newValue;
}
});
});

wp.customize('jordanview_booking_text', function (value) {
value.bind(function (newValue) {
const text = document.querySelector('.booking-card p');
if (text) {
text.textContent = newValue;
}
});
});
})(window.wp);
