<?php
namespace App\Models;

class Client extends Model
{
    public static function counter() {
        SqliteDb::getDb();
        $result = db()->query("SELECT COUNT(*) as total FROM clients")->first();
        return $result['total'] ?? 0;
    }

    public static function active(){
        SqliteDb::getDb();
        $result = db()->query("SELECT COUNT(*) as total FROM clients WHERE purpose='F'")->first();
        return $result['total'] ?? 0;
    }

    public static function last(){
        SqliteDb::getDb();
        $lastClient = db()->select('clients')->last();

        if (!$lastClient) {
            return 'Nenhum cliente';
        }

        $lastCNPJ = $lastClient['cnpj'] ?? '';
        $cnpj = preg_replace('/\D/', '', $lastCNPJ);

        if (!$cnpj) return 'CNPJ não informado';

        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
    }


    public static function list() {
        SqliteDb::getDb();
        return db()->select('clients')->all();
    }

    public static function findById($id){
        SqliteDb::getDb();
        return db()->select('clients')->where('id', $id)->first();
    }

    public static function destroy($id){
        SqliteDb::getDb();
        db()->delete('clients')->where('id', $id)->execute();
    }
}
