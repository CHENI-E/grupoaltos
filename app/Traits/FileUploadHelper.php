<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadHelper
{
    protected function guardarArchivo($archivo, $ruta, $prefijo = '')
    {
        // 📌 Si la ruta no existe, crearla
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }
        $nombreArchivo = $prefijo . uniqid() . '.' . $archivo->getClientOriginalExtension();
        $archivo->move($ruta, $nombreArchivo);
        return $nombreArchivo;
    }

    protected function procesarImagenesDetalle(Request $request, string $uploadPath, $item = null): array
    {
        $imagenes = [];

        $campos = [
            'imagen_detalle_one' => ['indice' => 'one', 'atributo' => 'imagen_one'],
            'imagen_detalle_two' => ['indice' => 'two', 'atributo' => 'imagen_two'],
            'imagen_detalle_tree' => ['indice' => 'tree', 'atributo' => 'imagen_three'],
            'imagen_detalle_four' => ['indice' => 'four', 'atributo' => 'imagen_four'],
        ];

        foreach ($campos as $campo => $info) {
            if ($request->hasFile($campo)) {
                if ($item) {
                    $atributo = $info['atributo'];
                    // 📌 Determinar base real según PRODUCTION
                    if (env('PRODUCTION') == 1) {
                        $baseDeletePath = base_path('../public_html/');
                    } else {
                        $baseDeletePath = public_path();
                    }

                    if ($item->$atributo && file_exists($baseDeletePath . '/' . $item->$atributo)) {
                        unlink($baseDeletePath . '/' . $item->$atributo);
                    }
                    /* if ($item->$atributo && file_exists(public_path($item->$atributo))) {
                        unlink(public_path($item->$atributo));
                    } */
                }

                $archivo = $request->file($campo);
                $nombre = $this->guardarArchivo($archivo, $uploadPath, 'detalle_');
                $imagenes[$info['indice']] = 'uploads/items/' . $nombre;
            }
        }

        return $imagenes;
    }

    protected function procesarImagenesDetalleBlog(Request $request, string $uploadPath, $item = null): array
    {
        $imagenes = [];

        $campos = [
            'imagen_detalle_one' => ['indice' => 'one', 'atributo' => 'imagen_one'],
            'imagen_detalle_two' => ['indice' => 'two', 'atributo' => 'imagen_two'],
            'imagen_detalle_tree' => ['indice' => 'tree', 'atributo' => 'imagen_three'],
            'imagen_detalle_four' => ['indice' => 'four', 'atributo' => 'imagen_four'],
        ];

        foreach ($campos as $campo => $info) {
            if ($request->hasFile($campo)) {
                if ($item) {
                    $atributo = $info['atributo'];
                    // 📌 Determinar base real según PRODUCTION
                    if (env('PRODUCTION') == 1) {
                        $baseDeletePath = base_path('../public_html/');
                    } else {
                        $baseDeletePath = public_path();
                    }

                    if ($item->$atributo && file_exists($baseDeletePath . '/' . $item->$atributo)) {
                        unlink($baseDeletePath . '/' . $item->$atributo);
                    }
                    /* if ($item->$atributo && file_exists(public_path($item->$atributo))) {
                        unlink(public_path($item->$atributo));
                    } */
                }

                $archivo = $request->file($campo);
                $nombre = $this->guardarArchivo($archivo, $uploadPath, 'detalle_');
                $imagenes[$info['indice']] = 'uploads/blog/' . $nombre;
            }
        }

        return $imagenes;
    }

}
