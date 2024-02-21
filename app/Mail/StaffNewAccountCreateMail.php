<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffNewAccountCreateMail extends Mailable{
    use Queueable, SerializesModels;

    public $save;

    public function __construct($save){
        $this->save = $save;
    }

    public function build(){
        return $this->markdown("email.staff_account")->subject(config("app.name")."Staff New Account Create Mail");
    }
}

?>