<?php 
namespace Helper;

class Withdraw{
    private $dataFile = 'transactions.json';
    private $data;
    private $depositAmount = 0;
    private $withdrawAmount = 0;
    private $transferAmount = 0;
    private $transactions;
    private $withdrawInput;
    private $email;
    

    public function ManageWithdraw(){
        $this->data = json_decode(file_get_contents($this->dataFile), true);

        $this->transactions = $this->data['transaction'];
        
        

        foreach ($this->transactions as $transaction) {
                if (isset($transaction['type']) && $transaction['type'] == 'deposit') {
                    $amount = intval($transaction['amount']);
                    $depositAmount = $this->depositAmount += $amount;  
                }else if( isset($transaction['type']) && $transaction['type'] == 'withdraw' ){
                    $amount = intval($transaction['amount']);
                    $withdrawAmount = $this->withdrawAmount += $amount;
                }else if( isset($transaction['type']) && $transaction['type'] == 'transfer' ){
                    $amount = intval($transaction['amount']);
                    $transferAmount = $this->transferAmount += $amount;
                }
        }

        $this->withdrawInput = readline('Enter Withdraw Amount: ');
        $this->email = readline('Enter Your Account Email');


        if (intval($depositAmount) > intval($withdrawAmount + $transferAmount)) {

            $withdrawtransaction = [
                'amount'         => $this->withdrawInput,
                'type'           => 'withdraw',
                'email'          => $this->email,
                'date'           => date('Y-m-d H:i:s'),
            ];

            $this->data['transaction'][] = $withdrawtransaction;
            file_put_contents($this->dataFile, json_encode($this->data, JSON_PRETTY_PRINT));
            echo'Withdraw Successfull';

        }else{
            echo "You don't Have Sufficiant Fund. Please add fund first";
        }

        

    
    }
}