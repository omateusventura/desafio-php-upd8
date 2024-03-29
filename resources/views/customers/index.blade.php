<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPD8 - Clientes</title>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/utils.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/filter.js') }}" type="module"></script>
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
        <div id="filter" class="hidden absolute z-10 bg-white w-full max-w-7xl mx-auto px-5 py-6 border shadow-md rounded-md mt-3
         left-1/2 transform -translate-x-1/2
        ">
          <h3 class="font-semibold flex items-center gap-1">
            <i class="ph ph-funnel"></i>
            Filtrar clientes
          </h3>

          <form class="w-full grid grid-cols-12 gap-4 mt-3">
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

            <div class="relative col-span-6">
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

            <div class="relative col-span-2">
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

            <div class="relative col-span-4 flex flex-col justify-start">
              <select
                id="inputGenere"
                class="input-check block px-2.5 pb-2.5 border pt-4 w-full text-sm text-gray-900 rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer disabled:bg-slate-50"
                name="state"
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

      <div class="max-w-7xl mx-auto bg-white mt-6 border border-slate-100 shadow-md rounded-md">
        <table id="table" class="w-full">
          <thead>
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
              <tr class="odd:bg-slate-50 border-b border-slate-100">
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
                    class="bg-gradient-to-r from-red-500 to-red-600 text-white
                    px-2.5 py-0.5 rounded-md ml-2 hover:from-red-600 hover:to-red-700"
                    type="button"
                  >
                    <i class="ph ph-trash"></i>
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
