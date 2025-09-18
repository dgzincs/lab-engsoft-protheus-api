<?php
namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use Leaf\Mailer\Mailer;

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

   public static function search($cnpj){
        SqliteDb::getDb();
        $client = db()->select('clients')->where('cnpj', $cnpj)->first();
        return $client ?: null;
    }

    public static function sendEmail($code, $business_name, $opening_date) {
        mailer()->connect([
            'host' => 'smtp.ethereal.email',
            'port' => 587,
            'auth' => [
                'username' => 'christelle.schmeler@ethereal.email',
                'password' => 'Fbv88XRZVYQcT9aN9k'
            ],
            'debug' => 0,
            'charset' => 'UTF-8',
            'encoding' => 'base64' 
        ]);

        $mail = mailer()->create([
            'subject' => 'Novo usuário cadastrado',
            'body' => "
                <html>
                  <body style='font-family: Arial, sans-serif; color: #333;'>
                    <div style='border-left: 5px solid #2F855A; padding: 10px;'>
                        <h2 style='color: #2F855A; margin-bottom: 10px;'>Novo usuário cadastrado!</h2>
                        <p><strong>Código:</strong> {$code}</p>
                        <p><strong>Razão Social:</strong> {$business_name}</p>
                        <p><strong>Data de Abertura:</strong> {$opening_date}</p>
                        <hr style='border: none; border-top: 1px solid #ccc; margin: 10px 0;'>
                        <p style='font-size: 12px; color: #666;'>Este é um e-mail automático do MicroSAP.</p>
                    </div>
                  </body>
                </html>
            ",
            'isHTML' => true,
            'recipientEmail' => 'christelle.schmeler@ethereal.email',
            'recipientName' => 'Christelle Schmeler',
            'senderEmail' => 'christelle.schmeler@ethereal.email',
            'senderName' => 'Sistema MicroSAP',
            'charset' => 'UTF-8',
            'encoding'=> 'base64'
        ]);
        $mail->send();
    }

}
