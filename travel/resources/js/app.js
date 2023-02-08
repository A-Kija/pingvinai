import axios from 'axios';
import './bootstrap';


document.querySelectorAll('button')
    .forEach(b => {
        b.addEventListener('click', () => {
            const data = {};
            b.closest('.js--form').querySelectorAll('[name]')
                .forEach(d => {
                    data[d.getAttribute('name')] = d.value
                });
            if (b.dataset.method == 'post') {
                axios.post(b.dataset.url, data)
                    .then(res => {
                        console.log(res.data.message);

                        // seno teksto trynimas po sekmingo irasymo
                        b.closest('.js--form').querySelectorAll('[name]')
                            .forEach(d => {
                                d.value = '';
                            });
                        //

                        if (res.data.to) {
                            document.querySelector('#' + res.data.to).innerHTML = res.data.html;
                        }
                    })
            } else if (b.dataset.method == 'delete') {
                axios.delete(b.dataset.url, data)
                    .then(res => {
                        console.log(res.data.message);

                        if (res.data.to) {
                            document.querySelector('#' + res.data.to).innerHTML = res.data.html;
                        }
                    })
            }



        });
    });