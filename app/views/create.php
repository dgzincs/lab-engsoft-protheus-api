<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Clientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14 items-center">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-lg font-bold">S</div>
                <span class="font-semibold text-gray-900 text-lg">MicroSAP</span>
            </div>
            <div class="flex items-center space-x-2">
                <a href="/" class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-blue-600 transition-colors">Início</a>
                <a href="/clients/new" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors">Cadastros</a>
                <a href="/clients" class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-blue-600 transition-colors">Listagem</a>
                <div class="w-px h-6 bg-gray-300 mx-2"></div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h1 class="text-2xl font-semibold text-gray-900">Cadastro de Cliente</h1>
                <p class="text-sm text-gray-600 mt-1">Preencha os dados do cliente</p>
            </div>

            <div class="p-6">
                <form method="POST" action="/clients" onsubmit="return confirm('Deseja realmente cadastrar este cliente?')">
                    <div class="mb-8">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Dados Obrigatórios</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Código <span class="text-red-500">*</span></label>
                                <input type="text" id="codigo" name="codigo" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: C00002"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Razão Social <span class="text-red-500">*</span></label>
                                <input type="text" id="razao" name="razao" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: CEETEPS"/>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">DDD <span class="text-red-500">*</span></label>
                                    <input type="text" id="ddd" name="ddd" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 015"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Telefone <span class="text-red-500">*</span></label>
                                    <input type="text" id="telefone" name="telefone" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 32757682"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Data de Abertura <span class="text-red-500">*</span></label>
                                <input type="date" id="abertura" name="abertura" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8 ltr">
                        <button type="button" id="toggleOptional" 
                                class="w-full text-left px-4 py-2 bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 border-l-4 border-green-500">
                                Campos Opcionais
                        </button>
                        <div id="optionalContent" class="mt-4 max-h-0 overflow-hidden transition-all duration-300">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Loja</label>
                                    <input type="text" id="loja" name="loja" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 01"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                                    <select id="tipo" name="tipo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="J">Jurídica</option>
                                        <option value="F">Física</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome Fantasia</label>
                                    <input type="text" id="nomefantasia" name="nomefantasia" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: CPS"/>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CNPJ</label>
                                <input type="text" id="cnpj" name="cnpj" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 18820691000135"/>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">CEP</label>
                                    <input type="text" id="cep" name="cep" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 18200000"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                    <input type="text" id="estado" name="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: SP"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Código Município</label>
                                    <input type="text" id="codmunicipio" name="codmunicipio" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: 22307"/>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: ITAPETININGA"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: CPS"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Endereço</label>
                                    <input type="text" id="endereco" name="endereco" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: RUA DA CPS"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="email@exemplo.com"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Homepage</label>
                                    <input type="url" id="homepage" name="homepage" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://exemplo.com"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Finalidade</label>
                                    <select id="finalidade" name="finalidade" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="F">F</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">País</label>
                                    <input type="text" id="pais" name="pais" value="105" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md">Cadastrar Cliente</button>
                    <button type="reset" class="px-4 py-2 bg-gray-400 hover:bg-blue-700 text-white font-medium rounded-md">Limpar</button>
                </form>
            </div>
        </div>
    </div>

<script>
    const toggleBtn = document.getElementById('toggleOptional');
    const optionalContent = document.getElementById('optionalContent');

    toggleBtn.addEventListener('click', () => {
        if (optionalContent.style.maxHeight && optionalContent.style.maxHeight !== "0px") {
            optionalContent.style.maxHeight = "0";
        } else {
            optionalContent.style.maxHeight = optionalContent.scrollHeight + "px";
        }
    });

    // Consulta CEP
    document.getElementById('cep').addEventListener('blur', function() {
      const cep = this.value.replace(/\D/g, '');
      if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
          .then(response => response.json())
          .then(data => {
            if (!data.erro) {
              document.getElementById('endereco').value = data.logradouro;
              document.getElementById('bairro').value = data.bairro;
              document.getElementById('cidade').value = data.localidade;
              document.getElementById('estado').value = data.uf;
              document.getElementById('codmunicipio').value = data.ibge;
            } else {
              alert('CEP não encontrado!');
            }
          })
          .catch(() => alert('Erro ao consultar o CEP.'));
      }
    });

    // Consulta CNPJ
    document.getElementById('cnpj').addEventListener('blur', function() {
      const cnpj = this.value.replace(/\D/g, '');
      if (cnpj.length === 14) {
        fetch(`https://publica.cnpj.ws/cnpj/${cnpj}`)
          .then(response => response.json())
          .then(data => {
            if (!data.erro) {
              document.getElementById('razao').value = data.razao_social;
            } else {
              alert('CNPJ não encontrado!');
            }
          })
          .catch(() => alert('Erro ao consultar o CNPJ.'));
      }
    });
</script>
</body>
</html>
