<x-app-layout>
    <div class="contenedor-principal" style="padding: 40px 20px; max-width: 1000px; margin: auto;">
        
        <h1 class="titulo-bienvenida" style="color: #FFE81F; font-size: 2.5rem; text-align: center; margin-bottom: 30px;">
            PANEL DE ADMINISTRACIÓN
        </h1>
        
        <div style="background-color: #1e293b; padding: 30px; border-radius: 12px; border: 1px solid #334155;">
            <h2 style="color: #f8fafc; font-size: 1.5rem; margin-bottom: 20px; border-bottom: 1px solid #334155; padding-bottom: 10px;">
                Gestión de Usuarios Registrados
            </h2>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background-color: #0f172a; color: #94a3b8; font-size: 0.9rem; text-transform: uppercase;">
                            <th style="padding: 15px; border-bottom: 2px solid #334155;">Nombre</th>
                            <th style="padding: 15px; border-bottom: 2px solid #334155;">Email</th>
                            <th style="padding: 15px; border-bottom: 2px solid #334155;">Rol Actual</th>
                            <th style="padding: 15px; border-bottom: 2px solid #334155; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr style="border-bottom: 1px solid #334155; color: #cbd5e1; transition: background 0.2s;" onmouseover="this.style.backgroundColor='#334155'" onmouseout="this.style.backgroundColor='transparent'">
                                <td style="padding: 15px;">{{ $usuario->name }}</td>
                                <td style="padding: 15px;">{{ $usuario->email }}</td>
                                <td style="padding: 15px;">
                                    <span style="padding: 5px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; 
                                        @if($usuario->role === 'admin') background-color: #fef08a; color: #854d0e; 
                                        @elseif($usuario->role === 'monitor') background-color: #bfdbfe; color: #1e40af; 
                                        @else background-color: #e2e8f0; color: #475569; @endif">
                                        {{ strtoupper($usuario->role) }}
                                    </span>
                                </td>
                                <td style="padding: 15px; text-align: center;">
                                    <button style="background-color: #FFE81F; color: #000; padding: 6px 12px; border-radius: 6px; font-weight: bold; font-size: 0.9rem; border: none; cursor: pointer;">
                                        Cambiar Rol
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>