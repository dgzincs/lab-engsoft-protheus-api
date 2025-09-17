<?php

namespace App\Controllers;
use App\Models\Client;
use App\Models\SqliteDb;

class ClientsController extends Controller
{
    public function index() {
        $total_clients = Client::counter();
        $total_active = Client::active();
        $last_client = Client::last();
    
        return response()->view('index', [
            'total_clients' => $total_clients,
            'total_active' => $total_active,
            'last_client' => $last_client,
        ]);
    }

    public function create(){
        response()->view('create');
    }

    public function list()
    {
        $partialListClients = Client::list();

        return response()->view('list', [
            'partialListClients' => $partialListClients,
        ]);
    }

    public function edit($id) {
        $client = Client::findById($id);
        response()->view('edit', [
            'client' => $client
        ]);
    }


    public function store(){
        $code        = $_POST['codigo'] ?? null;
        $store       = $_POST['loja'] ?? null;
        $type        = $_POST['tipo'] ?? null;
        $corporate   = $_POST['razao'] ?? null; 
        $tradeName   = $_POST['nomefantasia'] ?? null;
        $cnpj        = $_POST['cnpj'] ?? null;
        $zip         = $_POST['cep'] ?? null;
        $state       = $_POST['estado'] ?? null;
        $cityCode    = $_POST['codmunicipio'] ?? null;
        $city        = $_POST['cidade'] ?? null;
        $address     = $_POST['endereco'] ?? null;
        $district    = $_POST['bairro'] ?? null;
        $areaCode    = $_POST['ddd'] ?? null;
        $phone       = $_POST['telefone'] ?? null;
        $email       = $_POST['email'] ?? null;
        $website     = $_POST['homepage'] ?? null;
        $openingDate = $_POST['abertura'] ?? null;
        $purpose     = $_POST['finalidade'] ?? null;
        $country     = $_POST['pais'] ?? null;

        SqliteDb::getDb();
        db()->insert('clients')->params([
            'code'         => $code,
            'store'        => $store,
            'type'         => $type,
            'business_name'=> $corporate,
            'trade_name'   => $tradeName,
            'cnpj'         => $cnpj,
            'zip_code'     => $zip,
            'state'        => $state,
            'city_code'    => $cityCode,
            'city'         => $city,
            'address'      => $address,
            'neighborhood' => $district,
            'area_code'    => $areaCode,
            'phone'        => $phone,
            'contact'      => $areaCode . $phone, // se quiser um contato completo
            'email'        => $email,
            'homepage'     => $website,
            'opening_date' => $openingDate,
            'purpose'      => $purpose,
            'country'      => $country
        ])->execute();
        $this->index();
    }

    public function updateClient($id) {
        SqliteDb::getDb();
         db()
          ->update('clients')
          ->params([
              'code'         => $_POST['codigo'] ?? null,
              'store'        => $_POST['loja'] ?? null,
              'type'         => $_POST['tipo'] ?? null,
              'business_name'=> $_POST['razao'] ?? null,
              'trade_name'   => $_POST['nomefantasia'] ?? null,
              'cnpj'         => $_POST['cnpj'] ?? null,
              'zip_code'     => $_POST['cep'] ?? null,
              'state'        => $_POST['estado'] ?? null,
              'city_code'    => $_POST['codmunicipio'] ?? null,
              'city'         => $_POST['cidade'] ?? null,
              'address'      => $_POST['endereco'] ?? null,
              'neighborhood' => $_POST['bairro'] ?? null,
              'area_code'    => $_POST['ddd'] ?? null,
              'phone'        => $_POST['telefone'] ?? null,
              'email'        => $_POST['email'] ?? null,
              'homepage'     => $_POST['homepage'] ?? null,
              'opening_date' => $_POST['abertura'] ?? null,
              'purpose'      => $_POST['finalidade'] ?? null,
              'country'      => $_POST['pais'] ?? null
          ])
          ->where('id', $id)
          ->execute();;
        $this->index();
    }




    public function destroy($id)
    {
        if ($id) Client::destroy($id);
        $this->list();
    }

   public function searchByCNPJ()
    {
        $cnpj = request()->get('searchCNPJ');

        if(!$cnpj) {
            return response()->view('list', [
                'partialListClients' => [],
            ]);
        }

        $client = Client::search($cnpj);

        response()->view('list', [
            'partialListClients' => $client 
                ? [$client] 
                : [[
                    'code' => '-',
                    'business_name' => '-',
                    'type' => '-',
                    'city' => '-',
                    'phone' => '-',
                    'email' => '-',
                    'homepage' => '-',
                    'cnpj' => '-'
                ]],
        ]);

    }

}
