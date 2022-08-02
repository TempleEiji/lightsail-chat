<?php

namespace App\Admin\Controllers;

use App\Models\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuesionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('step', __('Step'));
        $grid->column('msg', __('Msg'));
        $grid->column('beforemsg', __('Beforemsg'));
        $grid->column('aftermsg', __('Aftermsg'));
        $grid->column('sender', __('Sender'));
        $grid->column('options', __('Options'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Question::findOrFail($id));
    
        $show->field('step', __('Step'));
        $show->field('msg', __('Msg'));
        $show->field('beforemsg', __('Beforemsg'));
        $show->field('aftermsg', __('Aftermsg'));
        $show->field('sender', __('Sender'));
        $show->field('options', __('Options'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question());

        $form->number('step', __('Step'));
        $form->text('msg', __('Msg'));
        $form->text('beforemsg', __('Beforemsg'));
        $form->text('aftermsg', __('Aftermsg'));
        $form->text('sender', __('Sender'));
        $form->textarea('options', __('Options'));

        return $form;
    }
}
