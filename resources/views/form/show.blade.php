@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">
        <span class="badge bg-primary p-3 rounded-pill shadow">
            <i class="fas fa-user-circle me-2"></i>Détails du membre
        </span>
    </h2>

    <div class="card border-0 shadow-lg">
        <div class="card-header bg-gradient-primary text-white">
            <h4 class="mb-0">
                <i class="fas fa-id-card me-2"></i>Profil de {{ $member->name }}
            </h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-item mb-4 p-3 bg-light rounded">
                        <h5 class="text-secondary"><i class="fas fa-signature me-2"></i>Nom complet</h5>
                        <p class="h4 text-dark">{{ $member->name }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-item mb-4 p-3 bg-light rounded">
                        <h5 class="text-secondary"><i class="fas fa-envelope me-2"></i>Email</h5>
                        <p class="h4 text-dark">{{ $member->email }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="info-item mb-4 p-3 rounded 
                        @if($member->status == 'pending_payment') bg-warning-light @elseif($member->status == 'payment_received') bg-success-light @else bg-info-light @endif">
                        <h5 class="text-secondary"><i class="fas fa-user-shield me-2"></i>Statut</h5>
                        <p class="h4 
                            @if($member->status == 'pending_payment') text-warning 
                            @elseif($member->status == 'payment_received') text-success 
                            @else text-info @endif">
                            {{ ucfirst(str_replace('_', ' ', $member->status)) }}
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-item mb-4 p-3 bg-light rounded">
                        <h5 class="text-secondary"><i class="far fa-calendar-alt me-2"></i>Date d'inscription</h5>
                        <p class="h4 text-dark">{{ $member->created_at->format('d/m/Y') }}</p>
                        <small class="text-muted">
                            @if($member->created_at->diffInDays(now()) < 30)
                                <span class="badge bg-warning text-dark animate-pulse">
                                    <i class="fas fa-bolt me-1"></i>Nouveau membre!
                                </span>
                            @else
                                Membre depuis {{ $member->created_at->diffForHumans() }}
                            @endif
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
            <a href="{{ route('members.list') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Retour à la liste
            </a>

            <div class="actions">
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Modifier
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-warning-light {
        background-color: rgba(255, 193, 7, 0.1);
        border-left: 4px solid #ffc107;
    }

    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1);
        border-left: 4px solid #28a745;
    }

    .bg-info-light {
        background-color: rgba(23, 162, 184, 0.1);
        border-left: 4px solid #17a2b8;
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
</style>
@endsection
