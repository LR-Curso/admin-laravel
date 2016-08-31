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
            'form' => $this->getFormFromModel($this->getModel()),
            'title' => $this->getTitle(),
        ]);
    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {
        
    }
}