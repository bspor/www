<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 8:41 PM
 */

namespace app\forms;


use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

    protected $rules = [
        'body' => 'required',
    ];

}