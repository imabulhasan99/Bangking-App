<?php 
namespace Helper;


class TransactionOparation{
    private $dataFile = "transactions.json";
    private $data;
    private $transactions;
    private $email;

    public function CurrentBalance(){
        $this->data = json_decode(file_get_contents($this->dataFile), true);
        $this->transactions = $this->data['transaction'];
        $this->email = readline('Enter Your Account Email: ');
        foreach ($this->transactions as $transaction) {
            if ( $transaction['email'] == $this->email ) {
                echo "Transaction Amount: ". $transaction['amount']."\n";
              
                echo "Transaction Type: ". $transaction['type']."\n";
               
                echo "Transaction Date: ". $transaction['date']."\n";
               
               
            }else{
                
            }
    }


    }
}


