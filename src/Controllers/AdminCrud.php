<?php namespace Lrcurso\Admin\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Lrcurso\Admin\Forms\FormGenerateTrait;

/**
 * Class AdminCrud
 * @package Lrcurso\Admin\Controllers
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
    public abstract function getTitle():string;


    /**
     * @return View
     */
    public function index(): View
    {
        return view('lrcurso_admin::admin.crud.list', [
            'title' => $this->getTitle(),
            'dataset' => $this->getModel()->paginate(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('lrcurso_admin::admin.crud.form', [
            'form' => $this->getFormFromModel($this->getModel(), action("\\".self::class."@store")),
            'title' => $this->getTitle(),
        ]);
    }

    public function store()
    {
        $this
            ->getModel()
            ->fill($this->request()->all())
            ->save();
        redirect()->action("\\".self::class."@index");
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        return view('lrcurso_admin::admin.crud.form', [
            'form' => $this->getFormFromModel($model, action("\\".self::class."@update", [$id]), "PUT"),
            'title' => $this->getTitle(),
        ]);
    }

    public function update($id)
    {
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $model->fill($this->request()->all())->save();
        return redirect()->action("\\".self::class."@index");
    }

    public function destroy($id)
    {
        $model = $this->getModel()->newQuery()->where('id', $id)->firstOrFail();
        $model->delete();
        return redirect()->action("\\".self::class."@index");
    }

    /**
     * @return Request
     */
    protected function request()
    {
        return $this->request ?? request();
    }
}