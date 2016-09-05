<?php
namespace Lrcurso\Admin\Forms;


use Illuminate\Database\Eloquent\Model;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilderTrait;

trait FormGenerateTrait
{
    use FormBuilderTrait;

    /**
     * @param array $form_fields
     * @param string $form_action
     * @param string $method
     * @param Model|null $model
     * @return Form
     */
    protected function getFormFromArray(
        array $form_fields,
        string $form_action = "",
        string $method = "POST",
        Model $model = null
    ): Form
    {
        $form = $this->plain([
            'url' => $form_action,
            'method' => $method,
            'model' => $model,
        ]);

        foreach($form_fields as $field => $values){
            if(!is_array($values)) {
                $field = $values;
                $values = [];
            }
            if(!isset($values['options'])){
                $values['options'] = [];
            }
            if (!isset($values['options']['label'])){
                $values['options']['label'] = "admin.crud.".$field;
            }
            $form->add($field, $values['type'] ?? 'text', $values['options']);
        }
        $form->add('Salvar', 'submit', ['attr' => ['class' => 'btn btn-primary']]);
        return $form;
    }


    /**
     * @param Model $model
     * @param string $form_action
     * @param string $method
     * @return Form
     */
    protected function getFormFromModel(
        Model $model,
        string $form_action = "",
        string $method = "POST"
    ): Form
    {
        return $this->getFormFromArray($model->getFillable(), $form_action, $method, ($model->id)?$model:null);
    }
}