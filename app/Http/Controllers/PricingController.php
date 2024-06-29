<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PricingController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth.custom');
    }

    public function createTransaction()
    {
        return view('paypal.createTransaction');
    }

    public function processTransaction($courseId, Request $request)
    {
        $course = Course::where('id', $courseId)->first();
        if(empty($course))
        {
            return redirect(route('course-detail', $course->id));
        }
        $paypalModule = new PayPalClient;
        $paypalModule->setApiCredentials(config('paypal'));
        $token = $paypalModule->getAccessToken();
        $paypalModule->setAccessToken($token);
        $invoiceId = uniqid();
        $order = $paypalModule->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $course->price
                    ],
                    "invoice_id" =>  $invoiceId,
                    "custom_id" =>  $course->id,
                    "course_id" =>  $course->id,
                ]
            ],
            "application_context" => [
                "cancel_url" => route('pricing.cancelTransaction'),
                "return_url" => route('pricing.successTransaction'),
            ]
        ]);
        if (isset($order['id'])) {
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect(route('course-detail', $course->id));
    }

    public function successTransaction(Request $request)
    {
        $paypalModule = new PayPalClient;
        $paypalModule->setApiCredentials(config('paypal'));
        $token = $paypalModule->getAccessToken();
        $paypalModule->setAccessToken($token);

        $result = $paypalModule->capturePaymentOrder($request['token']);
        if (isset($result['status']) && $result['status'] == 'COMPLETED') {
            $courseId = null;
            if (isset($result['purchase_units'][0]['payments']['captures'][0]['custom_id'])) {
                $courseId = $result['purchase_units'][0]['payments']['captures'][0]['custom_id'];
            }
            $course = Course::where('id', $courseId)->first();
            $paymentInfo = $result['purchase_units'][0]['payments']['captures'][0] ?? null;
            if(empty($paymentInfo)){
                return redirect(route('course-detail', $course->id));
            }
            $dataSave = [
                'payment_id' => $paymentInfo['id'],
                'course_id'=> $courseId,
                'user_id' => Auth::user()->id,
                'amount' => 1,
            ];
            $result = Transaction::create($dataSave);
            return redirect()
                ->route('createTransaction')
                ->with('success', 'Transaction complete.');
        }
        return redirect()
            ->route('createTransaction')
            ->with('error', 'Transaction failed.');
    }

    public function cancelTransaction(Request $request)
    {
        $courseId = $request->get('courseId');
        $course = Course::where('id', $courseId)->first();
        if(empty($course))
        {
            return redirect(route('course-detail', $course->id));
        }
    }
}
