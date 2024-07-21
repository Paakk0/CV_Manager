const popup = document.getElementById('popup');
const title = document.getElementById('title');
const uni = document.getElementById('entryUni');
const tech = document.getElementById('entryTech');

document.addEventListener('DOMContentLoaded', () => {
    window.showForm = function (type) {
        if (popup) {
            popup.style.display = 'flex';
            if (type === 'uni') {
                title.textContent = 'Добави Университет';
                entryUni.style.display = 'block';
                entryTech.style.display = 'none';
                entryUni.name = 'valueUni';
                entryTech.name = '';
            } else if (type === 'tech') {
                title.textContent = 'Добави Технология';
                entryUni.style.display = 'none';
                entryTech.style.display = 'block';
                entryUni.name = '';
                entryTech.name = 'valueTech';
            }
        }
    }

    window.closeForm = function () {
        if (popup) {
            popup.style.display = 'none';
        }
    }

    window.show = function (s) {
        console.log(s);
    }

    window.addEventListener('click', (event) => {
        if (popup.style.display === 'flex' && !popup.contains(event.target) && !event.target.matches('button')) {
            popup.style.display = 'none';
        }
    });
});