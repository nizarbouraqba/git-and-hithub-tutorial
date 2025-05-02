<?php

namespace App\Http\Controllers;
use Brevo\Api\TransactionalEmailsApi;
use Brevo\Model\SendSmtpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationMail;
use Carbon\Carbon;

class MemberController extends Controller
{
   
   
   
    // ➤ Étape 1 : Formulaire d’informations personnelles
    public function showStep1()

    { $locale = Session::get('locale', config('app.locale'));
       
        // dd($locale);
        return view('form.step1', [
            'step1Data' => Session::get('member_data.step1', [])
        ]);
    }

    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'date_of_birth' => 'required|date|before:-16 years',
            'gender' => 'required|in:male,female,other,prefer_not_to_say',
            'phone' => 'required|regex:/^\+212[0-9]{9}$/',
            'email' => 'required|email|unique:members,email',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'current_status' => 'required',
            'education_level' => 'required',
            'field_of_study' => 'required|string|max:100',
            'interests' => 'required|array|min:1',
            'interests.*' => 'in:personal_development,professional_training,job_search,business_creation,community_projects,environment,other',
            'motivation' => 'required|string|min:20|max:1000',
            'previously_participated' => 'required|boolean',
            'hear_about_us' => 'required|array|min:1',
            'receive_newsletter' => 'required|boolean'
        ]);
     
        Session::put('member_data.step1', $validated);
        return redirect()->route('members.step2');
    }

    // ➤ Étape 2 : Téléversement de documents
    public function showStep2()
    {
        if (!Session::has('member_data.step1')) {
            return redirect()->route('members.step1')->with('error', 'Veuillez d\'abord compléter les informations personnelles.');
        }

        return view('form.step2', [
            'step2Data' => Session::get('member_data.step2', [])
        ]);
    }

    public function storeStep2(Request $request)
    {
        $validated = $request->validate([
            'motivation' => 'required|string|min:10|max:1000',
            'previously_participated' => 'required|boolean',
            'hear_about_us' => 'required|array|min:1',
            'interests' => 'required|array|min:1',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'cin' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'motivation_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // Extraction des données sans les fichiers
        $data = $request->except(['cv', 'cin', 'motivation_letter']);
    
        // Conversion des champs qui contiennent des tableaux en JSON
        $data['hear_about_us'] = json_encode($data['hear_about_us']);
        $data['interests'] = json_encode($data['interests']);
    
        // Stockage des fichiers
        foreach (['cv', 'cin', 'motivation_letter'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field . '_path'] = $request->file($field)->storeAs(
                    'members/documents/' . now()->format('Y/m'),
                    uniqid() . '.' . $request->file($field)->extension()
                );
            }
        }
    
        
        // Stockage des données dans la session
        Session::put('member_data.step2', $data);
    
        // Redirection vers la page de confirmation
        return redirect()->route('members.confirmation');
    }

    // ➤ Étape 3 : Confirmation
    public function showConfirmation()
    {
        if (!Session::has('member_data.step2')) {
            return redirect()->route('members.step1')->with('error', 'Veuillez compléter toutes les étapes.');
        }

        return view('form.confirmation', [
            'memberData' => array_merge(
                Session::get('member_data.step1', []),
                Session::get('member_data.step2', [])
            )
        ]);
    }

    // ➤ Soumission finale du formulaire (après consentements)
    public function submitFinal(Request $request)
    {  
        // Validation des consentements
        $request->validate([
            'data_consent' => 'required|accepted',
            'values_consent' => 'required|accepted',
        ]);

        // Récupération des données de la session
        $memberData = Session::get('member_data');

        if (!$memberData || !isset($memberData['step1']) || !isset($memberData['step2'])) {
            return redirect()->route('members.step1')->with('error', 'Des informations sont manquantes. Veuillez recommencer.');
        }

        // Conversion des champs tableau en JSON avant la fusion
        if (isset($memberData['step2']['interests']) && is_array($memberData['step2']['interests'])) {
            $memberData['step2']['interests'] = json_encode($memberData['step2']['interests']);
        }

        if (isset($memberData['step2']['hear_about_us']) && is_array($memberData['step2']['hear_about_us'])) {
            $memberData['step2']['hear_about_us'] = json_encode($memberData['step2']['hear_about_us']);
        }

        // Fusionner les données des étapes 1 et 2
        $allData = array_merge(
            $memberData['step1'],
            $memberData['step2'],
            [
                'data_consent' => true,
                'values_consent' => true,
                'registration_date' => now(),
                'status' => 'pending_payment',
                'status' => 'payment_received',
                'status' => 'completed',
                'has_paid' => false,
            ]
        );

        // Enregistrement dans la base de données
        $member = Member::create($allData);
        logger($member);
        // Nettoyage de la session
        // Session::forget('member_data');

        // Rediriger vers la page de paiement
        return redirect()->route('members.payment')->with('success', 'Inscription réussie. Veuillez procéder au paiement.');
    }

    // ➤ Page de paiement
    public function showPaymentPage()
    {
        // Vérifier si l'utilisateur a complété les étapes 1 et 2
        if (!Session::has('member_data.step1') || !Session::has('member_data.step2')) {
            return redirect()->route('members.step1')->with('error', 'Veuillez compléter votre inscription avant de procéder au paiement.');
        }

        return view('form.payment');
    }

    // ➤ Traitement du paiement
    public function submitPayment(Request $request)
    { 
        logger('➡️ submitPayment reached');
        logger($request->all());
        
        
        $request->merge([
            'has_paid' => $request->has('has_paid'),
            'fmdd_consent' => $request->has('fmdd_consent'),
        ]);
        
        
        $validated = $request->validate([
            'payment_mode' => 'required',
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'has_paid' => 'required|boolean',
            'fmdd_consent' => 'required|boolean',
        ]);
        logger($validated); 
        
        $paymentProofPath = $request->file('payment_proof')->store('payments/' . now()->format('Y/m'));
        
        
        $member = Member::where('email', Session::get('member_data.step1.email'))->first();
        
       
       
        $member->update([
            'payment_mode' => $validated['payment_mode'],
            'payment_proof_path' => $paymentProofPath,
            'payment_reference' => $request->payment_reference,
            'payment_status' => 'pending',
            'payment_date' => now(),
            'has_paid' => $validated['has_paid'],
            'fmdd_consent' => $validated['fmdd_consent'],
        ]);
    
       
        // Mail::to($member->email)->send(new PaymentConfirmationMail($member));
          
        
        Session::forget('member_data');
        Session::put('member_name', $member->first_name);
    
      
        return redirect()->route('members.success')->with('success', 'Paiement enregistré avec succès!');
    }
    
    
    public function paymentSuccess()
{
    logger('Session Data at Payment Success:');
    logger(Session::all());  // Log the session data
    
    return view('form.success');  // Make sure you have a view named 'form.success'
}
public function showMembersList()
{
    $members = Member::all(); // ou paginate() si tu veux la pagination
    return view('form.members_list', compact('members'));
}
public function show($id)
{
    $member = Member::findOrFail($id); // Assurez-vous d'importer le modèle Member en haut
    return view('form.showdetaille', compact('member'));
}
public function edit($id)
{
    $member = Member::findOrFail($id);
    return view('form.edit', compact('member'));
}


public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'status' => 'required|in:pending_payment,payment_received,completed', // Validation du statut
    ]);

    // Trouver le membre par son ID
    $member = Member::findOrFail($id);

    // Mettre à jour les informations dans la base de données
    $member->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'status' => $request->input('status'),
    ]);

    // Rediriger avec un message de succès
    return redirect()->route('members.list')->with('success', 'Membre mis à jour avec succès!');
}
public function destroy($id)
{
    // Recherche du membre dans la base de données
    // $member = Member::withTrashed()->find($id);
    // $member->delete();  // Suppression douce  qayb9a f base donner ghi tarikh liqaytle3 bli rah t deleta



    $member = Member::find($id);
    $member->forceDelete();  // Suppression totale (hard delete)// maqayb9ax ga3 f base donner 
    
    
    // Redirection avec un message de succès
    return redirect()->route('members.list')->with('success', 'Membre supprimé avec succès!');
    
}
public function index(Request $request)
{
    $query = Member::query();

    if ($search = $request->input('search')) {
        $query->where(function($query) use ($search) {
            $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"])
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%');
        });
    }

    $members = $query->whereNull('deleted_at')->paginate(12);

    return view('form.index', compact('members'));
}









        
}
