const API_URL = 'http://localhost:8000/api';

import {
  maskCPF,
  maskCEP,
  checkInputErrors,
  showToast,
  clearInput
} from './utils.js'

document.addEventListener('DOMContentLoaded', _ => {

  const customerForm = document.querySelector('#customerForm');
  const inputCEP = document.querySelector('#inputCEP');
  const inputCPF = document.querySelector('#inputCPF');

  customerForm.addEventListener('submit', event => sendForm(event));
  inputCEP.addEventListener('blur', event => searchCEP(event.target.value));
  inputCEP.addEventListener('input', event => maskCEP(event));
  inputCPF.addEventListener('input', event => maskCPF(event));

  document.querySelectorAll('.input-check')
  .forEach(input => {
    input.addEventListener('blur', e => checkInputErrors(e.target));
  })

  document.querySelector('#clearForm')
  .addEventListener('click', _ => clearInput());
});

async function searchCEP(cep) {
  const formatCEP = cep.replace('-', '');

  document.querySelector('#loadingCEP').classList.add('block');
  document.querySelector('#loadingCEP').classList.remove('hidden');

  await new Promise(resolve => setTimeout(resolve, 1000));

  fetch(`https://viacep.com.br/ws/${formatCEP}/json`)
  .then(request => request.json())
  .then(response => {
    document.querySelector('#loadingCEP').classList.add('hidden');
    document.querySelector('#loadingCEP').classList.remove('block');

    if (response) {
      document.querySelector('#inputStreet').value = response.logradouro || null;
      document.querySelector('#inputNeighborhood').value = response.bairro || null;
      document.querySelector('#inputCity').value = response.localidade || null;
      document.querySelector('#inputState').value = response.uf || null;

      document.querySelector('#inputStreet').disabled = false;
      document.querySelector('#inputNeighborhood').disabled = false;
      document.querySelector('#inputCity').disabled = false;
      document.querySelector('#inputState').disabled = false;
      document.querySelector('#inputNumber').disabled = false;
    }
  });
}

function sendForm(event) {
  event.preventDefault();

  const isCreate = window.location.href.includes('cadastro');
  const inputID = document.querySelector('#inputID') ? document.querySelector('#inputID').value : null;

  const inputCPF = document.querySelector('#inputCPF').value.replace(/\D/g, '');
  const inputName = document.querySelector('#inputName').value;
  const dateOfBirth = document.querySelector('#inputDate').value;
  const postalCode = document.querySelector('#inputCEP').value;
  const street = document.querySelector('#inputStreet').value;
  const number = document.querySelector('#inputNumber').value;
  const neighborhood = document.querySelector('#inputNeighborhood').value;
  const city = document.querySelector('#inputCity').value;
  const state = document.querySelector('#inputState').value;
  const genere = Array.from(document.querySelectorAll('.genere'))
                .filter(input => input.checked)
                .map(input => input.value)
                .toString();


  const customer = {
    cpf: inputCPF,
    name: inputName,
    dateofbirth: dateOfBirth,
    postalcode: postalCode,
    street,
    number,
    neighborhood,
    city,
    state,
    genere
  };

  if (!inputCPF || !inputName || !dateOfBirth || !postalCode || !street || !number || !neighborhood || !city || !state || !genere) {
    showToast('error', 'Informe os campos obrigatórios')

    document.querySelectorAll('.input-check')
    .forEach(input => checkInputErrors(input))

    return;
  }

  if (isCreate && inputCPF.length !== 11) {
    const inputElement = document.querySelector('#inputCPF');

    showToast('error', 'Informe um CPF válido');
    checkInputErrors(inputElement);

    return;
  }

  if (postalCode.length !== 9) {
    const inputElement = document.querySelector('#inputCEP');

    showToast('error', 'Informe um CEP válido');
    checkInputErrors(inputElement);

    return;
  }

  document.querySelector('#btnSubmit').classList.add('hidden');
  document.querySelector('#loading').classList.add('block');
  document.querySelector('#btnSubmit').classList.remove('block');
  document.querySelector('#loading').classList.remove('hidden');

  const requestUrl = isCreate ? `${API_URL}/clientes` : `${API_URL}/clientes/${inputID}`;
  fetch(requestUrl, {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'applcation/json'
    },
    method: isCreate ? 'POST' : 'PUT',
    body: JSON.stringify(customer)
  })
  .then(request => request.json())
  .then(response => {
    document.querySelector('#btnSubmit').classList.add('block');
    document.querySelector('#loading').classList.add('hidden');
    document.querySelector('#btnSubmit').classList.remove('hidden');
    document.querySelector('#loading').classList.remove('block');

    if (response.status === 201) {
      const customerId = response.data.id;
      showToast('success', 'Cliente adicionado com sucesso');

      setTimeout(() => window.location.href = `/clientes/editar/${customerId}`, 1500);
      return;
    }

    if (response.status === 200) {
      showToast('success', 'Cliente atualizado com sucesso');
      return;
    }

    showToast('error', response.message);
  })
}

