<?php

namespace App\Models;

class SqliteDb extends Model
{
    

    public static function getDb() {

        try {
                db()->connect([
                'dbtype' => 'sqlite',
                'dbname' => 'clients.db',
            ]);

                self::createTb(); 
            
        } catch (Exception $e) {
            response()->json([
                'message' => $e->getMessage()
            ])->exit();
            
        }
    }

    public static function createTb(){
        db()->query("
            CREATE TABLE IF NOT EXISTS clients (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                code TEXT,
                store TEXT,
                business_name TEXT,
                type TEXT,
                trade_name TEXT,
                purpose TEXT,
                cnpj TEXT UNIQUE,
                zip_code TEXT,
                country TEXT,
                state TEXT,
                city_code TEXT,
                city TEXT,
                address TEXT,
                neighborhood TEXT,
                area_code TEXT,
                phone TEXT,
                contact TEXT,
                email TEXT,
                homepage TEXT,
                opening_date TEXT,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ")->execute();
    }
}
