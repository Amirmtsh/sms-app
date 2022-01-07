<?php
namespace App\Classes;


class SMSProvider
{
    private $retries = 0;
    public function provider1($to , $msg)
    {
        while ($this->retries<=3){
            $this->retries++;
            $r=rand(1,10);
            if ($r >= 7 ) {
                echo "message sent to ". $to ." using provider 1 \n";
                return true;
            }else{
                echo "sending message failed sending message failed using provider 1 \n";
            }
        }
        $this->retries=0;
        return false;

    }
    public function provider2($to , $msg)
    {
        while ($this->retries<=3){
            $this->retries++;
            $r=rand(1,10);
            if ($r >= 7 ) {
                echo "message sent to ". $to ." using provider 2 \n";
                return true;
            }else{
                echo "sending message failed sending message failed using provider 2 \n";
            }
        }
        $this->retries=0;
        return false;
    }
}
