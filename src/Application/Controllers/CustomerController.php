<?php

namespace Src\Application\Controllers;


use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\App;
use Src\Domain\Services\CustomerService;



class CustomerController extends Controller
{
    private $customerService;

    public function __construct(
        CustomerService $customerService
    ) {
        $this->customerService = $customerService;
    }


    public function generatePdf()
    {
        $customers =  $this->customerService->findAll();


        $pdf = App::make('snappy.pdf.wrapper');

        $pdf->loadView('pdf.customers-pdf', [
            'customers' => $customers
        ]);

        return $pdf->download('prueba.pdf');



    }



}
