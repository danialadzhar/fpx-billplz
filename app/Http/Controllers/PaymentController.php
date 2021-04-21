<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Billplz\Client;

class PaymentController extends Controller
{
    /**
     * Payment page
     * 
     * 
     */
    public function index()
    {
        return view('pages.payment');
    }

    /**
     * Payment process
     * 
     * 
     */
    public function process()
    {

        //$billplz = Client::make("3f78dfad-7997-45e0-8428-9280ba537215", "S-jtSalzkEawdSZ0Mb0sqmgA");
        $billplz = Client::make(env('BILLPLZ_API_KEY', '3f78dfad-7997-45e0-8428-9280ba537215'), env('BILLPLZ_X_SIGNATURE', 'S-jtSalzkEawdSZ0Mb0sqmgA'));

        $bill = $billplz->bill();

        $response = $bill->create(
            'ffesmlep',
            'pelikb@gmail.com',
            '+601112729197',
            'Danial Adzhar',
            \Duit\MYR::given(200),
            'http://example.com/webhook/',
            'Maecenas eu placerat ante.',
            ['redirect_url' => 'http://example.com/redirect/']
        );

        $test = $response->toArray();
        //dd($test['url']);

        return redirect($test['url']);
        
    }
}
