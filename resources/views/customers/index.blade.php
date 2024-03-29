<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPD8 - Clientes</title>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/utils.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/index.js') }}" type="module"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  </head>
  <body>
    <main class="w-screen h-screen bg-slate-50 p-4">
      <div className="max-w-7xl mx-auto relative bg-red-500">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
          <h1 class="text-2xl font-light flex items-center gap-2">
            <i class="ph-light ph-users text-[1.8rem] relative top-[1px]"></i>
            Clientes
          </h1>

          <div class="flex items-center gap-3">
            <button id="btnFilter" class="flex items-center gap-1 border text-slate-900 text-sm rounded-md px-3 py-2">
              <i class="ph ph-funnel"></i>
              Filtro
            </button>

            <a
              class="flex items-center gap-1 bg-zinc-900 text-white text-sm rounded-md px-3 py-2"
              href="http://localhost:8000/clientes/cadastro"
            >
              <i class="ph ph-plus"></i>
              Novo
            </a>
          </div>
        </div>

        <!-- Filter -->
        <div id="filter" class="hidden absolute z-40 bg-white w-full max-w-7xl mx-auto px-5 py-6 border shadow-md rounded-md mt-3
         left-1/2 transform -translate-x-1/2
        ">
          <h3 class="font-semibold flex items-center gap-1">
            <i class="ph ph-funnel"></i>
            Filtrar clientes
          </h3>

          <form id="formFilter" class="w-full grid grid-cols-12 gap-4 mt-3">
            <div class="relative col-span-4">
              <input
                type="text"
                id="inputCPF"
                class="input-check block px-2.5 pb-2.5 pt-4 w-full border text-sm text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="cpf"
                placeholder=" "
                autocomplete="off"
              />
              <label for="inputCPF" class="input-check absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                CPF
              </label>
            </div>

            <div class="relative col-span-8">
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

            <div class="relative col-span-4 flex flex-col justify-start">
              <select
                id="inputGenere"
                class="input-check block px-2.5 pb-2.5 border pt-4 w-full text-sm text-gray-900 rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
                name="genere"
              >
                <option value="">Todos</option>
                <option value="male">Masculino</option>
                <option value="female">Feminino</option>
              </select>
              <label for="inputGenere" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                Sexo
              </label>
            </div>

            <div class="relative col-span-6">
              <select
                id="inputState"
                class="input-check block px-2.5 pb-2.5 border pt-4 w-full text-sm text-gray-900 rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
                name="state"
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

            <button
              type="submit"
              class="col-span-2 bg-slate-900 text-white text-sm rounded-md"
            >
              Filtrar
            </button>
          </form>
        </div>
      </div>

      <!-- Table -->
      <div class="max-w-7xl max-h-[calc(100%_-_80px)] mx-auto overflow-auto bg-white mt-6 border border-slate-100 shadow-md rounded-md">
        <table id="table" class="w-full">
          <thead class="sticky top-0 z-20 bg-white border-b border-slate-100">
            <tr class="border-b border-slate-100">
              <th class="text-start text-slate-900 px-3 py-3">Cliente</th>
              <th class="text-start text-slate-900 px-3 py-3"s>Data de Nascimento</th>
              <th class="text-start text-slate-900 px-3 py-3">Sexo</th>
              <th class="text-start text-slate-900 px-3 py-3">Cidade</th>
              <th class="text-start text-slate-900 px-3 py-3">Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tableBody">
            @foreach ($customers as $customer)
              <tr id="row-{{ $customer->id }}" class="odd:bg-slate-50 border-b border-slate-100">
                <td class="px-3 py-3">{{ $customer->name }}</td>
                <td class="px-3 py-3">{{ date('d/m/Y', strtotime($customer->dateofbirth)) }}</td>
                <td class="px-3 py-3">{{ $customer->genere === 'male' ? 'Masculino' : 'Feminino' }}</td>
                <td class="px-3 py-3">{{ $customer->city }}</td>
                <td class="px-3 py-3">{{ $customer->state }}</td>
                <td>
                  <a
                    class="w-fit bg-gradient-to-r from-blue-500 to-blue-600 text-white
                    px-2 py-1 rounded-md hover:from-blue-600 hover:to-blue-700"
                    href="<?= 'http://localhost:8000/clientes/editar/' . $customer->id ?>"
                  >
                    <i class="relative left-[2px] ph ph-pen"></i>
                  </a>

                  <button
                    class="btnPopup relative bg-gradient-to-r from-red-500 to-red-600 text-white
                    px-2.5 py-0.5 rounded-md ml-2 hover:from-red-600 hover:to-red-700"
                    type="button"
                  >
                    <i class="ph ph-trash pointer-events-none"></i>

                    <!-- Pop up -->
                    <div id="popup-{{$customer->id}}" class="popup hidden absolute z-10 right-8 top-10 bg-white border shadow-md rounded-md w-[250px] px-4 pt-2">
                      <h4 class="text-slate-900 text-start text-sm font-semibold pb-1">Atenção</h4>
                      <span class="block text-start text-sm text-slate-900 -leading-[50px]">
                        Deseja realmente excluir esta informação?
                      </span>

                      <div class="flex justify-end items-start gap-2 border-t py-2 mt-2">
                        <div
                          id="btnCancel"
                          class="text-xs border text-slate-800 rounded-md px-2 py-2"
                          role="button"
                          data-id="{{ $customer->id }}"
                        >
                          Cancelar
                        </div>
                        <div
                          id="btnDelete"
                          class="w-[65px] text-xs bg-red-500 text-white rounded-md px-2 py-2 flex justify-center items-center"
                          role="button"
                          data-id="{{ $customer->id }}"
                        >
                          <span class="pointer-events-none" id="description-{{$customer->id}}">Excluir</span>
                          <div class="hidden" id="loadingPopup-{{$customer->id}}" role="status">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-slate-200" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                          </div>
                        </div>
                      </div>
                    </div>

                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </body>
</html>
