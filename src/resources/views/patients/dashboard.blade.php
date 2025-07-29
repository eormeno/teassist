<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg text-black dark:text-white">

                    <!-- Actividades Asignadas -->
                <div class="card assigned-activities-card">
                    <h2 class="card-title">🎯 Actividades asignadas</h2>
                    <div class="card-content">
                        @if($assignedActivities->isEmpty())
                            <p>No tenés actividades asignadas por ahora.</p>
                        @else
                            <ul class="assigned-activities-list">
                                @foreach($assignedActivities as $activity)
                                    <li class="assigned-activity-item">
                                        <div class="activity-info">
                                            <strong>{{ $activity->name->title ?? 'Actividad:' }}</strong>
                                            <p>{{ $activity->description }}</p>
                                        </div>

                                        @php
                                            $isCompletedToday = $activity->completed_at && \Illuminate\Support\Carbon::parse($activity->completed_at)->isToday();
                                        @endphp

                                        @if($isCompletedToday)
                                            <div>
                                            <span class="text-white">✅ Completada hoy</span>
                                            </div>
                                        @else
                                            <form action="{{ route('patient.activity.markAsCompleted', $activity->id) }}" method="POST">
                                                @csrf
                                                <div class="border-solid border-width-1px border"><button type="submit" class="btn btn-success small borde-color-white">Marcar como realizada</button>
                                                </div>
                                            </form>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                    <!-- Como te sientes hoy? -->
                <div class="card last-mood-card">
                    <h2 class="card-title">😄 ¿Cómo te sientes hoy? 😐</h2>
                    <div class="card-content">
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

                        <p>Elige cómo te sentís tocando una carita:</p>

                        <form method="POST" action="{{ route('patient.mood.store') }}" style="margin-top: 20px;">
                            @csrf
                            <div class="mood-buttons">
                                <button name="mood" value="feliz" class="mood-btn happy" title="¡Me siento muy feliz!">😄</button>
                                <button name="mood" value="emocionado" class="mood-btn excited" title="¡Estoy súper emocionado!">🤩</button>
                                <button name="mood" value="neutral" class="mood-btn neutral" title="Me siento normal">😐</button>
                                <button name="mood" value="ansioso" class="mood-btn anxious" title="Me siento ansioso">😰</button>
                                <button name="mood" value="triste" class="mood-btn sad" title="Me siento un poco triste">😢</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

