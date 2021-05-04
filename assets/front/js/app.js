import '../sass/app.scss';
const $ = require('jquery');
// start the Stimulus application
import '../../bootstrap';

$('.product').on('click', function (e) {
    /* Clean checkbox */
    $('.checkboxes').prop('checked', false);

    const targetId = e.target.id;
    const characteristics = $(`[data-characteristics`);
    characteristics.hide();

    const characteristic = $(`[data-characteristics="${targetId}"]`);
    characteristic.toggle();
});
