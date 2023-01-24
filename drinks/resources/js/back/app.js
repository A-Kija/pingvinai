import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


if (document.querySelector('#drink--create--edit')) {

    const select = document.querySelector('#drink--create--edit');

    select.addEventListener('change', e => showHideDrinkVol(parseInt(e.target.value)));

    const showHideDrinkVol = id => {
        const ids = JSON.parse(alkIds);
        const el = document.querySelector('#drink--vol');
        if (ids.includes(id)) {
            el.style.display = 'block';
            el.querySelector('input').setAttribute('name', 'drink_vol')
        } else {
            el.style.display = 'none';
            el.querySelector('input').removeAttribute('name');
        }
    }

    showHideDrinkVol(parseInt(select.value));
}