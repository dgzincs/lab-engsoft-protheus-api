<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Clientes</title>
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

                <!-- Menu -->
                <div class="flex items-center space-x-2">
                    <a href="/" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors">Início</a>
                    <a href="/clients/new" class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-blue-600 transition-colors">Cadastros</a>
                    <a href="/clients" class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-blue-600 transition-colors">Listagem</a>
                    <div class="w-px h-6 bg-gray-300 mx-2"></div>
                </div>
            </div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Cards Resumo -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Clientes Cadastrados</h3>
                <p class="text-2xl font-semibold text-gray-900 mt-2"><?= $total_clients ?></p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Clientes Ativos</h3>
                <p class="text-2xl font-semibold text-gray-900 mt-2"><?= $total_active ?></p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Último cliente cadastrado</h3>
                <p class="text-2xl font-semibold text-gray-900 mt-2"><?= $last_client ?></p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Razão</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homepage</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                    <td class="px-6 py-4 whitespace-nowrap">...</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
