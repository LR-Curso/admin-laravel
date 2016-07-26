<?php
/**
 * Created by PhpStorm.
 * User: leandro
 * Date: 15/07/2016
 * Time: 13:58
 */

namespace Lrcurso\Admin\Forms;


use Illuminate\Database\Eloquent\Model;
use Kris\LaravelFormBuilder\Form;

/**
 * Class FormModelAbstract
 * @package Lrcurso\Admin\Forms
 */
abstract class FormModelAbstract
{
    use FormGenerateTrait;

    /**
     * @var string
     */
    protected $form_action = '';

    /**
     * @var string
     */
    protected $method = 'post';

    /**
     * @return Model
     */
    abstract protected function getModel(): Model;

    /**
     * @return Form
     */
    public function getForm(): Form
    {
        return $this->getFormFromModel($this->getModel(), $this->form_action, $this->method);
    }
}