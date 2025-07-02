<x-patient-layout>
    <x-slot name="title">
       
    </x-slot>

    <!-- Controles de accesibilidad -->
    

    <div class="dashboard-container">
        <!-- Header -->
        <div class="header greeting-animation">
            <div class="logo">
                <img src="{{ asset('images/LogoTEA.png') }}" alt="Logo TEA" />
            </div>
            <h1 class="welcome-title" id="greeting">👋 ¡Hola {{ auth()->user()->name }}!</h1>
            <p class="welcome-subtitle">Este es tu espacio para jugar, aprender y compartir cómo te sentís.</p>
        </div>

        <!-- Acciones rápidas -->
        <div class="quick-actions">
            <h3 class="quick-actions-title">🚀 Acciones rápidas</h3>
            <div class="quick-actions-grid">
                <button class="quick-action-btn"><span>🎯</span><span>Mi Progreso</span></button>
                <button class="quick-action-btn"><span>⚙️</span><span>Configuración</span></button>
                <button class="quick-action-btn"><span>🏆</span><span>Mis Logros</span></button>
                <button class="quick-action-btn"><span>❓</span><span>Ayuda</span></button>
            </div>
        </div>

        <!-- Grilla de tarjetas -->
        <div class="cards-grid">
            <!-- Actividades -->
            <div class="card activities-card">
                <span class="card-icon">🎮</span>
                <h4 class="card-title">Mis juegos y actividades</h4>
                <div class="card-content">
                    <div class="activity-counter">{{ $activitiesCount }} actividades</div>
                    <p>¡Tienes nuevas actividades esperándote!</p>
                    <a href="{{ route('patients.activities') }}" class="btn btn-primary">
                        🎯 Ver mis actividades
                    </a>
                </div>
            </div>

            <!-- Estado de ánimo -->
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                    ✅ {{ session('success') }}
                </div>
            @endif
            <div class="card mood-card">
                <h4 class="card-title">😊 ¿Cómo te sentís hoy?</h4>
                <div class="card-content">
                    <!-- MOSTRAR ESTADO ACTUAL SI EXISTE -->
                    @if(auth()->user()->patient && auth()->user()->patient->last_mood)
                        <p><strong>Tu estado actual:</strong> 
                            @switch(auth()->user()->patient->last_mood)
                                @case('feliz') 😄 Feliz @break
                                @case('emocionado') 🤩 Emocionado @break
                                @case('neutral') 😐 Neutral @break
                                @case('ansioso') 😰 Ansioso @break
                                @case('triste') 😢 Triste @break
                            @endswitch
                        </p>
                    @endif
                    <p>¡Elige la carita que mejor represente tu estado de ánimo!</p>
                    <form method="POST" action="{{ route('patient.mood.store') }}" style="margin-top: 20px;">
                        @csrf
                        <div class="mood-buttons">
                            <button name="mood" value="feliz" class="mood-btn happy"
                                title="¡Me siento muy feliz!">😄</button>
                            <button name="mood" value="emocionado" class="mood-btn excited"
                                title="¡Estoy súper emocionado!">🤩</button>
                            <button name="mood" value="neutral" class="mood-btn neutral"
                                title="Me siento normal">😐</button>
                            <button name="mood" value="ansioso" class="mood-btn anxious"
                                title="Me siento ansioso">😰</button>
                            <button name="mood" value="triste" class="mood-btn sad"
                                title="Me siento un poco triste">😢</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Progreso -->
            <div class="card progress-card">
                <h4 class="card-title">📈 Mi progreso</h4>
                <div class="card-content">
                    <p>¡Mira todo lo que has logrado esta semana!</p>
                    <div class="progress-visual">
                        @for($i = 1; $i <= $actividadesProgramadas; $i++)
                            @if($i <= $actividadesCompletadas)
                                <span class="progress-star">⭐</span>
                            @else
                                <span class="progress-star">☆</span>
                            @endif
                        @endfor
                    </div>
                    <p><strong>{{ $actividadesCompletadas }} de {{ $actividadesProgramadas }} actividades completadas</strong></p>
                </div>
            </div>

            <!-- Logros -->
            <div class="card achievements-card">
                <h4 class="card-title">🏆 Mis logros recientes</h4>
                <div class="card-content">
                    <p>¡Felicitaciones por estos increíbles logros!</p>
                    <div class="achievements-grid">
                        @foreach($logros as $index => $logro)
                            @if($logro['desbloqueado'])
                                <button class="achievement-badge unlocked" 
                                    title="{{ $logro['title'] }}"
                                    data-modal-id="modalLogro{{ $index }}">
                                    {{ $logro['emoji'] }}
                                </button>
                            @else
                                <div class="achievement-badge locked" 
                                    title="{{ $logro['title'] }}">
                                    {{ $logro['emoji'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Modals -->
            @foreach($logros as $index => $logro)
                @if($logro['desbloqueado'])
                    <div id="modalLogro{{ $index }}" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $logro['emoji'] }} {{ $logro['title'] }}</h5>
                                    <button type="button" class="btn-close" data-close="modalLogro{{ $index }}">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>🎉 ¡Felicitaciones! Has desbloqueado este logro.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-close="modalLogro{{ $index }}">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Logout -->
            
        </div> 
        <div class="logout-container">
                <form method="POST" action="{{ route('patient.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-4">Cerrar sesión</button>
                </form>
        </div>

</x-patient-layout>
