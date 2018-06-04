<?php


use Illuminate\Database\Seeder;
use sisOdonto\Prestacion;

class PrestacionesSeeder extends Seeder
{
    public function run()
    {
        $data = [
        	['nombre'=>'DIENTE INTACTO', 'tiempo'=>'00:30:00', 'codigo'=>'1'],
        	['nombre'=>'DIENTE AUSENTE', 'tiempo'=>'00:30:00', 'codigo'=>'2'],
        	['nombre'=>'REMANENTE RADICULAR', 'tiempo'=>'00:30:00', 'codigo'=>'3'],
        	['nombre'=>'EXTRUSION', 'tiempo'=>'00:30:00', 'codigo'=>'4'],
        	['nombre'=>'INTRUSION', 'tiempo'=>'00:30:00', 'codigo'=>'5'],
        	['nombre'=>'GIROVERSION', 'tiempo'=>'00:30:00', 'codigo'=>'6'],
        	['nombre'=>'MIGRACION', 'tiempo'=>'00:30:00', 'codigo'=>'7'],
        	['nombre'=>'MICRODONCIA', 'tiempo'=>'00:30:00', 'codigo'=>'8'],
        	['nombre'=>'MACRODONCIA', 'tiempo'=>'00:30:00', 'codigo'=>'9'],
        	['nombre'=>'ECTOPICO', 'tiempo'=>'00:30:00', 'codigo'=>'10'],
        	['nombre'=>'TRANSPOSICION', 'tiempo'=>'00:30:00', 'codigo'=>'11'],
        	['nombre'=>'CLAVIJA', 'tiempo'=>'00:30:00', 'codigo'=>'12'],
        	['nombre'=>'FRACTURA', 'tiempo'=>'00:30:00', 'codigo'=>'13'],
        	['nombre'=>'DIENTE DISCROMICO', 'tiempo'=>'00:30:00', 'codigo'=>'14'],
        	['nombre'=>'GEMINACION', 'tiempo'=>'00:30:00', 'codigo'=>'15'],
        	['nombre'=>'CARIES', 'tiempo'=>'00:30:00', 'codigo'=>'16'],
            ['nombre'=>'OBTURACION TEMPORAL', 'tiempo'=>'00:30:00', 'codigo'=>'17'],
            ['nombre'=>'AMALGAMA', 'tiempo'=>'00:30:00', 'codigo'=>'18'],
            ['nombre'=>'RESINA', 'tiempo'=>'00:30:00', 'codigo'=>'19'],
            ['nombre'=>'INCRUSTACION', 'tiempo'=>'00:30:00', 'codigo'=>'20'],
            ['nombre'=>'ENDODONCIA', 'tiempo'=>'00:30:00', 'codigo'=>'21'],
            ['nombre'=>'DESGASTADO', 'tiempo'=>'00:30:00', 'codigo'=>'22'],
            ['nombre'=>'DIASTEMA', 'tiempo'=>'00:30:00', 'codigo'=>'23'],
            ['nombre'=>'MOVILIDAD', 'tiempo'=>'00:30:00', 'codigo'=>'24'],
            ['nombre'=>'CORONA TEMPORAL', 'tiempo'=>'00:30:00', 'codigo'=>'25'],
            ['nombre'=>'CORONA COMPLETA', 'tiempo'=>'00:30:00', 'codigo'=>'26'],
            ['nombre'=>'CORONA VEENER', 'tiempo'=>'00:30:00', 'codigo'=>'27'],
            ['nombre'=>'CORONA FEXESTRADA', 'tiempo'=>'00:30:00', 'codigo'=>'28'],
            ['nombre'=>'CORONA TRES CUARTOS', 'tiempo'=>'00:30:00', 'codigo'=>'29'],
            ['nombre'=>'CORONA PORCELANA', 'tiempo'=>'00:30:00', 'codigo'=>'30'],
            ['nombre'=>'PROTESIS FIJA ', 'tiempo'=>'00:30:00', 'codigo'=>'31'],
            ['nombre'=>'PROTESIS REMOVIBLE', 'tiempo'=>'00:30:00', 'codigo'=>'32'],
            ['nombre'=>'ODONTULO TOTAL', 'tiempo'=>'00:30:00', 'codigo'=>'33'],
            ['nombre'=>'APARATO. ORT. FIJO', 'tiempo'=>'00:30:00', 'codigo'=>'34'],
            ['nombre'=>'APARATO. ORT. REMOV.', 'tiempo'=>'00:30:00', 'codigo'=>'35'],
            ['nombre'=>'IMPLANTE', 'tiempo'=>'00:30:00', 'codigo'=>'36'],
            ['nombre'=>'SUPERNUMERARIO', 'tiempo'=>'00:30:00', 'codigo'=>'37'],
            ['nombre'=>'DIENTE POR EXTRAER', 'tiempo'=>'00:30:00', 'codigo'=>'38'],
    
    
        	
        ];
        foreach ($data as $key => $value) {
        	Prestacion::create($value);
        }
    }
}