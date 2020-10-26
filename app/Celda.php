<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $celda
 * @property string $dia
 * @property string $estado
 * @property boolean $enServicio
 * @property boolean $enProduccion
 * @property float $voltaje
 * @property float $corriente
 * @property float $corrienteR
 * @property float $corrienteL
 * @property float $resistencia
 * @property float $potencia
 * @property float $dsr
 * @property float $energiaEA
 * @property integer $numeroEA
 * @property float $vMaxEA
 * @property float $duracionEA
 * @property float $acidez
 * @property float $acidezMed
 * @property float $ca
 * @property float $caMed
 * @property integer $temperatura
 * @property integer $temperaturaMed
 * @property float $nivelDeBanio
 * @property float $nivelDeBanioMed
 * @property float $nivelDeMetal
 * @property float $nivelDeMetalMed
 * @property float $nivelDeMetalEst
 * @property float $vRef
 * @property float $iRef
 * @property float $rRef
 * @property float $vRef02
 * @property float $rRef02
 * @property float $cantAlumina
 * @property int $golpesAlumina
 * @property int $golpes48
 * @property int $golpesOS
 * @property float $golpeUso
 * @property float $golpeCalc
 * @property float $golpeRef
 * @property float $alim
 * @property float $lodo
 * @property float $duracionTk
 * @property integer $numeroTk
 * @property float $pesoGolpeFl
 * @property float $manualFl
 * @property float $automFl
 * @property float $totalFl
 * @property integer $numGolpesFl
 * @property int $progFl
 * @property integer $edad
 * @property integer $edadR
 * @property integer $sumMovMotor1Man
 * @property integer $sumMovMotor2Man
 * @property integer $numMovMotor1Man
 * @property integer $numMovMotor2Man
 * @property integer $sumMovMotor1Auto
 * @property integer $sumMovMotor2Auto
 * @property integer $numMovMotor1Auto
 * @property integer $numMovMotor2Auto
 * @property float $movPuenteTrasegado
 * @property int $segInestabilidad
 * @property integer $metal_rcol
 * @property integer $metal_rgrua
 * @property integer $metal_prog
 * @property float $eficc_rcol
 * @property float $eficc_rgrua
 * @property float $eficc_prog
 * @property float $si
 * @property float $siMed
 * @property float $fe
 * @property float $feMed
 * @property float $al
 * @property float $alMed
 * @property integer $anodosN
 * @property integer $anodosDC
 * @property integer $anodosQ
 * @property integer $anodosR
 * @property integer $anodosE
 * @property int $criolita
 * @property int $mdc
 * @property int $desnate
 * @property int $bano
 * @property int $banoF
 * @property int $sodio
 * @property int $calcio
 * @property float $kwh
 * @property boolean $cascoRojo
 * @property boolean $statusRearr
 */
class Celda extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'diariocelda';

    /**
     * @var array
     */
    protected $fillable = ['estado', 'enServicio', 'enProduccion', 'voltaje', 'corriente', 'corrienteR', 'corrienteL', 'resistencia', 'potencia', 'dsr', 'energiaEA', 'numeroEA', 'vMaxEA', 'duracionEA', 'acidez', 'acidezMed', 'ca', 'caMed', 'temperatura', 'temperaturaMed', 'nivelDeBanio', 'nivelDeBanioMed', 'nivelDeMetal', 'nivelDeMetalMed', 'nivelDeMetalEst', 'vRef', 'iRef', 'rRef', 'vRef02', 'rRef02', 'cantAlumina', 'golpesAlumina', 'golpes48', 'golpesOS', 'golpeUso', 'golpeCalc', 'golpeRef', 'alim', 'lodo', 'duracionTk', 'numeroTk', 'pesoGolpeFl', 'manualFl', 'automFl', 'totalFl', 'numGolpesFl', 'progFl', 'edad', 'edadR', 'sumMovMotor1Man', 'sumMovMotor2Man', 'numMovMotor1Man', 'numMovMotor2Man', 'sumMovMotor1Auto', 'sumMovMotor2Auto', 'numMovMotor1Auto', 'numMovMotor2Auto', 'movPuenteTrasegado', 'segInestabilidad', 'metal_rcol', 'metal_rgrua', 'metal_prog', 'eficc_rcol', 'eficc_rgrua', 'eficc_prog', 'si', 'siMed', 'fe', 'feMed', 'al', 'alMed', 'anodosN', 'anodosDC', 'anodosQ', 'anodosR', 'anodosE', 'criolita', 'mdc', 'desnate', 'bano', 'banoF', 'sodio', 'calcio', 'kwh', 'cascoRojo', 'statusRearr'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'reduccionl5';

}
