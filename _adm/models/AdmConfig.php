<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csdm_adm_config".
 *
 * @property integer $id
 * @property integer $funcao_mail_smtp
 * @property string $default_email
 * @property string $email_smtp
 * @property string $servidor_smtp
 * @property integer $porta
 * @property integer $requer_autenticacao
 * @property integer $ativar_cron
 * @property string $url_cron
 * @property integer $exec_segundos
 * @property integer $manutencao_site
 * @property integer $exbir_previa_tempo_horas
 */
class AdmConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_adm_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['funcao_mail_smtp', 'default_email', 'email_smtp', 'servidor_smtp', 'porta', 'requer_autenticacao', 'ativar_cron', 'url_cron', 'exec_segundos', 'manutencao_site'], 'required'],
            [['funcao_mail_smtp', 'porta', 'requer_autenticacao', 'ativar_cron', 'exec_segundos', 'manutencao_site', 'exbir_previa_tempo_horas'], 'integer'],
            [['default_email', 'email_smtp'], 'string', 'max' => 100],
            [['servidor_smtp', 'url_cron'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'funcao_mail_smtp' => 'Funcao Mail Smtp',
            'default_email' => 'Default Email',
            'email_smtp' => 'Email Smtp',
            'servidor_smtp' => 'Servidor Smtp',
            'porta' => 'Porta',
            'requer_autenticacao' => 'Requer Autenticacao',
            'ativar_cron' => 'Ativar Cron',
            'url_cron' => 'Url Cron',
            'exec_segundos' => 'Exec Segundos',
            'manutencao_site' => 'Manutencao Site',
            'exbir_previa_tempo_horas' => 'Exbir Previa Tempo Horas',
        ];
    }
}
