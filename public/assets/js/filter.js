import { API_URL, showToast } from './utils.js';

document.addEventListener('DOMContentLoaded', _ => {

  document.querySelector('#btnFilter')
  .addEventListener('click', _ => toggleFilter());

  document.querySelectorAll('.btnPopup')
  .forEach(button => {
    button.addEventListener('click', e => togglePopUp(e.target));
  });

  document.querySelectorAll('#btnCancel')
  .forEach(button => {
    button.addEventListener('click', e => toggleCancel(e.target));
  });

  document.querySelectorAll('#btnDelete')
  .forEach(button => {
    button.addEventListener('click', e => deleteCustomer(e.target));
  });
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


function togglePopUp(element) {
  const popup = element.children[1];

  if (popup.classList.contains('hidden')) {
    popup.classList.add('block');
    popup.classList.remove('hidden');

  } else {
    popup.classList.add('hidden');
    popup.classList.remove('block');
  }
}

function toggleCancel(element) {
  const customerId = element.getAttribute('data-id');
  const popup = document.querySelector(`#popup-${customerId}`);

  popup.classList.add('hidden');
  popup.classList.remove('block');
}


function deleteCustomer(element) {
  const customerId = element.getAttribute('data-id');
  const text = document.querySelector(`#description-${customerId}`);

  text.classList.add('hidden');

  fetch(`${API_URL}/clientes/${customerId}`, { method: 'DELETE' })
  .then(request => request.json())
  .then(response => {
    text.classList.remove('hidden');

    if (response.status === 200) {
      document.querySelector(`#row-${customerId}`).remove();
      showToast('success', 'Cliente excluído com sucesso');
    }
  });
}

