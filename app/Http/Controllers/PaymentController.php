<?php

namespace App\Http\Controllers;

use App\Models\EventTicket;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function eventPayment(Request $request)
    {

        $request->validate([
            'event_id' => 'required|numeric',
            'price' => 'required|numeric',
            'number_of_tickets' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);
        if ($request->payment_method == 'paypal') {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('eventPaypalSuccess'),
                    "cancel_url" => route('eventPaypalCancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $request->price,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        session()->put('event_id', $request->event_id);
                        session()->put('number_of_tickets', $request->number_of_tickets);
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('cancel');
            }
        }

    }

    public function eventPaypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $payment = new EventTicket;
            $payment->payment_id = $response['id'];
            $payment->event_id=
            // $payment->user_id=
            // $payment->unit_price=
            // $payment->number_of_tickets=
            // $payment->total_price=
            $payment->payment_method="PayPal";
            // $payment->payment_status=
            // $payment->currency=

            $payment->event_id = session()->get('event_id');
            $payment->quantity = session()->get('quantity');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->save();

            return "Payment is successful";



            unset($_SESSION['product_name']);
            unset($_SESSION['quantity']);

        } else {
            return redirect()->route('cancel');
        }
    }
    public function eventPaypalCancel()
    {
        return "Payment is cancelled.";
    }
}
// $table->string('payment_id');
// $table->integer('event_id');
// $table->integer('user_id');
// $table->string('unit_price');
// $table->integer('number_of_tickets');
// $table->integer('total_price');
// $table->string('payment_method');
// $table->string('payment_status');
// $table->string('currency');
