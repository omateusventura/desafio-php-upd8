<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPD8 - Clientes</title>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/utils.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/app.js') }}" type="module"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  </head>
<body>

  <main class="w-screen h-screen bg-slate-50 py-4 px-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-[1.4rem] font-light flex items-center gap-2">
        <i class="ph-light ph-users text-[1.5rem] relative top-[1px]"></i>
        Novo Cliente
      </h1>

      <div class="flex items-center gap-3">
        <a
          class="flex items-center gap-1 border text-slate-900 text-sm rounded-md px-3 py-2"
          href="/clientes"
        >
          <i class="ph ph-arrow-counter-clockwise"></i>
          Listar
        </a>

        <a
          class="flex items-center gap-1 bg-zinc-900 text-white text-sm rounded-md px-3 py-2"
          href="/clientes/cadastro"
        >
          <i class="ph ph-plus text-xs"></i>
          Novo
        </a>
      </div>
    </div>

    <div class="max-w-7xl mx-auto bg-white mt-6 border border-slate-100 shadow-md rounded-md px-4 py-6">
      <form id="customerForm" class="grid grid-cols-12 gap-3">
        <div class="relative col-span-12 md:col-span-3">
          <input
            type="text"
            id="inputCPF"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            name="cpf"
            placeholder=" "
            autocomplete="off"
            autofocus
          />
          <label for="inputCPF" class="input-check absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            CPF
          </label>
        </div>

        <div class="relative col-span-12 md:col-span-4">
          <input
            type="text"
            id="inputName"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            name="name"
            placeholder=" "
            autocomplete="off"
          />
          <label for="inputName" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Nome
          </label>
        </div>

        <div class="relative col-span-12 md:col-span-3 lg:col-span-2">
          <input
            type="date"
            id="inputDate"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            name="dateofbirth"
            placeholder=" "
          />
          <label for="inputDate" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Data de Nascimento
          </label>
        </div>


        <div class="relative col-span-12 md:col-span-2 flex flex-col justify-start">
          <span class="relative">Sexo</span>

          <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
              <input class="genere" type="radio" name="genere" value="male" checked />
              <label>Masculino</label>
            </div>

            <div class="flex items-center gap-2">
              <input class="genere" type="radio" name="genere" value="female" />
              <label>Feminino</label>
            </div>
          </div>
        </div>

        <div class="relative col-span-12 md:col-span-3">
          <input
            type="text"
            id="inputCEP"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            name="postalcode"
            placeholder=" "
          />
          <label for="inputCEP" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            CEP
          </label>

          <div class="absolute right-2 top-4 hidden" id="loadingCEP" role="status">
            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-slate-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
          </div>
        </div>

        <div class="relative col-span-12 md:col-span-6">
          <input
            type="text"
            id="inputStreet"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
            name="street"
            placeholder=" "
            disabled
          />
          <label for="inputStreet" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Logradouro
          </label>
        </div>

        <div class="relative col-span-12 md:col-span-3">
          <input
            type="text"
            id="inputNumber"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
            name="number"
            placeholder=" "
            disabled
          />
          <label for="inputNumber" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Número
          </label>
        </div>

        <div class="relative col-span-12 md:col-span-3">
          <input
            type="text"
            id="inputNeighborhood"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
            name="neighborhood"
            placeholder=" "
            disabled
          />
          <label for="inputNeighborhood" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Bairro
          </label>
        </div>

        <div class="relative col-span-12 md:col-span-6">
          <input
            type="text"
            id="inputCity"
            class="input-check block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
            name="city"
            placeholder=" "
            disabled
          />
          <label for="inputCity" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Cidade
          </label>
        </div>

        <div class="relative col-span-12 md:col-span-3">
          <select
            id="inputState"
            class="input-check block px-2.5 pb-2.5 border pt-4 w-full text-sm text-gray-900 rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
            name="state"
            disabled
          >
            <option value="" disabled hidden selected>Selecione...</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
          <label for="inputState" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            Estado
          </label>
        </div>

        <div class="col-span-12 flex items-center gap-2 mt-4">
          <button
            class="w-[100px] bg-slate-900 text-white text-sm rounded-md px-4 py-3 flex items-center justify-center"
            type="submit"
          >
            <div class="hidden" id="loading" role="status">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin fill-slate-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
              </svg>
              <span class="sr-only">Loading...</span>
            </div>

            <span id="btnSubmit">Adicionar</span>
          </button>

          <button
            class="w-[100px] border text-slate-900 text-sm rounded-md px-4 py-3"
            type="button"
            id="clearForm"
          >
            Limpar
          </button>
        </div>
      </form>
    </div>
  </main>

</body>
</html>
