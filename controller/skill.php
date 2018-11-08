<?php

if_get('/skills', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name']
    ) = input_list(
        'name'
    );
    $inputs = array_filter($inputs, 'not_null');

    $inputs['delete_time'] = null;

    return render('skill/list', [
        'skills' =>dao('skill')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/skills/add', function ()
{/*{{{*/
    return render('skill/add');
});/*}}}*/

if_post('/skills/add', function ()
{/*{{{*/
    $inputs = [];
    list(
        $inputs['name']
    ) = input_list(
        'name'
    );
    $inputs = array_filter($inputs, 'not_null');

    $skill = skill::create();

    foreach ($inputs as $property => $value) {
        $skill->{$property} = $value;
    }

    return redirect('/skills');
});/*}}}*/

if_get('/skills/update/*', function ($skill_id)
{/*{{{*/
    $skill = dao('skill')->find($skill_id);
    otherwise($skill->is_not_null(), 'skill not found');

    return render('skill/update', [
        'skill' => $skill,
    ]);
});/*}}}*/

if_post('/skills/update/*', function ($skill_id)
{/*{{{*/
    $skill = dao('skill')->find($skill_id);
    otherwise($skill->is_not_null(), 'skill not found');

    $inputs = [];
    list(
        $inputs['name']
    ) = input_list(
        'name'
    );
    $inputs = array_filter($inputs, 'not_null');

    foreach ($inputs as $property => $value) {
        $skill->{$property} = $value;
    }

    redirect('/skills');
});/*}}}*/

if_post('/skills/delete/*', function ($skill_id)
{/*{{{*/
    $skill = dao('skill')->find($skill_id);
    otherwise($skill->is_not_null(), 'skill not found');

    $skill->delete();

    redirect('/skills');
});/*}}}*/
