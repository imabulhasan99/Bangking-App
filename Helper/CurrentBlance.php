<?php 
namespace Helper;


class CurrentBalance{
    private $dataFile = "transactions.json";
    private $data;
    private $transactions;
    private $depositAmount = 0;
    private $withdrawAmount = 0;
    private $transferAmount = 0;
    private $email;

    public function CurrentBalance(){
        $this->data = json_decode(file_get_contents($this->dataFile), true);
        $this->transactions = $this->data['transaction'];
        $this->email = readline('Enter Your Account Email: ');
        foreach ($this->transactions as $transaction) {
            if (isset($transaction['type']) && $transaction['type'] == 'deposit' && $transaction['email'] == $this->email) {
                $amount = intval($transaction['amount']);
                $depositAmount = $this->depositAmount += $amount;  
            }else if( isset($transaction['type']) && $transaction['type'] == 'withdraw' && $transaction['email'] == $this->email ){
                $amount = intval($transaction['amount']);
                $withdrawAmount = $this->withdrawAmount += $amount;
            }
    }

        if( $depositAmount > $withdrawAmount ){
            $currentBlance = $depositAmount - $withdrawAmount ;
            echo $currentBlance;
        }else{
            echo'Oh! Something wrong';
        }

    }
}


