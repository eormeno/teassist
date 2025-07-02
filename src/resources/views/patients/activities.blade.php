<x-patient-layout>
    <x-slot name="title">Mis Actividades</x-slot>

    <div style="max-width: 900px; margin: 0 auto; padding: 20px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 3px solid #81C784;">
        
        <!-- Botón Volver al Dashboard arriba -->
        <div style="margin-bottom: 20px; text-align: right;">
            <a href="{{ route('patient.dashboard') }}" 
               style="background: linear-gradient(135deg, #4CAF50, #66BB6A); color: white; padding: 12px 25px; border-radius: 15px; font-weight: 700; text-decoration: none; box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3); transition: background 0.3s ease;">
                ← Volver al Dashboard
            </a>
        </div>

        <!-- AGREGAR MENSAJE DE ÉXITO -->
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                ✅ {{ session('success') }}
            </div>
        @endif

        <h2 style="font-size: 28px; font-weight: 700; color: #2E7D32; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
            🎮 Mis actividades asignadas
        </h2>

        @if ($activities->isEmpty())
            <p style="color: #666666; font-size: 16px; text-align: center; padding: 40px 0;">
                No tenés actividades asignadas por tu terapeuta aún.
            </p>
        @else
            <div style="overflow-x:auto;">
                <table style="width: 100%; border-collapse: separate; border-spacing: 0 8px;">
                    <thead>
                        <tr style="background: #e3f2fd; text-align: left; font-weight: 600; color: #2E7D32;">
                            <th style="padding: 12px 16px; border-top-left-radius: 12px;">Completada</th>
                            <th style="padding: 12px 16px;">Nombre</th>
                            <th style="padding: 12px 16px;">Descripción</th>
                            <th style="padding: 12px 16px; text-align: center; border-top-right-radius: 12px;">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr style="background: {{ $activity->active ? '#e8f5e8' : 'white' }}; box-shadow: 0 3px 6px rgba(0,0,0,0.1); border-radius: 12px; transition: background 0.3s ease; cursor: default;">
                                <td style="padding: 12px 16px; text-align: center;">
                                    <form method="POST" action="{{ route('patient.activity.toggle', $activity->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="checkbox" 
                                               onchange="this.form.submit()" 
                                               {{ $activity->active ? 'checked' : '' }}
                                               style="transform: scale(1.5); cursor: pointer;">
                                    </form>
                                </td>
                                <td style="padding: 12px 16px; vertical-align: middle; color: #388E3C; font-weight: 600;">{{ $activity->activity->name }}</td>
                                <td style="padding: 12px 16px; color: #4CAF50; font-size: 15px;">{{ $activity->activity->description }}</td>
                                <td style="padding: 12px 16px; text-align: center; color: #2E7D32; font-weight: 700; vertical-align: middle;">
                                    {{ \Carbon\Carbon::parse($activity->activity_date)->format('d/m/Y') }}
                                    <br>
                                    <span style="font-size: 13px; color: #81C784;">
                                        {{ \Carbon\Carbon::parse($activity->activity_date)->diffForHumans() }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Botón Volver al Dashboard abajo -->
        <div style="margin-top: 30px; text-align: center;">
            <a href="{{ route('patient.dashboard') }}" 
               style="background: linear-gradient(135deg, #4CAF50, #66BB6A); color: white; padding: 12px 25px; border-radius: 15px; font-weight: 700; text-decoration: none; box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3); transition: background 0.3s ease;">
                ← Volver al Dashboard
            </a>
        </div>
    </div>
</x-patient-layout>
