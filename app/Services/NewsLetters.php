<?php
namespace App\Services;

class NewsLetters
{

    public function subscribe(string $email)
    {

            $mailchimp = new \MailchimpMarketing\ApiClient();

            $mailchimp->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us7'
            ]);

             return $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
                "email_address" => $email,
                "status" => "subscribed",
            ]); 
    }


}



?>