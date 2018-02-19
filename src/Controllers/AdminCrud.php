<?php

namespace Lrcurso\Admin\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Lrcurso\Admin\Forms\FormGenerateTrait;

/**
 * Class AdminCrud.
 */
trait   AdminCrud
{
    use FormGenerateTrait;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return Model
     */
    abstract protected function getModel(): Model;

    /**
     * @return string
     */
    abstract public static function getRoute(): string;

    /**
     * @var Request
     */
    protected $request = null;


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
            'form' => $this->getForm(route($this->getRoute().'.store', $this->params)),
            'title' => $this->getTitle(),
        ]);
    }

    public function store()
    {
        $this
            ->getModel()
            ->fill($this->request()->all())
            ->save();

        return redirect(route($this->getRoute().'.index', $this->params));
    }

    /**
     * @return View
     */
    public function edit()
    {
        $id = $this->request()->route()->parameters()['id'];
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $this->params[] = $id;
        return view('lrcurso_admin::admin.crud.form', [
            'form' => $this->getForm(route($this->getRoute().'.update', $this->params), 'PUT', $model),
            'title' => $this->getTitle(),
        ]);
    }

    public function update()
    {
        $id = $this->request()->route()->parameters()['id'];
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $model->fill($this->request()->all())->save();

        return redirect(route($this->getRoute().'.index', $this->params));
    }

    public function destroy()
    {
        $id = $this->request()->route()->parameters()['id'];
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $model->delete();

        return redirect(route($this->getRoute().'.index', $this->params));
    }

    /**
     * @return Request
     */
    protected function request()
    {
        return $this->request ?? request();
    }
}
