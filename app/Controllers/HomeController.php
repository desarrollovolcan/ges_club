<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $modules = [
            [
                'title' => 'Gestión de Socios y Deportistas',
                'description' => 'Registro y seguimiento de socios, jugadores y apoderados.',
                'icon' => 'users',
                'color' => 'primary',
                'items' => [
                    'Registro de socios, jugadores y apoderados.',
                    'RUT, datos de contacto y ficha médica.',
                    'Estados: activo, suspendido, moroso, retirado.',
                    'Categorías (infantil, juvenil, adulto, honorario).',
                    'Historial de pagos y participación deportiva.',
                ],
            ],
            [
                'title' => 'Gestión Deportiva',
                'description' => 'Control de equipos, entrenamientos y rendimiento deportivo.',
                'icon' => 'activity',
                'color' => 'success',
                'items' => [
                    'Equipos, categorías y ramas deportivas.',
                    'Entrenadores y cuerpo técnico.',
                    'Planificación de entrenamientos.',
                    'Asistencia a entrenamientos y partidos.',
                    'Estadísticas deportivas básicas.',
                ],
            ],
            [
                'title' => 'Competiciones y Calendario',
                'description' => 'Organiza torneos, canchas, horarios y resultados.',
                'icon' => 'calendar',
                'color' => 'info',
                'items' => [
                    'Torneos internos y externos.',
                    'Programación de partidos.',
                    'Canchas y horarios.',
                    'Resultados y tablas de posiciones.',
                    'Convocatorias automáticas.',
                ],
            ],
            [
                'title' => 'Finanzas y Tesorería',
                'description' => 'Control de ingresos, egresos y morosidad del club.',
                'icon' => 'credit-card',
                'color' => 'warning',
                'items' => [
                    'Cuotas sociales y mensualidades.',
                    'Pagos en línea (WebPay, transferencia, efectivo).',
                    'Control de morosidad.',
                    'Ingresos y egresos.',
                    'Presupuestos por rama o categoría.',
                    'Reportes financieros.',
                ],
            ],
            [
                'title' => 'Facturación y Cumplimiento SII',
                'description' => 'Emisión de documentos tributarios y control fiscal.',
                'icon' => 'file-text',
                'color' => 'danger',
                'items' => [
                    'Emisión de boletas y facturas electrónicas.',
                    'Integración con el SII.',
                    'Libros de ventas y compras.',
                    'Control tributario del club.',
                ],
            ],
            [
                'title' => 'Contratos y Recursos Humanos',
                'description' => 'Gestión de contratos, honorarios y normativa laboral.',
                'icon' => 'briefcase',
                'color' => 'secondary',
                'items' => [
                    'Contratos de entrenadores y personal.',
                    'Honorarios vs contratos laborales.',
                    'Pagos y liquidaciones.',
                    'Control de vigencia contractual.',
                    'Cumplimiento de normativa laboral chilena.',
                ],
            ],
            [
                'title' => 'Comunicaciones y Notificaciones',
                'description' => 'Mensajería automática y avisos para la comunidad.',
                'icon' => 'message-square',
                'color' => 'primary',
                'items' => [
                    'Envío de correos y mensajes (WhatsApp/SMS).',
                    'Notificaciones de pagos vencidos.',
                    'Avisos de entrenamientos y partidos.',
                    'Comunicaciones a apoderados.',
                ],
            ],
            [
                'title' => 'Gestión de Infraestructura',
                'description' => 'Control de canchas, recintos y uso por categoría.',
                'icon' => 'map',
                'color' => 'success',
                'items' => [
                    'Canchas y recintos.',
                    'Horarios y reservas.',
                    'Mantenimiento.',
                    'Control de uso por categoría.',
                ],
            ],
            [
                'title' => 'Documentos y Cumplimiento Legal',
                'description' => 'Repositorio documental y cumplimiento normativo.',
                'icon' => 'folder',
                'color' => 'info',
                'items' => [
                    'Estatutos del club.',
                    'Certificados médicos.',
                    'Autorizaciones de apoderados.',
                    'Documentación exigida por asociaciones o federaciones.',
                    'Cumplimiento Ley 19.628 (protección de datos personales).',
                ],
            ],
            [
                'title' => 'Reportes y Estadísticas',
                'description' => 'Indicadores clave para la gestión del club.',
                'icon' => 'bar-chart-2',
                'color' => 'warning',
                'items' => [
                    'Reportes financieros.',
                    'Asistencia y participación.',
                    'Morosidad.',
                    'Rendimiento deportivo.',
                    'Indicadores de gestión del club.',
                ],
            ],
            [
                'title' => 'Seguridad y Control de Accesos',
                'description' => 'Roles, permisos y trazabilidad de acciones.',
                'icon' => 'shield',
                'color' => 'danger',
                'items' => [
                    'Roles (administrador, tesorero, entrenador, socio).',
                    'Permisos por módulo.',
                    'Registro de actividad.',
                    'Respaldo de información.',
                ],
            ],
        ];

        $this->view('home/index', [
            'title' => 'Panel principal',
            'subtitle' => 'Sistema integral para la administración de clubes deportivos en Chile.',
            'modules' => $modules,
        ]);
    }
}
