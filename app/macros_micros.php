<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class macros_micros extends Model
{
    protected $table = 'macros_micros';
    protected $fillable = [
        'id', 'FechaMacroMicro', 'OP', 'LoteAzucar', 'LoteCarbonato', 'LoteFosfato', 'LoteArroz',
        'LoteHemoglobina', 'LoteNucleo', 'LotePlasma', 'LoteSal', 'LoteOtro', 'LoteAceite', 'MacroAceite',
        'LoteGluten', 'MacroGluten', 'LotePescado', 'MacroPescado', 'LoteLactosuero', 'MacroLactosuero',
        'LoteMaiz', 'MacroMaiz', 'LoteMogolla', 'MacroMogolla', 'LotePalmiste', 'MacroPalmiste',
        'LoteSalvado', 'MacroSalvado', 'LoteSoya', 'MacroSoya', 'created_at', 'updated_at'
    ];
}