<?php 
namespace Helper;

/* use Helper\Deposit;
use Helper\CurrentBalance;
use Helper\TransactionOparation;
use Helper\Withdraw;
use Helper\MoneyTransfer; */

/* require_once('Deposit.php');
require_once('Withdraw.php');
require_once('CurrentBlance.php');
require_once('Transaction.php');
require_once('MoneyTransfer.php'); */


spl_autoload_register(function ($className) {
    
    $baseDir = 'Helper/';
        if (strpos($className, 'Helper\\') === 0) {
            $className = substr($className, strlen('Helper\\'));
        }
    $classPath = $baseDir . $className . '.php';
        if (file_exists($classPath)) {
            require_once($classPath);
        }
});


class UserLogin
{
    private $dataFile = 'user.json';
    

    public function userLogin( string $email = null, string $password = null ) {
        $email = readline ("Enter Your Email: ");
        $password = readline ("Enter Your Password: ");
        $data = json_decode( file_get_contents ( $this->dataFile ), true );
        
        if(!empty( $data['user'] )){

            foreach ( $data as $value ) {
                foreach ( $value as  $val ) {
                    if ( $val["email"] == $email && $val["password"] == $password ) {
                        echo "You are welcome\n";
                        echo "1. Transactions\n";
                        echo "2. Deposit\n";
                        echo "3. Withdraw\n";
                        echo "4. Money Transfer\n";
                        echo "5. Current Balance\n";
                        $choice = readline("Enter your choice (1/2/3): ");
                        
                        if ( $choice == "1") {
                            $transaction = new TransactionOparation() ;
                            $transaction->CurrentBalance() ;
    
    
                        }else if ( $choice == "2") {
                            $deposit = new Deposit();
                            $deposit->addDisposit();
    
    
    
                        }else if ( $choice == "3") {
                            $withdraw = new Withdraw();
                            $withdraw->ManageWithdraw();
    
    
                        }elseif ( $choice == "4") {
                            $moneyTransafer = new MoneyTransfer();
                            $moneyTransafer->addMoneyTransfer();
                            
                        }elseif ( $choice == "5") {
                            $currentBalance = new CurrentBalance(); 
                            $currentBalance->CurrentBalance();
    
    
                        }else{
    
                        }
    
                    }
           
                }
            }


        }
    }
}