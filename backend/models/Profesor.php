<?php

namespace backend\models;
use Yii;
use common\models\User;
use yii\base\Security;
use yii\validators\EmailValidator;

/**
 * This is the model class for table "profesores".
 *
 * @property string $PROFESOR
 * @property string $CEDULA
 * @property string|null $NOMBRES
 * @property string|null $DESCRIPCION
 * @property string|null $DIRECCION
 * @property string|null $TELEFONO
 * @property string|null $FECHA_NACIMIENTO
 * @property resource|null $FOTO
 * @property string|null $CORREO
 * @property string|null $CLAVE
 * @property resource|null $HOJAVIDA
 * @property string|null $AREA
 * @property string $ESTADO
 *
 * @property Materiasxcurso[] $materiasxcursos
 */
class Profesor extends \yii\db\ActiveRecord
{
    public $archivo;
    public $documento;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profesores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROFESOR'], 'safe'],
            [['CEDULA'], 'required', 'message' => 'Debe ingresar el numero de cedula'],
            [['FECHA_NACIMIENTO'], 'safe'],
            [['FOTO', 'HOJAVIDA'], 'string'],
            [['archivo'], 'file', 'extensions'=>'jpg, png'],
            [['documento'], 'file', 'extensions'=>'pdf'],
            [['PROFESOR', 'NOMBRES', 'DIRECCION', 'TELEFONO', 'AREA'], 'string', 'max' => 45],
            [['NOMBRES'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
            [['CEDULA'], 'string', 'max' => 25],
            [['DESCRIPCION'], 'string', 'max' => 205],
           // [['CORREO'], 'string', 'max' => 200],
            [['CORREO'], 'email', 'message' => '{value} no es un correo electrónico válido.'],
            [['CLAVE'], 'string', 'max' => 50],
            // [['CORREO'], 'autocompleteOff'],
            [['ESTADO'], 'string', 'max' => 10],
            [['CEDULA'], 'unique','message' => 'El numero de cédula {value} ya esta registrada en el sistema.'],
            [['PROFESOR'], 'unique','message' => 'Esta ID del profesor ya esta registrada en el sistema.'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROFESOR' => 'Profesor',
            'CEDULA' => 'Cédula',
            'NOMBRES' => 'Nombres y Apellidos',
            'DESCRIPCION' => 'Descripción',
            'DIRECCION' => 'Dirección',
            'TELEFONO' => 'Teléfono',
            'FECHA_NACIMIENTO' => 'Fecha de Nacimiento',
            'archivo' => 'Foto',
            'CORREO' => 'Correo',
            'CLAVE' => 'Clave',
            'documento' => 'Hoja de vida',
            'AREA' => 'Área',
            'ESTADO' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Materiasxcursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateriasxcursos()
    {
        return $this->hasMany(Materiasxcurso::class, ['PROFESOR' => 'PROFESOR']);
    }

    public function beforeSave($insert)
    {
  
if ($this->isNewRecord) {
    $count = Profesor::find()->where(['like', 'PROFESOR', 'PROF-'])->count();
    if ($count > 0) {
        // Si el valor generado ya existe, agregar un sufijo numérico al final del valor
        $this->PROFESOR .= 'PROF-0' . ($count + 1);
    } else {
        // Si el valor generado no existe, utilizar el valor generado por defecto
        $this->PROFESOR = 'PROF-' . ($count + 1);
    }}
//
 // Llamada al método beforeSaveCustom
        $this->beforeSaveCustom($insert);
        return parent::beforeSave($insert);
    }

    //Para evitar el auto completado del navegador
    public function autocompleteOff($attribute, $params)
{
    $this->$attribute->getInputId(false); // Garantizar que se establezca la propiedad 'id' del campo
    $this->$attribute->options['autocomplete'] = 'off';
}
//para eliminar fotos y pdf de profesor

public function beforeDelete()
{
    if (parent::beforeDelete()) {
        if (file_exists($this->FOTO)) {
            unlink($this->FOTO);
        }
        if (file_exists($this->HOJAVIDA)) {
            unlink($this->HOJAVIDA);
        }
        return true;
    } else {
        return false;
    }
}

//Enviar usuario y contraseña
public function beforeSaveCustom($insert)
{
    $security = new Security();
    if (parent::beforeSave($insert)) {
        if ($this->isNewRecord) {
            $user = new User();
            $user->email = $this->CORREO;
            $user->username = $this->CEDULA;
            $user->password_hash = $security->generatePasswordHash($this->CLAVE);
            $user->status = User::STATUS_ACTIVE;
            $user->auth_key = $security->generateRandomKey();
            $user->verification_token =$security->generateRandomKey() . '_' . time(); 
            $user->save();
        } else {
            $user = $this->user;
            if ($user !== null) {
                $user->password_hash = $security->generatePasswordHash($this->CLAVE);
                $user->save();
            }
        }
        return true;
    }
    return false;
  }

  //traer el id
//   public function getUser()
// {
//     return $this->hasOne(User::class, ['username' => 'CEDULA']);
// }

//   //Actualizar y eliminar usuarios del profesor
//   public function updateUserLogin($CEDULA, $CLAVE)
//     {
//         //buscar el id
//         $usern=User::findByUsername($CEDULA);
//         if ($usern) {
//             $userId = $usern->id;
//         $user = User::findOne(['id' => $this->user_Id]);
//         $user->username = $CEDULA;
//         $user->setPassword($CLAVE);
//         $user->generateAuthKey();
//         return $user->save();
//     }
//         return false;
//     }
}
