<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use App\Services\PayPalService;
use PayPal\Api\Amount;
use Exception;
use App\Models\Member;
use PayPal\Api\Payer;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    // Fonction pour créer un paiement PayPal
    public function createPaypalPayment(Request $request)
    {
        try {
            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    env('PAYPAL_CLIENT_ID'),
                    env('PAYPAL_SECRET')
                )
            );
            $apiContext->setConfig([
                'mode' => env('PAYPAL_MODE'),  // "sandbox" ou "live"
            ]);

            // Préparer le paiement
            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer((new Payer())->setPaymentMethod('paypal'))
                ->setTransactions([
                    (new Transaction())->setAmount(
                        (new Amount())->setCurrency('MAD')->setTotal(500)
                    )->setDescription('Cotisation annuelle FMDD')
                ])
                ->setRedirectUrls(
                    (new RedirectUrls())
                        ->setReturnUrl(route('paypal.success'))
                        ->setCancelUrl(route('payment'))
                );

            // Créer le paiement
            $payment->create($apiContext);
            return redirect()->away($payment->getApprovalLink());

        } catch (Exception $e) {
            Log::error('Erreur lors de la création du paiement PayPal: ' . $e->getMessage());
            return redirect()->route('payment')->with('error', 'Erreur lors de la création du paiement PayPal.');
        }
    }

    // Fonction pour gérer le succès du paiement PayPal
    public function paypalSuccess(Request $request)
    {
        try {
            $paymentId = $request->paymentId;
            $payerId = $request->PayerID;

            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    env('PAYPAL_CLIENT_ID'),
                    env('PAYPAL_SECRET')
                )
            );
            $apiContext->setConfig([
                'mode' => env('PAYPAL_MODE'),  // "sandbox" ou "live"
            ]);

            // Récupérer le paiement PayPal
            $payment = Payment::get($paymentId, $apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);

            // Exécuter le paiement
            $payment->execute($execution, $apiContext);

            // Mise à jour de l'état du membre dans la base de données
            $member = Member::find($request->member_id);
            if (!$member) {
                return redirect()->route('payment')->with('error', 'Membre non trouvé.');
            }

            $member->has_paid = true;
            $member->payment_status = 'approved';
            $member->payment_mode = 'online';
            $member->payment_date = now();
            $member->save();

            return redirect()->route('members.list')->with('success', 'Paiement PayPal effectué avec succès!');
        } catch (Exception $e) {
            Log::error('Erreur lors de l\'exécution du paiement PayPal: ' . $e->getMessage());
            return redirect()->route('payment')->with('error', 'Erreur lors du paiement PayPal.');
        }
    }

    // Fonction pour créer une session de paiement Stripe
    public function createStripeSession(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mad',  // Assurez-vous que 'mad' est valide ou utilisez 'MAD'
                        'product_data' => [
                            'name' => 'Cotisation annuelle FMDD',
                        ],
                        'unit_amount' => 50000, // 500 MAD en centimes
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => url('/stripe-success?member_id=' . $request->member_id),
                'cancel_url' => url('/payment'),
            ]);

            return response()->json(['id' => $session->id]);

        } catch (Exception $e) {
            Log::error('Erreur lors de la création de la session Stripe: ' . $e->getMessage());
            return redirect()->route('payment')->with('error', 'Erreur lors de la création de la session Stripe.');
        }
    }

    // Fonction pour gérer le succès du paiement Stripe
    public function stripeSuccess(Request $request)
    {
        try {
            $member = Member::find($request->member_id);
            if (!$member) {
                return redirect()->route('payment')->with('error', 'Membre non trouvé.');
            }

            // Mise à jour de l'état du membre après le paiement Stripe
            $member->has_paid = true;
            $member->payment_status = 'approved';
            $member->payment_mode = 'online';
            $member->payment_date = now();
            $member->save();

            return redirect()->route('members.list')->with('success', 'Paiement Stripe effectué avec succès!');
        } catch (Exception $e) {
            Log::error('Erreur lors du traitement du paiement Stripe: ' . $e->getMessage());
            return redirect()->route('payment')->with('error', 'Erreur lors du paiement Stripe.');
        }
    }
}
