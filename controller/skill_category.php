<?php

if_get('/skill_categorys', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name']
    ) = input_list(
        'name'
    );
    $inputs = array_filter($inputs, 'not_null');

    $inputs['delete_time'] = null;

    return render('skill_category/list', [
        'skill_categorys' =>dao('skill_category')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/skill_categorys/add', function ()
{/*{{{*/
    return render('skill_category/add');
});/*}}}*/

if_post('/skill_categorys/add', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name']
    ) = input_list(
        'name'
    );
    $inputs = array_filter($inputs, 'not_null');

    $skill_category = skill_category::create();

    foreach ($inputs as $property => $value) {
        $skill_category->{$property} = $value;
    }

    return redirect('/skill_categorys');
});/*}}}*/

if_get('/skill_categorys/update/*', function ($skill_category_id)
{/*{{{*/
    $skill_category = dao('skill_category')->find($skill_category_id);
    otherwise($skill_category->is_not_null(), 'skill_category not found');

    return render('skill_category/update', [
        'skill_category' => $skill_category,
    ]);
});/*}}}*/

if_post('/skill_categorys/update/*', function ($skill_category_id)
{/*{{{*/
    $skill_category = dao('skill_category')->find($skill_category_id);
    otherwise($skill_category->is_not_null(), 'skill_category not found');

    $inputs = [];
    list(
        $inputs['name']
    ) = input_list(
        'name'
    );
    $inputs = array_filter($inputs, 'not_null');

    foreach ($inputs as $property => $value) {
        $skill_category->{$property} = $value;
    }

    redirect('/skill_categorys');
});/*}}}*/

if_post('/skill_categorys/delete/*', function ($skill_category_id)
{/*{{{*/
    $skill_category = dao('skill_category')->find($skill_category_id);
    otherwise($skill_category->is_not_null(), 'skill_category not found');

    $skill_category->delete();

    redirect('/skill_categorys');
});/*}}}*/