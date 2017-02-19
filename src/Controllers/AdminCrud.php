<?php

namespace Lrcurso\Admin\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Lrcurso\Admin\Forms\FormGenerateTrait;

/**
 * Class AdminCrud.
 */
trait AdminCrud
{
    use FormGenerateTrait;

    /**
     * @return Model
     */
    abstract protected function getModel(): Model;

    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @return string
     */
    abstract public function getTitle():string;

    protected function list_display()
    {
        if (property_exists($this, 'list_display')) {
            return $this->list_display;
        }

        return $this->getModel()->getFillable();
    }

    protected function getForm($form_action, $method = 'POST', Model $model = null)
    {
        if (property_exists($this, 'form_fields')) {
            return $this->getFormFromArray($this->form_fields, $form_action, $method, $model);
        }

        return $this->getFormFromModel($model ?? $this->getModel(), $form_action, $method);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('lrcurso_admin::admin.crud.list', [
            'title' => $this->getTitle(),
            'dataset' => $this->getModel()->paginate(),
            'list_display' => $this->list_display(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('lrcurso_admin::admin.crud.form', [
            'form' => $this->getForm(action('\\'.static::class.'@store')),
            'title' => $this->getTitle(),
        ]);
    }

    public function store()
    {
        $this
            ->getModel()
            ->fill($this->request()->all())
            ->save();

        return redirect()->action('\\'.static::class.'@index');
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();

        return view('lrcurso_admin::admin.crud.form', [
            'form' => $this->getForm(action('\\'.static::class.'@update', [$id]), 'PUT'),
            'title' => $this->getTitle(),
        ]);
    }

    public function update($id)
    {
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $model->fill($this->request()->all())->save();

        return redirect()->action('\\'.static::class.'@index');
    }

    public function destroy($id)
    {
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $model->delete();

        return redirect()->action('\\'.static::class.'@index');
    }

    /**
     * @return Request
     */
    protected function request()
    {
        return $this->request ?? request();
    }
}
