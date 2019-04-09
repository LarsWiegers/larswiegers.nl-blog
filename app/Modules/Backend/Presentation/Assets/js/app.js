require('bootstrap');

if(document.querySelector('.dropdown-trigger')) {
  document.querySelector('.dropdown-trigger').addEventListener('click', function() {
    this.parentElement.querySelector('.dropdown').classList.toggle('opened');
  })
}
