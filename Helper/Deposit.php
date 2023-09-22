<?php 

namespace Helper;

class Deposit{

    private $dataFile = "transactions.json";
    private $email;
    private $amount;

    public function __construct(){  
        if (!file_exists($this->dataFile)) {
            file_put_contents($this->dataFile, json_encode(['transaction' => []]));
        }
    }

    public function addDisposit( int $amount = null ){
        $data = json_decode( file_get_contents( $this->dataFile ), true );
        $this->amount = readline('Enter Deposit Amount: ');
        $this->email = readline('Enter Your Account Email');

        $transaction = [
            'amount'=> $this->amount,
            'type'  => 'deposit',
            'email' => $this->email,
            'date'  => date('Y-m-d H:i:s'),
        ];
        $data['transaction'][] = $transaction;
        file_put_contents($this->dataFile, json_encode($data, JSON_PRETTY_PRINT));
        echo'Deposit Successfull';


    }
}