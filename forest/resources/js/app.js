import './bootstrap';


window.addEventListener("load", () => {
    if (document.querySelector('#reset')) {
        document.querySelector('#reset')
            .addEventListener('click', () => {
                const h3 = document.querySelector('h3');
                h3.innerText = h3.dataset.no;
                if (document.querySelector('.alert-success')) {
                    document.querySelector('.alert-success').remove();
                }
                document.querySelector('form')
                    .querySelectorAll('[type=text]')
                    .forEach(i => {
                        i.value = ''
                    });
            });
    }
});