import axios from 'axios';
import './bootstrap';

const runEvents = () => {
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
                            showMessage(res.data.message, res.data.messageType);

                            // seno teksto trynimas po sekmingo irasymo
                            b.closest('.js--form').querySelectorAll('[name]')
                                .forEach(d => {
                                    d.value = '';
                                });
                            //

                            if (res.data.to) {
                                document.querySelector('#' + res.data.to).innerHTML = res.data.html;
                                runEvents();
                            }
                        })
                } else if (b.dataset.method == 'delete') {
                    axios.delete(b.dataset.url, data)
                        .then(res => {
                            showMessage(res.data.message, res.data.messageType);

                            if (res.data.to) {
                                document.querySelector('#' + res.data.to).innerHTML = res.data.html;
                                runEvents();
                            }
                        })
                } else if (b.dataset.method == 'get') {
                    axios.get(b.dataset.url, data)
                        .then(res => {
                            if (res.data.to) {
                                document.querySelector('#' + res.data.to).innerHTML = res.data.html;
                                runEvents();
                            }
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

runEvents();