@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-teal-500 px-6 py-4">
            <h2 class="text-2xl font-bold text-white">Paiement de la Cotisation Annuelle – 500 Dhs</h2>
            <p class="mt-1 text-green-100">Finalisez votre inscription en réglant votre cotisation annuelle</p>
        </div>

        <div class="p-6 md:p-8">
            <div class="mb-8 p-4 bg-green-50 rounded-lg border border-green-100">
                <h3 class="text-lg font-semibold text-green-800 mb-3 flex items-center">
                    <i class="fas fa-star text-green-600 mr-2"></i> Avantages de votre adhésion
                </h3>
                <ul class="space-y-2 text-green-700">
                    <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2 text-sm"></i>Accès prioritaire aux formations et événements FMDD</li>
                    <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2 text-sm"></i>Accès aux services exclusifs membres</li>
                    <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2 text-sm"></i>Réseautage avec les professionnels du secteur</li>
                </ul>
            </div>

            <form id="payment-form" method="POST" action="{{ route('members.payment.submit') }}" enctype="multipart/form-data">

                @csrf

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Méthode de paiement</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <label class="payment-option">
                            <input type="radio" name="payment_mode" value="online" class="sr-only peer" required>
                            <div class="p-4 border-2 rounded-lg peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                                        <i class="fas fa-credit-card text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800">Paiement en ligne</h4>
                                        <p class="text-sm text-gray-500">Carte bancaire sécurisée</p>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_mode" value="bank_transfer" class="sr-only peer" required>
                            <div class="p-4 border-2 rounded-lg peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                                <div class="flex items-center">
                                    <div class="bg-purple-100 p-2 rounded-full mr-3">
                                        <i class="fas fa-university text-purple-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800">Virement bancaire</h4>
                                        <p class="text-sm text-gray-500">Versement sur compte FMDD</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Zone bouton PayPal -->
                <div id="paypal-button-container" class="hidden mt-6"></div>

                <!-- Section Justificatif -->
                <div id="proof-upload" class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Justificatif de paiement</h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléverser votre preuve de paiement</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg">
                                <div class="space-y-1 text-center">
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none">
                                            <span>Télécharger un fichier</span>
                                            <input type="file" name="payment_proof" accept=".pdf,.jpg,.jpeg,.png" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF, JPG ou PNG jusqu'à 5MB</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Référence du paiement (facultatif)</label>
                            <div class="mt-1">
                                <input type="text" name="payment_reference" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm p-3 border">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirmations -->
                <div class="space-y-4 mb-8">
                    <label class="flex items-start">
                        <div class="flex items-center h-5 mt-0.5">
                            <input type="checkbox" name="has_paid" id="has_paid" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="has_paid" class="font-medium text-gray-700 cursor-pointer">Je confirme avoir réglé ma cotisation de 500 Dhs</label>
                            <p class="text-gray-500 text-xs mt-1">Vous devez avoir effectué le paiement pour continuer</p>
                        </div>
                    </label>

                    <label class="flex items-start">
                        <div class="flex items-center h-5 mt-0.5">
                            <input type="checkbox" name="fmdd_consent" id="fmdd_consent" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="fmdd_consent" class="font-medium text-gray-700 cursor-pointer">J'autorise FMDD à vérifier et enregistrer mes informations</label>
                            <p class="text-gray-500 text-xs mt-1">Conformément à notre politique de confidentialité</p>
                        </div>
                    </label>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-600 to-teal-500 hover:from-green-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-check-circle mr-2"></i> Valider mon paiement
                    </button>
                    <div id="stripe-button-container" class="hidden mt-4"></div>
                    <div id="paypal-button-container" class="hidden mt-4"></div>

                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500"><i class="fas fa-info-circle text-gray-400 mr-1"></i> Votre inscription sera validée sous 48h après vérification du paiement. Pour toute question, <a href="#" class="text-green-600 hover:text-green-800">contactez-nous</a>.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>


<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");


    const stripeBtnContainer = document.getElementById('stripe-button-container');
    const paypalBtnContainer = document.getElementById('paypal-button-container');

    document.querySelectorAll('input[name="payment_mode"]').forEach(input => {
        input.addEventListener('change', function () {
            if (this.value === 'online') {
                stripeBtnContainer.classList.remove('hidden');
                paypalBtnContainer.classList.remove('hidden');
            } else {
                stripeBtnContainer.classList.add('hidden');
                paypalBtnContainer.classList.add('hidden');
            }
        });
    });

    // Stripe Checkout session
    stripeBtnContainer.addEventListener('click', function () {
    fetch('/create-stripe-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            amount: 50000, // 500 MAD in cents
            member_id: "{{ $member->id ?? 'null' }}" // Fixing the Blade syntax
        })
    })
    .then(res => res.json())
    .then(data => stripe.redirectToCheckout({ sessionId: data.id }));
});


    // PayPal Buttons
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: { value: '500.00', currency_code: 'USD' }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(details => {
                window.location.href = '/paypal-success?member_id={{ $member->id ?? "null" }}';
            });
        }
    }).render('#paypal-button-container');
</script>

@endsection
