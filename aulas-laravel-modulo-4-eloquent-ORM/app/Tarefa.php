<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
//    protected $table = 'outro_nome'; - se for outro nome
//    protected $primaryKey = 'tabela_id' - se for diferente de id
//    public $incrementing = false - Se a chave primária não for auto_increment
//    protected $keyType = 'string' - Se a chave primária não for int

// created_at, update_at - Eloquent preve a existencia desses campos
// Não vai ter gerenciamento de tempo
    public $timestamps = false;

//    const CREATE_AT = 'outro_nome'; - Se tiver com outro nome
//    const UPDATE_AT = 'outro_nome'; - Se tiver com outro nome

//Campos permitidos que sejam preenchidos em massa

    protected $fillable = [
        'titulo', 'resolvido'
    ];


}
