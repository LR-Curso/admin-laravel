<?php
/**
 * Created by PhpStorm.
 * User: leandro
 * Date: 15/07/2016
 * Time: 13:58.
 */

namespace Lrcurso\Admin\Forms;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\Form;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FormModelAbstract.
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

    public function save(Request $request): Model
    {
        if ($request->has('id')) {
            return $this
                ->getModel()
                ->newQuery()
                ->where('id', $request->id)
                ->firstOrFail()->fill();
        }

        return $this->getModel()->fill($request->all())->save();
    }
}
