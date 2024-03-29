document.addEventListener('DOMContentLoaded', _ => {

  document.querySelector('#btnFilter')
  .addEventListener('click', _ => toggleFilter());

});

function toggleFilter() {
  const filter = document.querySelector('#filter');

  if (filter.classList.contains('hidden')) {
    document.querySelector('#filter').classList.add('block');
    document.querySelector('#filter').classList.remove('hidden');

  } else {
    document.querySelector('#filter').classList.add('hidden');
    document.querySelector('#filter').classList.remove('block');
  }
}
