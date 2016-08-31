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
        string $method = "post",
        Model $model = null
    ): Form
    {
        $form = $this->plain([
            'url' => $form_action,
            'method' => 'post',
            'model' => $model,
        ]);

        foreach($form_fields as $field => $values){
            $form->add((is_int($field))?$values:$field, $values['type'] ?? 'text', $values['options'] ?? []);
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
        string $method = "post"
    ): Form
    {
        return $this->getFormFromArray($model->getFillable(), $form_action, $method);
    }
}