export const API_URL = 'http://localhost:8000/api';

export function maskCPF(event) {
  let cpf = event.target.value;

  if (cpf.length > 14) {
    event.target.value = cpf.slice(0, -1);
    return;
  }

  cpf = cpf.replace(/\D/g, '');

  cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
  cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

  event.target.value = cpf;
}

export function maskCEP(event) {
  let cep = event.target.value;

  cep = cep.replace(/\D/g, '');

  if (cep.length > 8) {
    cep = cep.slice(0, -1);
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2');
    event.target.value = cep;
    return;
  }

  if (cep.length > 5) {
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2');
  }

  event.target.value = cep;
}

export function checkInputErrors(input) {
  if (!input.value) {
    input.classList.add('border-red-200', 'bg-red-50/30');
    input.disabled = false;
    return;
  }

  input.classList.remove('border-red-200', 'bg-red-50/30');
}

export function showToast(type, message) {
  const background = type === 'error' ? 'linear-gradient(to right, rgb(239 68 68), rgb(220 38 38))'
                                      : 'linear-gradient(to right, rgb(16 185 129), rgb(5 150 105))';
  Toastify({
    text: message,
    duration: 3000,
    close: false,
    gravity: "bottom",
    position: "right",
    style: { background }
  }).showToast();
}

export function clearInput() {
  document.querySelectorAll('input')
  .forEach(input => input.value = '');
}
