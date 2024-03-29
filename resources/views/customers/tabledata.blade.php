

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
