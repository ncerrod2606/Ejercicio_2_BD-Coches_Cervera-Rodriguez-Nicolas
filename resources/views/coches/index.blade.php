<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Vehículos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            padding: 40px 0;
        }

        .container {
            max-width: 1200px;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }

        .header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 600;
            color: #212529;
        }

        .header p {
            margin: 8px 0 0 0;
            color: #6c757d;
            font-size: 1rem;
        }

        .card {
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            border-radius: 8px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 20px 30px;
            font-weight: 600;
            color: #495057;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            color: #495057;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 16px 20px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            color: #212529;
        }

        .table tbody tr {
            border-bottom: 1px solid #f1f3f5;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge-id {
            background-color: #e9ecef;
            color: #495057;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .badge-year {
            background-color: #0d6efd;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .color-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .color-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid #dee2e6;
            display: inline-block;
        }

        .price {
            color: #198754;
            font-weight: 600;
            font-size: 1.05rem;
        }

        .card-footer {
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            padding: 16px 30px;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }

        .empty-state p {
            color: #6c757d;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 0;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .table {
                font-size: 0.875rem;
            }

            .table thead th,
            .table tbody td {
                padding: 12px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Catálogo de Vehículos</h1>
            <p>Listado completo de vehículos disponibles</p>
        </div>

        <!-- Table Card -->
        <div class="card">
            <div class="card-header">
                <i class="bi bi-list-ul"></i> Inventario completo
            </div>
            
            @if($coches->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Color</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coches as $coche)
                                <tr>
                                    <td>
                                        <span class="badge-id">{{ $coche->id }}</span>
                                    </td>
                                    <td><strong>{{ $coche->marca }}</strong></td>
                                    <td>{{ $coche->modelo }}</td>
                                    <td>
                                        <span class="badge-year">{{ $coche->year }}</span>
                                    </td>
                                    <td>
                                        <div class="color-indicator">
                                            <span class="color-dot" style="background-color: {{ 
                                                strtolower($coche->color) == 'blanco' ? '#ffffff' : 
                                                (strtolower($coche->color) == 'negro' ? '#000000' : 
                                                (strtolower($coche->color) == 'gris' ? '#6c757d' : 
                                                (strtolower($coche->color) == 'plata' ? '#adb5bd' : 
                                                (strtolower($coche->color) == 'rojo' ? '#dc3545' : 
                                                (strtolower($coche->color) == 'azul' ? '#0d6efd' : 
                                                (strtolower($coche->color) == 'verde' ? '#198754' : 
                                                (strtolower($coche->color) == 'amarillo' ? '#ffc107' : '#6c757d'))))))) 
                                            }}"></span>
                                            <span>{{ $coche->color }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="price">{{ number_format($coche->precio, 2, ',', '.') }} €</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer">
                    Total de vehículos: <strong>{{ $coches->count() }}</strong>
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <p>No hay vehículos registrados</p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>