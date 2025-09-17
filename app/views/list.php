<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem - Clientes</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
  <nav class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-14 items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-lg font-bold">S</div>
          <span class="font-semibold text-gray-900 text-lg">MicroSAP</span>
        </div>
        <div class="flex items-center space-x-2">
          <a href="/" class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-blue-600 transition-colors">Início</a>
          <a href="/clients/new" class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-blue-600 transition-colors">Cadastros</a>
          <a href="/clients" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors">Listagem</a>
          <div class="w-px h-6 bg-gray-300 mx-2"></div>
        </div>
      </div>
    </div>
  </nav>
  <div class="max-w-7xl mx-auto p-6">
  	<form method="get" action="/clients/search">
  		<div class="flex items-center space-x-2">
		  <input type="text" placeholder="Pesquisar CNPJ..." 
		         class="px-2 py-1 border border-gray-300 rounded-l-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
		         id="searchCNPJ" name="searchCNPJ" />
		  <button class="px-3 py-1 bg-blue-600 text-white rounded-r-md text-sm hover:bg-blue-700 transition-colors">
		    Pesquisar
		  </button>
  	</form>
		</div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-x-auto">
      <div class="px-6 py-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">Lista de Clientes</h1>
        <p class="text-sm text-gray-600 mt-1">Visualize os clientes cadastrados no sistema</p>
      </div>
	      <table class="min-w-full divide-y divide-gray-200">
	    <thead class="bg-gray-50">
	      <tr>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Razão Social</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homepage</th>
	        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CNPJ</th>
	        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
	      </tr>
	    </thead>

	    <tbody class="bg-white divide-y divide-gray-200">
		    <?php foreach($partialListClients as $partialListClient): ?>
		        <tr class="hover:bg-gray-50">
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
		                <?= $partialListClient['code'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700 truncate max-w-[150px]">
		                <?= $partialListClient['business_name'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
		                <?= $partialListClient['type'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
		                <?= $partialListClient['city'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
		                <?= $partialListClient['phone'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700 truncate max-w-[150px]">
		                <?= $partialListClient['email'] ?? 'Não informado' ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-blue-600 underline truncate max-w-[150px]">
		                <?= $partialListClient['homepage'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
		                <?= $partialListClient['cnpj'] ?>
		            </td>
		            <td class="px-4 py-2 whitespace-nowrap text-center text-sm">
		                <a href="/clients/<?= $partialListClient['id'] ?>/edit" 
		                   class="px-2 py-1 bg-blue-600 text-white hover:bg-blue-700 text-sm font-medium">
		                    Atualizar
		                </a>
		                <form action="/clients/<?= $partialListClient['id'] ?>/delete" method="POST" style="display:inline;" 
		                      onsubmit="return confirm('Deseja realmente deletar este cliente?')">
		                    <button type="submit" class="px-2 py-1 bg-red-600 text-white hover:bg-red-700 text-sm font-medium">
		                        Deletar
		                    </button>
		                </form>
		            </td>
		        </tr>
		    <?php endforeach; ?>
		</tbody>
    </div>
  </div>
</body>
</html>