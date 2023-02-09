import axios from 'axios';
import './bootstrap';

const runEvents = () => {

    document.querySelectorAll('a.close-edit')
        .forEach(b => {
            b.addEventListener('click', () => document.querySelector('#--edit-bin').innerHTML = '')
        });

    document.querySelectorAll('button:not([data-with-event])')
        .forEach(b => {
            b.dataset.withEvent = 1;
            b.addEventListener('click', () => {
                const data = {};
                b.closest('.js--form').querySelectorAll('[name]')
                    .forEach(d => {
                        data[d.getAttribute('name')] = d.value
                    });
                if (b.dataset.method == 'post') {
                    axios.post(b.dataset.url, data)
                        .then(res => {
                            proccessSuccessResponse(res, b)
                        })
                } else if (b.dataset.method == 'delete') {
                    axios.delete(b.dataset.url, data)
                        .then(res => {
                            proccessSuccessResponse(res, b)
                        })
                } else if (b.dataset.method == 'get') {
                    axios.get(b.dataset.url, data)
                        .then(res => {
                            proccessSuccessResponse(res, b)
                        })
                } else {
                    axios.put(b.dataset.url, data)
                        .then(res => {
                            proccessSuccessResponse(res, b)
                        })
                }

            });
        });


}

const showMessage = (text, type = '') => {
    const html = `<div class="${type}"> ${text} </div>`;
    const bin = document.querySelector('.message-bin');
    const div = document.createElement('div');
    div.innerHTML = html;
    const msg = div.childNodes[0];
    bin.appendChild(msg);
    setTimeout(() => msg.remove(), 4000);
}

const proccessSuccessResponse = (res, b) => {
    if (res.data.message) {
        showMessage(res.data.message, res.data.messageType);
    }

    // seno teksto trynimas po sekmingo irasymo
    if (b.closest('.js--form')) {
        b.closest('.js--form').querySelectorAll('[name]')
            .forEach(d => {
                d.value = '';
            });
    }

    if (res.data.to) {
        document.querySelector('#' + res.data.to).innerHTML = res.data.html;
        runEvents();
    }

    if (res.data.delete) {
        document.querySelector('#' + res.data.delete).innerHTML = '';
    }

}

const sortSelect = () => {
    const select = document.querySelector('#sort');
    const sortButton = select.closest('.js--form').querySelector('button');
    sortButton.dataset.mainUrl = sortButton.dataset.url;
    select.addEventListener('change', () => {
        sortButton.dataset.url = sortButton.dataset.mainUrl + '?sort=' + select.value;
    });
}

runEvents();
sortSelect();